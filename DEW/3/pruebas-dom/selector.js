console.log('1. Seleccionar los botones');
let botones = document.querySelectorAll('button');
console.log(botones);

console.log('2. Seleccionar los h1');
let encabezados1 = document.querySelectorAll('h1');
console.log(encabezados1);

console.log('3. Seleccionar solo el primer encabezado1');
let primerEncabezado1 = document.querySelector('h1');
console.log(primerEncabezado1);

console.log('4. Seleccionar el segundo encabezado1');
console.log(encabezados1[1]);

console.log('5. Seleccionar los elemnetos de la clase "relevant"');
let relevants = document.querySelectorAll('.relevant');
console.log(relevants);

console.log('6. Seleccionar la etiqueta mark');
let highlighted = document.querySelector('mark');
console.log(highlighted);

console.log('7. Seleccionar los li que son relevant.');
let liRelevant = document.querySelectorAll('li.relevant');
console.log(liRelevant);

console.log('8. Seleccionar los elementos que son relevantes y subline');
let relevantSubline = document.querySelectorAll('.relevant.subline');
console.log(relevantSubline);

console.log('9. Seleccionar los enlaces que están en el menú de navegación');
let navLinks = document.querySelectorAll('nav a');
console.log(navLinks);

console.log('10. Seleccionar el botón que está desabilitado');
let disabledButton = document.querySelector('button:disabled');
console.log(disabledButton);

console.log('11. Selecciona el botón que tiene alguna acción de click');
let clickButton = document.querySelector('button[onclick]');
console.log(clickButton);

console.log('12. Selecciona el encabezado con identificador article2');
let article2 = document.querySelector('h1#article2');
console.log(article2);

console.log('13. Selecciona los elemnetos subline que están dentro de un párrafo relevante');
let sublineRelevant = document.querySelectorAll('p.relevant .subline');
console.log(sublineRelevant);

console.log('14. Selecciona los th del encabezado de la tabla');
let thTable = document.querySelectorAll('thead th');
console.log(thTable);

console.log('15. Selecciona los th que son relevantes del encabezado de la tabla');
let thRelevant = document.querySelectorAll('thead th.relevant');
console.log(thRelevant);

console.log('16. Selecciona los th que unen dos celdas');
let colspan = document.querySelectorAll('th[colspan="2"]');
console.log(colspan);

console.log('17. Selecciona el enlace que te dirige a las galletas');
let cookies = document.querySelector('a[href*="ieslasgalletas.org"]');
console.log(cookies);

console.log('18.a. Selecciona los enlaces externos a la web');
let externalLinks = document.querySelectorAll('a[href^="http"]');
console.log(externalLinks);

console.log('18.b. Selecciona los enlaces no externos a la web');
let notExternalLinks = document.querySelectorAll('a:not([href^="http"])');
console.log(notExternalLinks);

console.log('19. Selecciona los td relevantes del cuerpo de la tabla');
let thRelevantBody = document.querySelectorAll('tbody td.relevant');
console.log(thRelevantBody);

console.log('20. Selecciona los encabezados1 que son hijos de primer nivle de un header');
let headerH1 = document.querySelectorAll('header > h1');
console.log(headerH1);

console.log('21. Selecciona las secciones que están debajo de un header (al mismo nivel');
let headerSections = document.querySelectorAll('header + section');
console.log(headerSections);

console.log('22.a. Selecciona la primera celda de cada fila del cuerpo de la tabla');
let firstCell = document.querySelectorAll('tbody tr > td:first-child');
console.log(firstCell);

console.log('22.b. Selecciona la primera celda de cada fila del cuerpo de la tabla (tanto th como td)');
let firstCellTHTD = document.querySelectorAll('tr > :first-child');
console.log(firstCellTHTD);

console.log('23. Selecciona los td pares.');
let evenTd = document.querySelectorAll('td:nth-child(even)');
console.log(evenTd);

console.log('24. Selecciona párrafos que tengan dentro algún span');
let pSpan = document.querySelectorAll('p:has(span)');
console.log(pSpan);

console.log('25. Selecciona el último elemneto de cada lista');
let lastLi = document.querySelectorAll('li:last-child');
console.log(lastLi);

console.log('26. Selecciona la tercera columna del cuerpo de la tabla');
let thirdColumn = document.querySelectorAll('tbody td:nth-child(3)');
console.log(thirdColumn);
