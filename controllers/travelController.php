<?php

require_once MODELS . "travelModel.php";

if (isset($_GET['action']) && function_exists($_GET['action'])) {
  call_user_func($_GET['action']);
} else {
  header("Location: index.php?controller=employee&action=displayDashboard&error=noAction");
  die();
}

function displayDashboard()
{
  $travels = getAll();
  $employees = getEmployees();
  require VIEWS . "travel/travelDashboard.php";
}

function displaytravel()
{
  $travel = getById($_GET['id']);
  if (!$travel) {
    header("Location: index.php?controller=employee&action=displayDashboard&error=noTravel");
    die();
  }
  $employees = getEmployeesForTravel($_GET['id']);
  require VIEWS . "travel/travel.php";
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
