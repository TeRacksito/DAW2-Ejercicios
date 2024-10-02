/**
 * Filters any word no matching the given length. If more than one length is given, then if matches any.
 * @param text string.
 * @param `...lengths`. an arbitrary number of params and/or arrays. Any format is allowed.
 * @returns `string`. containing only words that matches the given lengths, separated by one space (any other space or punctuation character is removed/ignored).
 */
function wordLengthFilter(text, ...lengths) {
    lengths = lengths.flat();
    const onlyWordsRegex = "/[^\p{L}]+/gu";
    return text.replace(onlyWordsRegex, " ")
        .split(" ")
        .filter(word => lengths.some(lenght => word.length == lenght))
        .join(" ");

}

console.log(wordLengthFilter('Primero resuelve el problema y después escribe el código', 8));
console.log(wordLengthFilter('Siempre escribe tu código como si la persona que lo fuera a mantener fuera un peligroso psicópata que sabe quien eres y donde vives', 9));
console.log(wordLengthFilter('Para entender la recursividad hay que entender lo que es la recursividad', 4, 3, 8));
console.log(wordLengthFilter('Es más difícil leer código que escribirlo'));
