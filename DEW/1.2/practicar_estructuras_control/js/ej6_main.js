const input = document.getElementById('ej6_input');
const output = document.getElementById('ej6_output');
const grades = [
    {
        min: 0,
        grade: 'Muy deficiente'
    },
    {
        min: 3,
        grade: 'Insuficiente'
    },
    {
        min: 5,
        grade: 'Suficiente'
    },
    {
        min: 6,
        grade: 'Bien'
    },
    {
        min: 7,
        grade: 'Notable'
    },
    {
        min: 9,
        max: 10,
        grade: 'Sobresaliente'
    }
]
input.addEventListener('input', (event) => {
    const input_value = parseFloat(input.value);
    for (let grade_index in grades) {
        grade_index = parseInt(grade_index);
        const grade = grades[grade_index];
        const isInclusive = grade.max !== undefined;
        const max = grade.max || grades[grade_index + 1].min;
        if (input_value >= grade.min && (isInclusive ? input_value <= max : input_value < max)) {
            output.textContent = `La nota ${input_value} es ${grade.grade}`;
            return;
        }
    }

    output.textContent = 'La nota ingresada no es válida';
});