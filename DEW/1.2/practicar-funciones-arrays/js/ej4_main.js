const input = document.getElementById('ej4_input');
const output = document.getElementById('ej4_output');
input.addEventListener('input', (event) => {
    const data = input.value;
    const arrayString = parseInt(data);

    if (isNaN(arrayString)) {
        output.textContent = "";
        return;
    }

    output.textContent = `${sumCubes(arrayString)}`;
});

function sumCubes(number) {
    let sum = 0;
    for (let i = 1; i <= number; i++) {
        sum += i ** 3;
    }
    return sum;
}