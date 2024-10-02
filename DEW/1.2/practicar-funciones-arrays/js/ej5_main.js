const input = document.getElementById('ej5_input');
const output = document.getElementById('ej5_output');
input.addEventListener('input', (event) => {
    const data = input.value;

    if (data === "") {
        output.textContent = "";
        return
    }

    output.textContent = `${squareDigits(data)}`;
});

function squareDigits(number) {
    return parseInt(number.split("").reduce((a, n) => a + n**2, ""));
}