const input = document.getElementById('ej2_input');
const output = document.getElementById('ej2_output');
input.addEventListener('input', (event) => {
    const data = input.value;
    const arrayString = data.split(",");

    output.textContent = `${sumNumbers(...arrayString)}`;
});

function sumNumbers(...numbers) {
    return numbers.reduce((a, n) => {
        const number = parseInt(n);
        if (isNaN(number)) {
            return a;
        }
        return a + number;
    }, 0);
}