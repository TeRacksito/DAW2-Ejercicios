<?php

namespace Teracksito\Company;

class Employee extends Person {

    private int $salary;

    public function __construct(string $name, int $age, int $salary) {
        parent::__construct($name, $age);
        $this->salary = $salary;
    }

    public function getSalary(): int {
        return $this->salary;
    }
}