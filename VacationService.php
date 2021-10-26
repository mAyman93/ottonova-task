<?php

include 'Employee.php';
include 'Config.php';

class VacationService
{
    public function calculateVacation(Employee $employee, int $year) {
        $vacationDays = $this->getBasicVacationDays($employee);
        $employeeAge = $employee->calculateAgeAtYear($year);
        $vacationDays += $this->getExtraVacationDaysForAge($employeeAge);
        if($employee->getYearOfStartDate() == $year) {
            $numberOfMonthsRemaining = $this->getRemainingMonths(new DateTime($employee->contractStartDate), $year);
            $vacationDays = (int) round($numberOfMonthsRemaining * $vacationDays / 12);
        }
        if($employee->getYearOfStartDate() > $year) {
            return "invalid";
        }
        return $vacationDays;
    }

    public function getBasicVacationDays(Employee $employee) {
        if($employee->specialContract !== null) {
            return $employee->specialContract;
        } else {
            return MINIMUM_VACATIONS_DAYS;
        }
    }

    public static function getExtraVacationDaysForAge(int $age) {
        if($age < EXTRA_VACATION_DAYS_FROM_AGE) return 0;
        return (int) round(($age - EXTRA_VACATION_DAYS_FROM_AGE) / 5) + 1;
    }

    public static function getRemainingMonths(\DateTime $date, $year) {
        $endOfYearDate = new DateTime($year . "-12-31");
        $diff =  $endOfYearDate->diff($date);
        $months = $diff->y * 12 + $diff->m + $diff->d / 30;
        return (int) floor($months);
    }
}