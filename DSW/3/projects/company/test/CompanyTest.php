<?php

use PHPUnit\Framework\TestCase;
use Teracksito\Company\Company;
use Teracksito\Company\Employee;

class CompanyTest extends TestCase
{

    public function testAddEmployee()
    {
        $company = new Company();

        $this->assertSame(0, $company->getEmployeesCount());

        $employee1 = new Employee("Pedro", 34, 3000);
        $company->addEmployee($employee1);
        $this->assertSame(1, $company->getEmployeesCount());
        $this->assertSame($employee1, $company->getEmployee(0));

        $employee2 = new Employee("Dylan", 20, 1080);
        $company->addEmployee($employee2);
        $this->assertSame(2, $company->getEmployeesCount());
        $this->assertSame($employee2, $company->getEmployee(1));
    }

    public function testCompanyRemoveEmployee()
    {
        $company = new Company();
        $company->addEmployee(new Employee("Pedro", 34, 3000));
        $dylan = new Employee("Dylan", 20, 1080);
        $company->addEmployee($dylan);
        $this->assertSame(2, $company->getEmployeesCount());
        $this->assertContains($dylan, $company->getEmployees());
        $company->removeEmployee($dylan);
        $this->assertNotContains($dylan, $company->getEmployees());
        $this->assertSame(1, $company->getEmployeesCount());
    }

    public function testCompanyCalculateTotalSalary()
    {
        $comany = new Company();
        $this->assertEquals(0, $comany->calculateTotalSalary());
        $comany->addEmployee(new Employee("Pedro", 34, 3000));
        $comany->addEmployee(new Employee("Dylan", 20, 1080));
        $this->assertEquals(4080, $comany->calculateTotalSalary());
    }
}
