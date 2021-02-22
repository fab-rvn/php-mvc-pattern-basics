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

function displayTravels()
{
  $result = getAll();

  if ($result->num_rows > 0) {
    renderTravelsDashboard($result);
  } else {
    error("Page was not found");
  }
}


function getTravel()
{
  $result = getById($_GET['id']);
  $travelEmployees = getEmployeesForTravel($_GET['id']);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    renderTravel($row, $travelEmployees);
  } else {
    error("Travel was not found!");
  }
}


function createTravel()
{
  if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $employees = getEmployees();
    renderTravel("", $employees);

  } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {

    $requiredField = array('dateFrom', 'dateTo', 'placeFrom', 'placeTo', 'budget', 'reason');
    $error = false;

    foreach ($requiredField as $field) {
      if (empty($_POST[$field])) {
        $error = true;
      } else {
        $error = false;
      }
    }

    if (!$error) {

      $newTravel = array(
        'date_from' => $_POST['dateFrom'],
        'date_to' => $_POST['dateTo'],
        'place_from' => $_POST['placeFrom'],
        'place_to' => $_POST['placeTo'],
        'budget' => $_POST['budget'],
        'reason' => $_POST['reason']
      );

      $travelId = insertNew($newTravel);
      insertEmnployeesForTravel($travelId, $_POST['employees']);
      displayTravels();

    } else {
      error("All field are required!");
      header("Refresh:2.0; url=index.php?controller=travel&action=createTravel");
    }
  }
}


function deleteTravel()
{
  deleteById($_GET['id']);
  displayTravels();
}

// * This function includes the error view with a message

function error($errorMsg)
{
  require_once VIEWS . "/error/error.php";
  renderError($errorMsg);
}
