const input_min = document.getElementById('ej2_input_min');
const input_max = document.getElementById('ej2_input_max');
const input_num = document.getElementById('ej2_input_num');
const output_label = document.getElementById('ej2_output_label');
const output = document.getElementById('ej2_output');

const inputs = [input_min, input_max, input_num];

inputs.forEach(input => input.addEventListener('input', () => {
    if (inputs.some(input => input.value === '')) {
        output_label.textContent = '';
        output.textContent = '';
        return;
    }

    const min = parseInt(input_min.value);
    const max = parseInt(input_max.value);
    const num = parseInt(input_num.value);

    if (min >= max) {
        output_label.textContent = 'El valor mínimo debe ser menor que el máximo';
        output.textContent = '';
        return;
    }

    if (max - min < num) {
        output_label.textContent = 'El rango no es suficiente para generar tantos números';
        output.textContent = '';
        return;
    }

    let randomSet = new Set();

    while (randomSet.size < num) {
        randomSet.add(Math.floor(Math.random() * (max - min + 1)) + min);        
    }

    output_label.textContent = 'El set generado es:';
    output.textContent = JSON.stringify([...randomSet]);    

}));