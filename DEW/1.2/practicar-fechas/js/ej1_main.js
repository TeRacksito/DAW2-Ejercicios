const output = document.getElementById('ej1_output');
document.addEventListener('DOMContentLoaded', () => {
    const date = new Date(2023, 8, 25, 15, 52, 0);
    output.textContent = Intl.DateTimeFormat('es-ES', {
        dateStyle: "full",
        timeStyle: "full"
    }).format(date);
}); 