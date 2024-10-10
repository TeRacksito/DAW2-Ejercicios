const div = require("../src/div");

test("div 1 / 2 to equal 0.5", () => {
  expect(div(1, 2)).toBe(0);
});

test("div 2 / 1 to equal 2", () => {
  expect(div(2, 1)).toBe(2);
});
