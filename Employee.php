<?php

class Employee
{
    public $name;
    public $dateOfBirth;
    public $contractStartDate;
    public $specialContract;

    public function __construct($name, $dateOfBirth, $contractStartDate, $specialContract = null) {
        $this->name = $name;
        $this->dateOfBirth = $dateOfBirth;
        $this->contractStartDate = $contractStartDate;
        $this->specialContract = $specialContract;
    }

    public function setSpecialContract($specialContract) {
        $this->specialContract = $specialContract;
    }

    public function calculateAgeAtYear($year) {
        $date = new DateTime($this->dateOfBirth);
        $yearOfBirth = $date->format("Y");
        return $year - $yearOfBirth;
    }

    public function getYearOfStartDate() {
        $date = new DateTime($this->contractStartDate);
        return $date->format("Y");
    }
} 