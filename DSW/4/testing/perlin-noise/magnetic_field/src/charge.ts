import { Point } from "./point";

export class Charge extends Point {
  charge: number;
  constructor(x: number, y: number, charge: number) {
    super(x, y);
    this.charge = charge;
  }
}
