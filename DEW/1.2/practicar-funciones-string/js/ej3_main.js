const input = document.getElementById('ej3_input');
const output = document.getElementById('ej3_output');
input.addEventListener('input', (event) => {
    const text = input.value;
    if (text === '') {
        output.textContent = '';
        return;
    }

    if (text.length > 15) {
        const combinationsPerSecond = 50000;
        output.textContent = `¿¡${text.length} caracteres!?
No parecen muchos, pero el número de combinaciones posibles crece exponencialmente con el número de caracteres.
Por ejemplo, con ${text.length} caracteres hay ${numberOfStringCombinations(text)} combinaciones posibles.`;

        const seconds = BigInt(numberOfStringCombinations(text)) / BigInt(combinationsPerSecond);
        output.textContent += `\nSi tu ordenador tarda 1 segundo en calcular ${combinationsPerSecond} combinaciones, 
tardaría ${seconds} segundos en calcular todas las combinaciones posibles.`
        if (seconds < BigInt(60)) { return; }

        const minutes = seconds / BigInt(60);
        output.textContent += `\nEso son más de ${minutes} minutos.`;
        if (minutes < BigInt(60)) { return; }

        const hours = minutes / BigInt(60);
        output.textContent += `\nO sea, más de ${hours} horas.`;
        if (hours < BigInt(24)) { return; }

        const days = hours / BigInt(24);
        output.textContent += `\nUnos ${days} días enteros.`;
        if (days < BigInt(30)) { return; }

        const months = days / BigInt(30);
        output.textContent += `\nLiteralmente, ${months % BigInt(12)} meses...`;
        if (months < BigInt(12)) { return; }

        const years = months / BigInt(12);
        output.textContent += `\nY ${years} años...`;
        if (years < BigInt(100)) { return; }

        output.textContent += `\nNo te preocupes, en ${years} años habrá terminado todo...`;
        if (years < BigInt(1000)) { return; }

        output.textContent += `\nNo tienes nada mejor que hacer, ¿verdad?`;
        if (years < BigInt(100000)) { return; }

        output.textContent += `\nEsto consume RAM, ¿sabes?`;
        if (years < (BigInt(10) ** BigInt(6))) { return; }

        output.textContent += `\n¿¡Pero qué haces!?`;
        if (years < (BigInt(10) ** BigInt(7))) { return; }

        output.textContent += `\nPor gente como tú no podemos tener cosas bonitas...`;
        if (years < (BigInt(10) ** BigInt(9))) { return; }

        output.textContent += `\n¿Por qué piensas que habrá otro mensaje más?`;
        if (years < (BigInt(10) ** BigInt(12))) { return; }

        output.textContent += `\nQue no, que no hay más mensajes...`;
        if (years < (BigInt(10) ** BigInt(15))) { return; }

        output.textContent += `\nEspero que te explote el ordenador...`;
        if (years < (BigInt(10) ** BigInt(20))) { return; }

        output.textContent += `\n¿No se te ha cansado el dedo ya?`;
        if (years < (BigInt(10) ** BigInt(25))) { return; }

        output.textContent += `\nVamos a necesitar más papel...`;
        if (years < (BigInt(10) ** BigInt(30))) { return; }

        output.textContent += `\nLiteralmente ni siquiera eres capaz de leer el número de años en este punto...`;
        if (years < (BigInt(10) ** BigInt(40))) { return; }

        output.textContent += `\nTu sabes que esto se calcula de forma recursiva, ¿verdad..? (ಠ_ಠ)`;
        if (text.length <= 200) { return; }

        output.textContent += `\nNi TikTok te deja poner comentarios de más de 200 caracteres...`;
        if (years < (BigInt(10) ** BigInt(60))) { return; }

        output.textContent += `\nLiteralmente no hay forma de que estés bien de la cabeza...`;
        if (years < (BigInt(10) ** BigInt(80))) { return; }

        output.textContent += `\nSabes que puedo recargarte la página en cualquier momento, ¿no?`;
        if (years < (BigInt(10) ** BigInt(100))) { return; }

        output.textContent += `\nBueno, me cansé de ser buena onda. En el último mensaje tuve que poner if (years < (BigInt(10) ** BigInt(100)))...`;
        return;
    }

    output.textContent = `Hay ${numberOfStringCombinations(text)} combinaciones posibles.\n\n`;

    const combinations = allStringCombinations(text);
    console.log(combinations);

    output.textContent += combinations.join('\n');
});

function numberOfStringCombinations(text) {
    let result = BigInt(0);
    for (let tokenLength = 1; tokenLength <= text.length; tokenLength++) {
        result += factorial(BigInt(text.length)) /
            (factorial(BigInt(tokenLength)) * factorial(BigInt(text.length - tokenLength)));
    }
    return result.toString();
}

function factorial(n) {
    if (n === BigInt(0)) {
        return BigInt(1);
    }
    return n * factorial(n - BigInt(1));
}

function allStringCombinations(text, iterators, parents) {
    if (typeof iterators === 'undefined') {
        const combinations = [];
        for (let tokenLength = 1; tokenLength <= text.length; tokenLength++) {
            const iterators = [];
            for (let i = 0; i < tokenLength; i++) {
                iterators.push(i);
            }
            const newCombinations = allStringCombinations(text, iterators);
            combinations.push(...newCombinations);
        }
        return combinations;
    }

    parents = parents || [];

    if (iterators.length === 0) {
        let token = "";
        for (let i = 0; i < parents.length; i++) {
            let index = parents[i];
            token += text[index];
        }
        return [token];
    }

    const iterator = iterators[0];

    const combinations = [];
    for (let i = iterator; i <= text.length - iterators.length; i++) {
        const restIterators = iterators.slice(1);
        const newParents = parents.slice();
        newParents.push(i);
        const newCombinations = allStringCombinations(text, restIterators, newParents);
        combinations.push(...newCombinations);
        iterators = [i, ...restIterators.map((value) => value + 1)];
    }

    return combinations;
}