const input = document.getElementById('ej7_input');
const output = document.getElementById('ej7_output');
input.addEventListener('input', (event) => {
    const data = parseInt(input.value).toString();

    if (data === "" || isNaN(data)) {
        output.textContent = "";
        return
    }

    output.textContent = `${persistence(data)}`;
});

function persistence(number) {
    if (number.length === 1) {
        return 0;
    }

    return 1 + persistence(number.split("").reduce((a, n) => a * n, 1).toString());
}