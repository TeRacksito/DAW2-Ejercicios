import queueTime from "./main.mjs";

const input_arr = document.getElementById('ej1_input_arr');
const input_arr_container = document.getElementById('ej1_input_arr_container');
const input_cash = document.getElementById('ej1_input_cash');
const calculate_butt = document.getElementById('ej1_button');
const output = document.getElementById('ej1_output');
function enterHandler() {
    if (!input_arr.textContent && !input_cash.value) {
        return;
    }

    try {
        const userInput = JSON.parse(`[${input_arr.textContent}]`);
        if (!Array.isArray(userInput)) {
            output.textContent = 'No es un array';
            return;
        }
        const customerItems = userInput.flat();
        const availableCashouts = parseInt(input_cash.value);
        output.textContent = `Tiempo a esperar: ${queueTime(customerItems, availableCashouts)}`;
    } catch (error) {
        output.textContent = 'Error en la entrada';
    }


}
calculate_butt.addEventListener('click', enterHandler);

input_arr_container.addEventListener('click', (event) => {
    input_arr.focus();
});

input_arr.addEventListener('input', (event) => {
    if (event.target.textContent !== '') {
        const spans = input_arr_container.querySelectorAll('span');
        spans.forEach(span => {
            span.hidden = false;
        });
    } else {
        const spans = input_arr_container.querySelectorAll('span');
        spans.forEach(span => {
            span.hidden = true;
        });
    }
});

input_arr.addEventListener('paste', (event) => {
    event.preventDefault();
    const text = event.clipboardData.getData('text/plain');
    document.execCommand('insertText', false, text);
});