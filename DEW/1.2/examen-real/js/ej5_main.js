/**
 * Counts number of digit occurrence of given values.
 * @param ...digits an arbitrary number of params and/or arrays. Any format is allowed. Should not have numbers not representative by any decimal digit.
 * @returns `array[number]{length: 10}`. An array of ten elements representative of decimal digits, each digit representative by the array index.
 */
function digitCounter(...digits) {
    const result = new Array(10).fill(0);
    digits.flat(Infinity).forEach(digit => result[digit]++);
    return result;
}

console.log(digitCounter([[[4,5],[2,3],2,2],0,6],5,2));
console.log(digitCounter(1,2,2,3,3,3,4,4,4,4,5,5,5,5,6,6,6,7,7,8));
console.log(digitCounter());
console.log(digitCounter(9,8,7,6,5,4,3,2,1,0));
