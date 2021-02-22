<?php

include ("db.php");

function getAll()
{
  $conn = connectionDB();
  $sql = "SELECT * FROM travels";
  $result = mysqli_query($conn, $sql);
  return $result;
  $conn->close();
}


function getById($id)
{
  $conn = connectionDB();
  $sql = "SELECT * FROM travels WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  return $result;
  $conn->close();
}


function insertNew($newTravel)
{
  $conn = connectionDB();
  $sql = "INSERT INTO travels (date_from, date_to, place_from, place_to, budget, reason) VALUES ('".$newTravel['date_from']."', '".$newTravel['date_to']."', '".$newTravel['place_from']."', '".$newTravel['place_to']."', '".$newTravel['budget']."', '".$newTravel['reason']."')";

  mysqli_query($conn, $sql);

  return mysqli_insert_id($conn);
  $conn->close();

  // $conn = connectionDB();
  // $sql = "INSERT INTO travels (date_from, date_to, place_from, place_to, budget, reason) VALUES (?,?,?,?,?,?)";
  // $stmt = mysqli_prepare($conn, $sql);
  // $stmt->bind_param('ssssss', $newTravel['date_from'], $newTravel['date_to'], $newTravel['place_from'], $newTravel['place_to'], $newTravel['budget'], $newTravel['reason']);
  // $stmt->execute();
  // $conn->close();
}


function deleteById($id)
{
  $conn = connectionDB();
  $sql = "DELETE FROM travels WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  return $result;
  $conn->close();
}

function getEmployees()
{
  $conn = connectionDB();
  $sql = "SELECT id, first_name, last_name FROM employees";
  $result = mysqli_query($conn, $sql);
  return $result->fetch_all(MYSQLI_ASSOC);
  $conn->close();
}


function getEmployeesForTravel($id)
{
  $conn = connectionDB();
  $sql= "SELECT e.id, e.first_name, e.last_name FROM employees e INNER JOIN employee_travel e_t ON e_t.employee_id = e.id WHERE e_t.travel_id = $id";
  $result = mysqli_query($conn, $sql);
  return $result->fetch_all(MYSQLI_ASSOC);
  $conn->close();
}


function insertEmnployeesForTravel($id, $employeesId)
{
  $conn = connectionDB();
  $values = join("," , array_map(function($employeeId) use ($id) {
    return "($employeeId, $id)";
  }, $employeesId));
  $sql = "INSERT INTO employee_travel VALUES $values";
  mysqli_query($conn, $sql);
  $conn->close();
}