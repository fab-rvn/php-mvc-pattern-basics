<?php

require_once MODELS . "travelModel.php";
require_once VIEWS . "travel/travelDashboard.php";
require_once VIEWS . "travel/travel.php";

/* ~~~ CONTROLLER FUNCTIONS ~~~ */

if (isset($_GET['action']) && function_exists($_GET['action'])) {
  call_user_func($_GET['action']);
} else {
  error($errorMsg);
}

// * This function calls the corresponding model function and includes the corresponding view

function displayDashboard()
{
  $travels = getAll();
  $employees = getEmployees();
  echoTravelsDashboard($travels, $employees);
}


function displaytravel()
{
  $travel = getById($_GET['id']);
  $travelEmployees = getEmployeesForTravel($_GET['id']);
  echoTravel($travel, $travelEmployees);
}


function createTravel()
{
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $travelId = insertNew($_POST);
    insertEmnployeesForTravel($travelId, $_POST['employees']);
    header("Location: index.php?controller=travel&action=displayDashboard");
  }
}

function editTravel()
{
    if ($_SERVER['REQUEST_METHOD'] == "PUT") {
        $data = json_decode(file_get_contents('php://input'), true);
        editById($data);
    }
}

function deleteTravel()
{
  deleteById($_GET['id']);
  header("Location: index.php?controller=travel&action=displayDashboard");
}

// * This function includes the error view with a message

function error($errorMsg)
{
  require_once VIEWS . "/error/error.php";
  echoError($errorMsg);
}
