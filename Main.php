<?php

include "VacationService.php";

$jsonString = file_get_contents("employees.json");
$employees = json_decode($jsonString);

while(true) {
    echo "Please enter the year that you want to get the employees' vacations at:";
    $handle = fopen ("php://stdin","r");
    $year = trim(fgets($handle));
    if(DateTime::createFromFormat('Y', $year) === false) {
        echo "Invalid input\n";
        continue;
    }
    $vs = new VacationService();
    foreach($employees as $employeeObj) {
        $employee = new Employee($employeeObj->name, $employeeObj->dateOfBirth, 
                $employeeObj->contractStartDate, $employeeObj->specialContract ?? null);
        $employeeVacations = $vs->calculateVacation($employee, $year);
        echo $employee->name . ", vacations: " . $employeeVacations . "\n";
    }
}
