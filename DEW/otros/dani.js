// map siempre tiene la misma longitud tanto de salida como entrada.

let datos = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
console.log(datos);


let resultado = datos.map((e, i) => {
    return `El número en la posición ${i}, es ${e} `;
});

console.log(resultado);
