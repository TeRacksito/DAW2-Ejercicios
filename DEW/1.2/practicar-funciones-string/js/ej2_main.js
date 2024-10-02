const input = document.getElementById('ej2_input');
const output = document.getElementById('ej2_output');
input.addEventListener('input', (event) => {
    const text = input.value.replace(/\s+/g, '');
    const invertedText = text.split('').reverse().join('');
    if (text === '') {
        output.textContent = '';
        return;
    }
    output.textContent = `${invertedText} -> ${isPalindrome(text) ? 'Es palíndromo' : 'No es palíndromo'}`;
});

function isPalindrome(str) {
    return str === str.split('').reverse().join('');
}