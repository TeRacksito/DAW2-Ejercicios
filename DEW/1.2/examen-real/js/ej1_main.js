/**
 * Fahrenheit to Celsius converter.
 * @param ...degrees an arbitrary number of params and/or arrays. Any format is allowed.
 * @returns `array[number]`. First level array of celsius degrees. Corresponding to input in order, but not in format.
 */
function fahrenheitToCelsius(...degrees) {
    return degrees.flat(Infinity).map(degree => (degree - 32) * (5/9));
}

console.log(fahrenheitToCelsius([68, 50, 46.4, 39, 90]));
console.log(fahrenheitToCelsius([20, 0, -10]));
console.log(fahrenheitToCelsius([]));
