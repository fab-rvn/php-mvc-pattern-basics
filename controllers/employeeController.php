<?php

require_once MODELS . "employeeModel.php";
require_once VIEWS . "employee/employeeDashboard.php";
require_once VIEWS . "employee/employee.php";
require_once VIEWS . "error/error.php";

if (isset($_GET['action']) && function_exists($_GET['action'])) {
    if(isset($_GET['error'])) {
       echoError($_GET['error']);
    }
    call_user_func($_GET['action']);
} else {
    error($errorMsg);
}

function displayDashboard()
{
    $employees = getAll();
    echoEmployeeDashboard($employees);
}


function displayEmployee()
{
    $employee = getById($_GET['id']);
    $travels = getTravelsForEmployee($_GET['id']);
    echoEmployee($employee, $travels);
}


function createEmployee()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $requiredFields = array('firstName', 'lastName', 'birthday', 'hiredDate', 'jobTitle', 'salary');
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                error("Cannot create employee with empty ".$field."");
                die();
            }
        }

        $result = insertNew($_POST);
        if($result) {
            header("Location: index.php?controller=employee&action=displayDashboard");
        } else {
            error("Cannot create employee");
        }
    }
}


function deleteEmployee()
{
    deleteById($_GET['id']);
    header("Location: index.php?controller=employee&action=displayDashboard");
}


function editEmployee()
{
    if ($_SERVER['REQUEST_METHOD'] == "PUT") {
        $data = json_decode(file_get_contents('php://input'), true);
        editById($data);
    }
}

function error($errorMsg, $redirectUrl = "index.php?controller=employee&action=displayDashboard")
{
    $errorMsg = urlencode($errorMsg);
    header("Location: $redirectUrl&error=$errorMsg");
}