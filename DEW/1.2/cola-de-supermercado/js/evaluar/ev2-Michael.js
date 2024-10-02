function queueTime(prodClientes = [], numCajas = 1) {
    //Defino un array lleno de 0 con el tamaño de las cajas.
    let cajas = new Array(numCajas);
    cajas.fill(0);

    //Iteramos para ver el numero de productos de cada cliente.
    prodClientes.forEach(productos => {

        //Sumamos al principio.
        cajas[0] += productos;

        //Ordenamos de forma creciente, por lo tanto el menor
        //queda el primero.
        cajas.sort();
    });

    //Devolvemos el ultimo de la caja (el mayor al estar ordenado).
    return `${cajas[numCajas - 1]} - ${cajas}`;
}


console.log(queueTime([5, 3, 4], 1));
console.log(queueTime([10, 2, 3, 3], 2));
console.log(queueTime([2, 3, 10], 2));
console.log(queueTime([2, 3, 10, 4, 3], 2));
console.log(queueTime([2, 3, 10, 4, 3], 2));
console.log(queueTime([5, 2, 3, 6, 7, 1, 4, 9, 2, 6, 4], 5));
console.log(queueTime([], 2));
console.log(queueTime([1, 2], 0));
console.log([0, 11, 10, 9, 7, 7].sort());


