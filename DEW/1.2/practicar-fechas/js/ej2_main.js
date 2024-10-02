const input = document.getElementById('ej2_input');
const output = document.getElementById('ej2_output');
input.addEventListener('input', () => {
    const inputDate = new Date(input.value);
    output.textContent = Intl.DateTimeFormat('es-ES', {
        dateStyle: "full",
        timeStyle: "full"
    }).format(inputDate);
}); 