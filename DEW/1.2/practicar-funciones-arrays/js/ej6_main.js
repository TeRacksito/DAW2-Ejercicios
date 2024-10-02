const input = document.getElementById('ej6_input');
const textarea = document.getElementById('ej6_data');
const output = document.getElementById('ej6_output');
const data = [];
input.addEventListener('keydown', (event) => {
    if (event.key !== "Enter") {
        return;
    }
    const arrayString = input.value.split(",");

    if (arrayString.length !== 2) {
        return;
    }

    data.push(arrayString);
    
    textarea.textContent = `[${data.join("], [")}]`;
    output.textContent = `[\"${categorizeProgrammers(...data)}\"]`;    
});

function categorizeProgrammers(...programmers) {
    return programmers.map((programmer) => {
        const [months, languagues] = programmer;

        return months >= 24 && languagues >= 3 ? "Senior" : "Junior";
    }).join("\", \"");
}