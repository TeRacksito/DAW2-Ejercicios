const input = document.getElementById('ej1_input');
const output = document.getElementById('ej1_output');
input.addEventListener('input', (event) => {
    const number = input.value;
    output.textContent = reverse(number);
});

function reverse(number) {
    return number.split('').reverse().join('');
}
