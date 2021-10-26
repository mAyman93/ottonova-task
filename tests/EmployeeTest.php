<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    private $employee;

    protected function setUp(): void
    {
        $this->employee = new Employee("Moh Aym", "10.11.1993", "30.12.2015");
    }

    /** @test */
    public function calculateAgeAtYear() {
        
        $this->assertEquals(28, $this->employee->calculateAgeAtYear("2021"));
    }

    /** @test */
    public function getYearOfStartDate(): void {
        $employee = new Employee("Moh Aym", "10.11.1993", "30.12.2015");
        $this->assertEquals("2015", $this->employee->getYearOfStartDate());
    }

}