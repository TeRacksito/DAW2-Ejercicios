import "./style.css";
import { Point } from "./point";
import { Charge } from "./charge";
import { PointsContainer } from "./points";

// Elements
const canvas = document.querySelector("canvas");

if (!canvas) {
  throw new Error("Canvas not found");
}

const ctx = canvas.getContext("2d");

if (!ctx) {
  throw new Error("Canvas context not found");
}

// Types
interface Vector {
  x: number;
  y: number;
}

// Constants
const resolution = 100;

// Global variables
let fieldRows: number;
let fieldCols: number;

let field: Vector[][] = [];
let points = new PointsContainer(ctx);

function updateAspectRatio(canvas: HTMLCanvasElement): [number, number] {
  canvas.width = document.documentElement.clientWidth;
  canvas.height = document.documentElement.clientHeight;

  const aspectRatio = canvas.width / canvas.height;

  const y = Math.round(resolution / (1 + aspectRatio));
  const x = Math.round(resolution - y);

  return [x, y];
}

function generateField(
  width: number,
  height: number,
  fromField?: Vector[][]
): Vector[][] {
  let field: Vector[][];

  console.log("Generating field", width, height);

  if (!fromField) {
    return Array(width).fill(Array(height).fill({ x: 0, y: 0 }));
  } else {
    field = fromField;
  }

  if (field.length > width) {
    field = field.slice(0, width);
  } else {
    for (let i = field.length; i < width; i++) {
      field.push(Array(height).fill({ x: 0, y: 0 }));
    }
  }

  field.forEach((row, i) => {
    if (row.length > height) {
      field[i] = row.slice(0, height);
    } else {
      field[i] = row.concat(Array(height - row.length).fill({ x: 0, y: 0 }));
    }
  });

  return field;
}

function drawVectorField(field: Vector[][], canvas: HTMLCanvasElement): void {
  const ctx = canvas.getContext("2d");

  if (!ctx) {
    throw new Error("Canvas context not found");
  }

  ctx.clearRect(0, 0, canvas.width, canvas.height);

  // const viewScale = canvas.width / vectorField.length;
  const viewScale = {
    x: canvas.width / field.length,
    y: canvas.height / field[0].length,
  };
  for (let x = 0; x < field.length; x++) {
    for (let y = 0; y < field[x].length; y++) {
      const vector = field[x][y];

      const length = Math.sqrt(vector.x * vector.x + vector.y * vector.y);
      const colorValue = Math.min(255, Math.floor(length * 255));
      ctx.strokeStyle = `rgb(${colorValue}, 0, ${255 - colorValue})`;

      ctx.beginPath();
      ctx.moveTo(x * viewScale.x, y * viewScale.y);
      ctx.lineTo(
        x * viewScale.x + vector.x * viewScale.x,
        y * viewScale.y + vector.y * viewScale.y
      );
      ctx.lineWidth = 2; // Set the stroke thickness
      ctx.stroke();
    }
  }
}

function updateField(field: Vector[][], canvas: HTMLCanvasElement): void {
  field.forEach((row, x) => {
    row.forEach((_, y) => {
      field[x][y] = {
        x: Math.random() * 2 - 1,
        y: Math.random() * 2 - 1,
      };
    });
  });

  drawVectorField(field, canvas);
}

function calculateInfluence(
  field: Vector[][],
  charge: Charge,
  x: number,
  y: number
): Vector {
  const dx = x / scaleFactor - charge.x / scaleFactor;
  const dy = y / scaleFactor - charge.y / scaleFactor;
  const distance = Math.sqrt(dx * dx + dy * dy);
  const theta = Math.atan2(dy, dx);

  const mu0 = 4 * Math.PI * 1e-7;
  // const mu0 = 1;
  const mm = charge.charge;

  const prefactor = (mu0 / (4 * Math.PI)) * (mm / Math.pow(distance, 3));

  const Br = 2 * prefactor * Math.cos(theta);
  const Btheta = prefactor * Math.sin(theta);

  const Bx = Br * Math.cos(theta) - Btheta * Math.sin(theta);
  const By = Br * Math.sin(theta) + Btheta * Math.cos(theta);

  return {
    x: Bx,
    y: By,
  };
}

function test(field: Vector[][], canvas: HTMLCanvasElement): void {
  const randomMove = Math.random() * 2 - 1;

  field.forEach((row, x) => {
    row.forEach((_, y) => {
      field[x][y] = {
        x:
          field[x][y].x * Math.cos(randomMove) -
          field[x][y].y * Math.sin(randomMove),
        y:
          field[x][y].x * Math.sin(randomMove) +
          field[x][y].y * Math.cos(randomMove),
      };
    });
  });

  drawVectorField(field, canvas);

  requestAnimationFrame(() => test(field, canvas));
}

// test(field, canvas);

// Main

[fieldRows, fieldCols] = updateAspectRatio(canvas);
window.addEventListener("resize", () => {
  [fieldRows, fieldCols] = updateAspectRatio(canvas);
  field = generateField(fieldRows, fieldCols, field);
  drawVectorField(field, canvas);
});

field = generateField(fieldRows, fieldCols, field);

// drawVectorField(field, canvas);

canvas.addEventListener("click", () => {
  updateField(field, canvas);

  console.log("Field updated");
});

// Add charges
const charge = new Charge(500, 500, 0.1);
points.addPoint(charge);

const scaleFactor = 200_000;

// Calculate influence
field.forEach((row, x) => {
  row.forEach((_, y) => {
    const influence = calculateInfluence(field, charge, x, y);
    // console.log(influence);

    field[x][y] = influence;
  });
});

drawVectorField(field, canvas);
points.draw();
