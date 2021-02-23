<?php

require_once MODELS . "employeeModel.php";
require CONTROLLERS . "errorController.php";

if (isset($_GET['action']) && function_exists($_GET['action'])) {
    call_user_func($_GET['action']);
} else {
    error($errorMsg);
}

function displayDashboard()
{
    $employees = getAll();
    require VIEWS . "employee/employeeDashboard.php";
}


function displayEmployee()
{
    $employee = getById($_GET['id']);
    if (!$employee) {
        error(1);
    }
    $travels = getTravelsForEmployee($_GET['id']);
    require VIEWS . "employee/employee.php";
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