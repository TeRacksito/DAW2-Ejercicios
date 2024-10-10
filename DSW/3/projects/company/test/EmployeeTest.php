<?php

use PHPUnit\Framework\TestCase;
use Teracksito\Company\Employee;
use Teracksito\Company\Person;

class EmployeeTest extends TestCase {

    public function testEmployeeConstructor() {
        $employee1 = new Employee("Luis", 35, 2500);
        $this->assertInstanceOf(Person::class, $employee1, "Employee must be an instance of Person");
        $this->assertSame("Luis", $employee1->getName());
        $this->assertSame(35, $employee1->getAge(), "Employee age must be 35");
        $this->assertSame(2500, $employee1->getSalary(), "Employee salary must be 2500");
    }
}