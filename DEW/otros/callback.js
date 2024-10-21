let datos = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

function map(valores, callback) {
    let resultado = [];
    for (let i = 0; i < valores.length; i++) { // iterar los datos
        let value = values[i];
        resultado.push(callback(value));
    }
    return resultado;
}

function mas1(e) {
    return e + 1;
}

map(datos, mas1)

console.log(mas1(5));