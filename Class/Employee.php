<?php


class Employee
{
//class properties
    public string $employee_name = "";
    public string $employee_dob = "";
    public string $employee_gender = "";
    public string $employee_designation = "";
    public string $employee_salary = "";


//class method
    public function printInfo()
    {
        echo "Employee Information";
        echo "<br>";
        echo "Name : " . $this->employee_name . "\n";
        echo "<br>";
        echo "Date of Birth : " . $this->employee_dob . "\n";
        echo "<br>";
        echo "Gender : " . $this->employee_gender . "\n";
        echo "<br>";
        echo "Designation : " . $this->employee_designation . "\n";
        echo "<br>";
        echo "Salary : " . $this->employee_salary . "\n";

    }
}

//call class
$emp = new Employee();
$emp->employee_name = "Niton";//assign property value
$emp->employee_dob = "12-10-1989";
$emp->employee_gender = "Male";
$emp->employee_designation = "CTA";
$emp->employee_salary = 250000.00;
$emp->printInfo();
