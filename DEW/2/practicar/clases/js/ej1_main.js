class Car {
    #registration;
    #make;
    #model;
    #year;
    #owner = null;

    constructor(registration, make, model, year) {
        this.#registration = registration;
        this.#make = make;
        this.#model = model;
        this.#year = year;
    }

    getRegistration() {
        return this.#registration;
    }

    setRegistration(registration) {
        this.#registration = registration;
    }

    getMakeModel() {
        return `${this.#make} ${this.#model}`;
    }

    getYear() {
        return this.#year;
    }

    setYear(year) {
        if (year < this.#year) this.#year = year;
    }

    getOwner() {
        return this.#owner;
    }

    setOwner(owner) {
        this.#owner = owner;
    }


}

const car1 = new Car('1234ABC', 'Ford', 'Focus', 2010);
const car2 = new Car('5678DEF', 'Toyota', 'Corolla', 1995);
const car3 = new Car('9012GHI', 'Seat', 'Ibiza', 2012);

console.log(car1.getYear());
car1.setYear(2000);
console.log(car1.getYear());
console.log(car2.getYear());
car2.setYear(2000);
console.log(car2.getYear());
console.log(car3.getYear());
car3.setYear(2000);
console.log(car3.getYear());

class Person {
    #dni = "No definido";
    name;

    constructor(name, dni) {
        this.name = name;
        this.setDNI(dni);

    }

    setDNI(dni) {
        if (dni.length === 8) {
            this.#dni = dni;
        }
    }

    getDNI() {
        return this.#dni;
    }
}