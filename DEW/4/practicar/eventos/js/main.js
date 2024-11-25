const p = document.querySelector('p');
const button = document.querySelector('button');
const check = document.querySelector('input[type="checkbox"]');

function addContent () {
    p.textContent = '¡Hola Mundo!';
}



check.addEventListener('change', function () {
    console.log('cambiando...', this.checked);
    if (this.checked) {
        button.addEventListener('click', addContent);
    } else {
        button.removeEventListener('click', addContent);
    }
});
    