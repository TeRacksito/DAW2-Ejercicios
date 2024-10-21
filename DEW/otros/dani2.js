let datosComplejos = [
    { nombre: "Dani", edad: 22, ciudad: "Cádiz" },
    { nombre: "Juan", edad: 32, ciudad: "Madrid" },
    { nombre: "Pedro", edad: 42, ciudad: "Barcelona" },
    { nombre: "Ana", edad: 52, ciudad: "Sevilla" },
    { nombre: "Luis", edad: 62, ciudad: "Cádiz" }
]

datosComplejos = datosComplejos.filter((value, index) => {
    return true;
});

console.log(datosComplejos);
