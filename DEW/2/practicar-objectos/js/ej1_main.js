const input_registration = document.getElementById('ej1_input_registration');
const input_make = document.getElementById('ej1_input_make');
const input_model = document.getElementById('ej1_input_model');
const input_year = document.getElementById('ej1_input_year');
const inputs = [input_registration, input_make, input_model, input_year];
const output_1 = document.getElementById('ej1_output');
const output_label_1 = document.getElementById('ej1_output_label');

const output_2 = document.getElementById('ej1_output_2');
const output_label_2 = document.getElementById('ej1_output_label_2');

const output_3 = document.getElementById('ej1_output_3');
const output_label_3 = document.getElementById('ej1_output_label_3');

const output_4 = document.getElementById('ej1_output_4');
const output_label_4 = document.getElementById('ej1_output_label_4');

const input_5 = document.getElementById('ej1_input_year_5');
const output_label_5 = document.getElementById('ej1_output_label_5');
const output_5 = document.getElementById('ej1_output_5');
let cars = [];

const output_6 = document.getElementById('ej1_output_6');
const output_label_6 = document.getElementById('ej1_output_label_6');

inputs.forEach(element => {
    element.addEventListener('input', (event) => {
        if (output_label_1.textContent === '') {
            output_label_1.textContent = 'El objecto será: ';
        }

        let car = {
            registration: input_registration.value,
            make: input_make.value,
            model: input_model.value,
            year: input_year.value
        };

        output_1.textContent = JSON.stringify(car);

        if (output_label_2.textContent === '') {
            output_label_2.textContent = 'El objecto será: ';
        }

        car = {
            registration: input_registration.value,
            make: input_make.value,
            model: input_model.value,
            year: input_year.value,
            getMakeModel() {
                return `${this.make} ${this.model}`;
            },
            thisYearHasITV() {
                const currentAge = new Date().getFullYear() - this.year;
                if (currentAge > 10) {
                    return true;
                } else if (currentAge >= 4) {
                    if (currentAge % 2 === 0) { return true; }
                }

                return false;
            },
            toString() {
                return `Car: ${this.registration} ${this.make} ${this.model} ${this.year}`;
            }
        }

        output_2.textContent = `${car.toString()} ${car.thisYearHasITV() ? 'tiene' : 'no tiene'} ITV.`;

        let car2 = Object.assign({}, car);
        car2.make = 'Toyota';
        car2.model = 'Corolla';

        let car3 = Object.assign({}, car);
        car3.make = 'Ford';
        car3.model = 'Focus';

        if (output_label_3.textContent === '') {
            output_label_3.textContent = 'Los objectos serán: ';
        }

        output_3.textContent = '';
        output_3.textContent += `${car2.toString()} ${car2.thisYearHasITV() ? 'tiene' : 'no tiene'} ITV.\n`;
        output_3.textContent += `${car3.toString()} ${car3.thisYearHasITV() ? 'tiene' : 'no tiene'} ITV.`;

        cars = [car, car2, car3];

        cars.push({ ...car, make: 'Renault', model: 'Clio', year: 2010, registration: '1234ABC' });
        cars.push({ ...car, make: 'Seat', model: 'Ibiza', year: 2012, registration: '5678DEF' });
        cars.push({ ...car, make: 'Volkswagen', model: 'Golf', year: 2014, registration: '9012GHI' });
        cars.push({ ...car, make: 'Peugeot', model: '308', year: 2016, registration: '3456JKL' });
        cars.push({ ...car, make: 'Citroen', model: 'C4', year: 2018, registration: '7890MNO' });
        cars.push({ ...car, make: 'Audi', model: 'A3', year: 2020, registration: '1234PQR' });
        cars.push({ ...car, make: 'BMW', model: 'Serie 1', year: 2022, registration: '5678STU' });
        cars.push({ ...car, make: 'Mercedes', model: 'Clase A', year: 2024, registration: '9012VWX' });

        if (output_label_4.textContent === '') {
            output_label_4.textContent = 'Los objectos serán: ';
        }

        output_4.textContent = '';
        cars.forEach(car => {
            output_4.textContent += `${car.toString()} ${car.thisYearHasITV() ? 'tiene' : 'no tiene'} ITV.\n`;
        });

        if (output_label_6.textContent === '') {
            output_label_6.textContent = 'Los objectos serán: ';
        }

        output_6.textContent = `${cars.some(car => car.thisYearHasITV()) ? 'Alguno de los coches tiene ITV.' : 'Ninguno de los coches tiene ITV.'}`;
    });
});

input_5.addEventListener('input', (event) => {

    console.log(inputs.map(input => input.value));

    if (output_label_5.textContent === '') {
        output_label_5.textContent = 'Los objectos serán: ';
    }

    output_5.textContent = '';
    cars.filter(car => car.year >= input_5.value).forEach(car => {
        output_5.textContent += `${car.toString()} ${car.thisYearHasITV() ? 'tiene' : 'no tiene'} ITV.\n`;
    });
});