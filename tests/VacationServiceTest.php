<?php

include "VacationService.php";
use PHPUnit\Framework\TestCase;

final class VacationServiceTest extends TestCase
{
    private $employee;
    private $vacationService;

    protected function setUp(): void
    {
        $this->employee = new Employee("Moh Aym", "10.11.1993", "30.12.2015");
        $this->vacationService = new VacationService();
    }

    /** @test */
    public function getExtraVacationDaysForAgeTest() {
        $this->assertEquals(0, $this->vacationService->getExtraVacationDaysForAge(29));
        $this->assertEquals(1, $this->vacationService->getExtraVacationDaysForAge(30));
        $this->assertEquals(1, $this->vacationService->getExtraVacationDaysForAge(31));
        $this->assertEquals(2, $this->vacationService->getExtraVacationDaysForAge(35));
    }

    /** @test */
    public function getRemainingMonths(): void {
        $this->assertEquals(0, $this->vacationService->getRemainingMonths(new DateTime("15.12.2015"), "2015"));
        $this->assertEquals(1, $this->vacationService->getRemainingMonths(new DateTime("01.12.2015"), "2015"));
        
    }
}