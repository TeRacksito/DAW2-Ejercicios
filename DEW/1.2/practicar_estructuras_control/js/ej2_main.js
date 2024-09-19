const input_num1 = document.getElementById('ej2_input_num1');
const input_num2 = document.getElementById('ej2_input_num2');
const output = document.getElementById('ej2_output');
function bigger() {
    const nums = [parseInt(input_num1.value), parseInt(input_num2.value)];
    nums.sort((a, b) => a - b);
    const [min, max] = nums;
    output.textContent = `El número ${max} es mayor que el número ${min}.`;
}

function handleKeyDown(event) {
    if (input_num1.value === '' || input_num2.value === '') {
        return;
    }
    if (event.key === 'Enter') {
        bigger();
    }
}

input_num1.addEventListener('keydown', handleKeyDown);
input_num2.addEventListener('keydown', handleKeyDown);