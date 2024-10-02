/**
 * Formats a date given in "day-month-year" format.
 * @param datedString string, following "day-month-year" format. Date processed by "Date" package.
 * @returns `string`. Date formatted on Spanish following "Intl" package "DateTimeFormat" full "dateStyle" style and "es-ES" locales.
 */
function dateParser(datedString) {
    const parsedDateData = datedString.split("-").reverse();
    
    if (parsedDateData.length !== 3) {
        return "Fecha no válida";
    }
    
    parsedDateData[1]--;
    const date = new Date(...parsedDateData);
    if (date == "Invalid Date") {
        return "Fecha no válida";
    }
    return Intl.DateTimeFormat("es-ES", {
        dateStyle: "full"
    }).format(date);
}

console.log(dateParser('20-12-2012'));
console.log(dateParser('2-1-2024'));
console.log(dateParser('2-2024'));
console.log(dateParser('40-5-24'));
