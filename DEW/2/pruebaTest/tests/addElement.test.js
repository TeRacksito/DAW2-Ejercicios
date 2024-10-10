const { addElement, removeElement } = require("../src/addElement");

test('add "algo" to ["hola", "adios"] and array contains "algo"', () => {
  const arr = ["hola", "adios"];
  addElement(arr, "algo");
  expect(arr).toContain("algo");
  expect(arr).toHaveLength(3);
  addElement(arr, "algo");
  expect(arr).not.toHaveLength(4);
});

test("removeElement removes if element exists", () => {
  const arr = ["hola", "adios"];
  removeElement(arr, "hola");
  expect(arr).not.toContain("hola");
});
