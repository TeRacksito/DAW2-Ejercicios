<?php

namespace Teracksito\Company;

class Company
{
    private array $employees = [];

    public function getEmployee(int $index): Employee
    {
        return $this->employees[$index];
    }

    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function getEmployeesCount(): int
    {
        return count($this->employees);
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function removeEmployee(Employee $employee): void
    {
        $index = array_search($employee, $this->employees);
        if ($index !== false) {
            array_splice($this->employees, $index, 1);
        }
    }

    public function calculateTotalSalary(): float
    {
        return array_reduce($this->employees, fn($acc, $employee) => $acc + $employee->getSalary(), 0);
    }
}
