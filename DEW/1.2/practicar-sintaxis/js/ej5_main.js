const input_num1 = document.getElementById('ej5_input_num1');
const input_num2 = document.getElementById('ej5_input_num2');
const output = document.getElementById('ej5_output');
const output_label = document.getElementById('ej5_output_label');
function sum() {
    if (output_label.textContent === '') {
        output_label.textContent = 'La suma de los números es: ';
    }
    output.textContent = parseInt(input_num1.value) + parseInt(input_num2.value);
}

function handleKeyDown(event) {
    if (input_num1.value === '' || input_num2.value === '') {
        return;
    }
    if (event.key === 'Enter') {
        sum();
    }
}

input_num1.addEventListener('keydown', handleKeyDown);
input_num2.addEventListener('keydown', handleKeyDown);