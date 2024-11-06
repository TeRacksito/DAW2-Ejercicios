import { Point } from "./point";

export class PointsContainer {
  private points: Point[] = [];
  private ctx: CanvasRenderingContext2D;

  constructor(ctx: CanvasRenderingContext2D) {
    this.ctx = ctx;
  }

  public addPoint(point: Point) {
    this.points.push(point);
  }

  public removePoint(point: Point) {
    this.points = this.points.filter((p) => p !== point);
  }

  public draw() {
    this.points.forEach((point) => {
      this.ctx.beginPath();
      this.ctx.arc(point.x, point.y, 5, 0, 2 * Math.PI);
      this.ctx.fill();
    });
  }

  public getPoints() {
    return this.points;
  }
}
