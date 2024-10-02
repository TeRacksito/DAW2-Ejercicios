const input = document.getElementById('ej1_input');
const output = document.getElementById('ej1_output');
input.addEventListener('keydown', (event) => {
    if (event.key !== 'Enter') {
        return;
    }

    const userAge = parseInt(input.value);

    if (userAge >= 140 ) {
        output.style.color = '#eb930a';
        output.textContent = '¿Está seguro de que tiene esa edad?';
        return;
    } else if (userAge >= 18 ) {
        output.style.color = 'green';
        output.textContent = '¡Usted puede conducir!';
        return;
    }

    output.style.color = 'red';
    output.textContent = 'Usted no puede conducir.';
});