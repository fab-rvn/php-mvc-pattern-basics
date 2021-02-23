<?php

include ("db.php");

function getAll()
{
  $conn = connectionDB();
  $sql = "SELECT * FROM employees";
  $result = mysqli_query($conn, $sql);
  $conn->close();
  return $result->fetch_all(MYSQLI_ASSOC);
}


function getById($id)
{
  $conn = connectionDB();
  $sql = "SELECT * FROM employees WHERE id = $id";
  try {
    $result = mysqli_query($conn, $sql);
    $conn->close();
    return $result->fetch_assoc();
  } catch (Exception $err) {
    return false;
  }
}


function insertNew($newEmployee)
{
  $conn = connectionDB();
  $sql = "INSERT INTO employees (first_name, last_name, birth_date, hired_date, job_title, salary) VALUES (?,?,?,?,?,?)";
  $stmt = mysqli_prepare($conn, $sql);
  $stmt->bind_param('ssssss', $newEmployee['firstName'], $newEmployee['lastName'], $newEmployee['birthday'], $newEmployee['hiredDate'], $newEmployee['jobTitle'], $newEmployee['salary']);
  $success = $stmt->execute();
  $conn->close();
  return $success;
}


function deleteById($id)
{
  $conn = connectionDB();
  $sql = "DELETE FROM employees WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  return $result;
  $conn->close();
}


function editById($updatedEmployee)
{
  $conn = connectionDB();
  $sql = "UPDATE employees SET
    first_name ='".$updatedEmployee['firstName']."',
    last_name ='". $updatedEmployee['lastName']."',
    birth_date ='".$updatedEmployee['birthday']."',
    hired_date ='".$updatedEmployee['hiredDate']."',
    job_title ='".$updatedEmployee['jobTitle']."',
    salary ='".$updatedEmployee['salary']."' WHERE id =" . $updatedEmployee['id'];

  return mysqli_query($conn, $sql);
  $conn->close();
}

function getTravelsForEmployee($employeeId) {
  $conn = connectionDB();
  $sql= "SELECT t.id, t.date_from, t.place_to FROM travels t INNER JOIN employee_travel e_t ON e_t.travel_id = t.id WHERE e_t.employee_id = $employeeId";
  $result = mysqli_query($conn, $sql);
  $conn->close();
  return $result->fetch_all(MYSQLI_ASSOC);
}