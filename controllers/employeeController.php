<?php

require_once MODELS . "employeeModel.php";
require_once VIEWS . "employee/employeeDashboard.php";
require_once VIEWS . "employee/employee.php";

/* ~~~ CONTROLLER FUNCTIONS ~~~ */

if (isset($_GET['action']) && function_exists($_GET['action'])) {
    call_user_func($_GET['action']);
} else {
    error($errorMsg);
}

// * This function calls the corresponding model function and includes the corresponding view

function getAllEmployees()
{
    $result = getAll();

    if ($result->num_rows > 0) {
        renderEmployeeDashboard($result);
    } else {
        error("Page was not found");
    }
}


function getEmployee()
{
    $result = getById($_GET['id']);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        renderEmployee($row);
    } else {
        error("Employee was not found!");
    }
}


function createEmployee()
{
    if ($_SERVER['REQUEST_METHOD'] == "GET") {

        renderEmployee();

    } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {

        $requiredField = array('fistName', 'lastName', 'birthday', 'hiredDate', 'jobTitle', 'salary');
        $error = false;

        foreach ($requiredField as $field) {
            if (empty($_POST[$field])) {
                $error = true;
            } else {
                $error = false;
            }
        }

        if (!$error) {

            $newEmployee = array(
                'first_name' => $_POST['firstName'],
                'last_name' => $_POST['lastName'],
                'birth_date' => $_POST['birthday'],
                'hired_date' => $_POST['hiredDate'],
                'job_title' => $_POST['jobTitle'],
                'salary' => $_POST['salary']
            );

            insertNew($newEmployee);
            getAllEmployees();

        } else {
            error("All field are required!");
            header("Refresh:2.0; url=index.php?controller=employee&action=createEmployee");
        }
    }
}

// * This function includes the error view with a message

function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
    renderError($errorMsg);
}
