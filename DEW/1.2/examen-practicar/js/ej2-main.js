const input = document.getElementById('input');
const output = document.getElementById('output');
input.addEventListener('input', (event) => {
    output.textContent = wordLengthMean(input.value);
});

function wordLengthMean(text) {
    let filtered_text = text.split(/[^\p{L}]+/gu);
    const words = filtered_text.reduce((a, w) => a + (w ? 1 : 0), 0);
    return words === 0 ? 0 : filtered_text.join("").length / words;
}

function otra_forma_de_hacerlo(text) {
    const PUNCTUATION = [".", ",", ";", ":", "!", "?", "¡", "¿"];
    let filtered_text = text;
    for (let i = 0; i < PUNCTUATION.length; i++) {
        filtered_text = filtered_text.replaceAll(PUNCTUATION[i], "");
    }

    const words = filtered_text.trim().split(" ").reduce((a, w) => a + (w ? 1 : 0), 0);
    return words === 0 ? 0 : filtered_text.replaceAll(" ", "").length / words;
}