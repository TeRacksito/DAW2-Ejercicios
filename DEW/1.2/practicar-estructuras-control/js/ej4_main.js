const input = document.getElementById('ej4_input');
const output = document.getElementById('ej4_output');
input.addEventListener('input', (event) => {
    output.textContent = "El número es: " + (input.value % 2 === 0 ? 'par' : 'impar');
});