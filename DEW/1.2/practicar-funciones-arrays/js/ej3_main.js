const input = document.getElementById('ej3_input');
const output = document.getElementById('ej3_output');
input.addEventListener('input', (event) => {
    const data = input.value;
    const arrayString = data.split(",");

    output.textContent = `${sumPositives(...arrayString)}`;
});

function sumPositives(...numbers) {
    return numbers.reduce((a, n) => {
        const number = parseInt(n);
        if (isNaN(number)) {
            return a;
        }

        if (number < 0) {
            return a;
        }
        return a + number;
    }, 0);
}