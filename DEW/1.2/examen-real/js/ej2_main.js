/**
 * Determines if the given value is sub zero. If more than one value is given, determines for all of them (OR).
 * @param ...degrees an arbitrary number of params and/or arrays. Any format is allowed.
 * @returns `bool`. true if any of the given values is considered sub zero, false otherwise.
 */
function someSubZeroDegree(...degrees) {
    return degrees.flat(Infinity).some(degree => degree < 0);
}

console.log(someSubZeroDegree(22, 5, 13, 0, 35));
console.log(someSubZeroDegree(15, 3, -4, 8, -2, 10, 14, 16));
console.log(someSubZeroDegree());
    