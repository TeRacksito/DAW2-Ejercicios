const input_num1 = document.getElementById('ej4_input_num1');
const input_num2 = document.getElementById('ej4_input_num2');
const output = document.getElementById('ej4_output');
const output_num1 = document.getElementById('ej4_output_num1');
const output_num2 = document.getElementById('ej4_output_num2');
function sum() {
    output.textContent = parseInt(input_num1.value) % parseInt(input_num2.value);
    output_num1.textContent = input_num1.value;
    output_num2.textContent = input_num2.value;
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