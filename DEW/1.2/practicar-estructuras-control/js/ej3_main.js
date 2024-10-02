const input = document.getElementById('ej3_input');
const display_nums = document.getElementById('ej3_saved_nums');
const output = document.getElementById('ej3_output');
const nums = [];
function bigger() {
    nums.push(parseInt(input.value));
    nums.sort((a, b) => b - a);
    display_nums.textContent = `Números ingresados: ${nums.join(', ')}`;
    output.textContent = `El número ${nums[0]} es el mayor de todos.`;
}

function handleKeyDown(event) {
    if (input.value === '') {
        return;
    }
    if (event.key === 'Enter') {
        bigger();
    }
}

input.addEventListener('keydown', handleKeyDown);