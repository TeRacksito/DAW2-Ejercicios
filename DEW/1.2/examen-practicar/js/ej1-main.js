const input = document.getElementById('input');
const output = document.getElementById('output');
input.addEventListener('input', (event) => {
    const array = JSON.parse(input.value);

    if (!Array.isArray(array)) {
        output.textContent = 'No es un array';
        return;
    }

    output.textContent = reduceFlat(array);

});

function reduceFlat(array) { // función recursiva
    return array.reduce((a, n) => a + (Array.isArray(n) ? reduceFlat(n) : n), 0);
}

function otra_forma_de_hacerlo(array) { // método moderno
    return array.flat(Infinity).reduce((a, n) => a + n, 0);
}