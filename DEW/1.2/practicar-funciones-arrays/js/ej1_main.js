const input = document.getElementById('ej1_input');
const output = document.getElementById('ej1_output');
input.addEventListener('input', (event) => {
    const data = input.value;
    const arrayString = data.split(",");

    output.textContent = `[\"${evenOrOdd.join('", "')}\"]`;
});

function evenOrOdd(n) {
    return arrayString.map((n) => {
        const number = parseInt(n);
        if (isNaN(number)) {
            return "NaN";
        }
        return parseInt(n) % 2 == 0 ? "Even" : "Odd";
    })
}