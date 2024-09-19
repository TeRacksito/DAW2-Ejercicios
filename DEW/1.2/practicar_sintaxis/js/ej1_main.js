const input = document.getElementById('ej1_input');
const output = document.getElementById('ej1_output');
const output_label = document.getElementById('ej1_output_label');
input.addEventListener('input', (event) => {
    if (output_label.textContent === '') {
        output_label.textContent = 'Su nombre es: ';
    }
    output.textContent = input.value;
});