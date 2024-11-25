const fruits = document.querySelectorAll('li');
const button = document.querySelector('button');
const cart = document.querySelector('#cart');

fruits.forEach(fruit => {
    fruit.addEventListener('click', select);
    fruit.addEventListener('dblclick', removeLi);
});

function select() {
    console.log('seleccionando ... ', this);
    this.classList.toggle('selected');
}

function removeLi() {
    this.remove();
}

button.addEventListener('click', () => {
    fruits.forEach(fruit => {
        fruit.removeEventListener('dblclick', removeLi);
        fruit.addEventListener('click', goToCart);
    })
})

function goToCart() {
    cart.append(this);
}