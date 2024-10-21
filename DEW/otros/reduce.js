let datos = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

let datosComplejos = [
    { nombre: "Dani", edad: 22, ciudad: "Cádiz" },
    { nombre: "Juan", edad: 32, ciudad: "Madrid" },
    { nombre: "Pedro", edad: 42, ciudad: "Barcelona" },
    { nombre: "Ana", edad: 52, ciudad: "Sevilla" },
    { nombre: "Luis", edad: 62, ciudad: "Cádiz" }
]

let resultado = datosComplejos.reduce((a, b) => a.edad > b.edad ? a : b); //   modo de funcionar 1

// let resultado = datos.reduce((acc, numero) => {
//     return acc + numero;
// }, 0);//   modo de funcionar 2

console.log(resultado);

