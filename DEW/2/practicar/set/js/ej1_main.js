const output_1 = document.getElementById('ej1_output_1');
const output_label_1 = document.getElementById('ej1_output_label_1');

let mySet = new Set();
for (let i = 1; i <= 5; i++) {
    mySet.add(i);
}

output_1.textContent = JSON.stringify([...mySet]);
output_label_1.textContent = 'El set es: ';

const output_2 = document.getElementById('ej1_output_2');
const output_label_2 = document.getElementById('ej1_output_label_2');

output_2.textContent = mySet.has(3);
output_label_2.textContent = 'El set tiene el número 3: ';

const output_3 = document.getElementById('ej1_output_3');
const output_label_3 = document.getElementById('ej1_output_label_3');

mySet.delete(4);
output_3.textContent = JSON.stringify([...mySet]);
output_label_3.textContent = 'El set sin el número 4 es: ';

const output_4 = document.getElementById('ej1_output_4');
const output_label_4 = document.getElementById('ej1_output_label_4');

output_4.textContent = [...mySet];
output_label_4.textContent = 'El array es: ';

const output_5 = document.getElementById('ej1_output_5');
const output_label_5 = document.getElementById('ej1_output_label_5');

let otherSet = new Set([4, 5, 6, 7]);

output_5.textContent = JSON.stringify([...otherSet]);
output_label_5.textContent = 'El otro set es: ';

const output_6 = document.getElementById('ej1_output_6');
const output_label_6 = document.getElementById('ej1_output_label_6');

let unionSet = new Set([...mySet, ...otherSet]);
output_6.textContent = JSON.stringify([...unionSet]);
output_label_6.textContent = 'La unión de los dos sets es: ';

const output_7 = document.getElementById('ej1_output_7');
const output_label_7 = document.getElementById('ej1_output_label_7');

let intersectionSet = new Set([...mySet].filter(x => otherSet.has(x)));
output_7.textContent = JSON.stringify([...intersectionSet]);
output_label_7.textContent = 'La intersección de los dos sets es: ';

const output_8 = document.getElementById('ej1_output_8');
const output_label_8 = document.getElementById('ej1_output_label_8');

let differenceSet = new Set([...mySet].filter(x => !otherSet.has(x)));
output_8.textContent = JSON.stringify([...differenceSet]);
output_label_8.textContent = 'La diferencia de los dos sets es: ';
