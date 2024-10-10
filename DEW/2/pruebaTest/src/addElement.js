function addElement(arr, element) {
  arr.some((el) => el === element) ? arr : arr.push(element);
}

function removeElement(arr, element) {
  const index = arr.indexOf(element);
  if (index !== -1) {
    arr.splice(index, 1);
  }
}

module.exports = { addElement, removeElement };
