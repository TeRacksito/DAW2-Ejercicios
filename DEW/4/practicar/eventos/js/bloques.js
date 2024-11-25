const gridContainer = document.querySelector("#grid-container");
const buttonInput = document.querySelector("#add-row");
const colorInput1 = document.querySelector("#color1");
const colorInput2 = document.querySelector("#color2");
const numberInput = document.querySelector("#number");

function addRow() {
  const row = document.createElement("div");
  row.classList.add("row");

  for (let i = 0; i < numberInput.value; i++) {
    const block = document.createElement("div");
    let checked = true;
    block.classList.add("block");

    const color1 = colorInput1.value;
    const color2 = colorInput2.value;

    block.style.backgroundColor = color1;

    block.addEventListener("click", () => {
        checked = !checked;
        if (checked) {
            block.style.backgroundColor = color1;
        } else {
            block.style.backgroundColor = color2;
        }        
    });

    row.appendChild(block);
  }

  gridContainer.appendChild(row);
}

buttonInput.addEventListener("click", addRow);