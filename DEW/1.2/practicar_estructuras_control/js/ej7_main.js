const input = document.getElementById('ej7_input');
const output = document.getElementById('ej7_output');
const divisibles = [
    2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97
];
input.addEventListener('input', (event) => {
    const input_value = parseFloat(input.value);
    let output_value = '';
    if (isNaN(input_value)) {
        return;
    }

    divisibles.forEach((divisible) => {
        if (input_value % divisible === 0) {
            output_value += `${input_value} es divisible entre ${divisible}\n`;
        }
    });

    if (output_value === '') {
        output_value = `${input_value} no es divisible entre ${divisibles.join(', ')}`;
    }

    output.innerText = output_value;
});