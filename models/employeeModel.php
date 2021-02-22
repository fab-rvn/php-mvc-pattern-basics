<?php

include ("db.php");

function getAll()
{
  $conn = connectionDB();
  $sql = "SELECT * FROM employees";
  $result = mysqli_query($conn, $sql);
  return $result;
  $conn->close();
}


function getById($id)
{
  $conn = connectionDB();
  $sql = "SELECT * FROM employees WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  return $result;
  $conn->close();
}


function insertNew($newEmployee)
{
  $conn = connectionDB();
  $sql = "INSERT INTO employees (first_name, last_name, birth_date, hired_date, job_title, salary) VALUES (?,?,?,?,?,?)";
  $stmt = mysqli_prepare($conn, $sql);
  $stmt->bind_param('ssssss', $newEmployee['first_name'], $newEmployee['last_name'], $newEmployee['birth_date'], $newEmployee['hired_date'], $newEmployee['job_title'], $newEmployee['salary']);
  $stmt->execute();
  $conn->close();
}


function deleteById($id)
{
  $conn = connectionDB();
  $sql = "DELETE FROM employees WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  return $result;
  $conn->close();
}


function editById($id, $updatedEmployee)
{
  $conn = connectionDB();
  $sql = "UPDATE employees SET
    first_name ='".$updatedEmployee['firstName']."',
    last_name ='". $updatedEmployee['lastName']."',
    birth_date ='".$updatedEmployee['birthday']."',
    hired_date ='".$updatedEmployee['hiredDate']."',
    job_title ='".$updatedEmployee['jobTitle']."',
    salary ='".$updatedEmployee['salary']."' WHERE id =" . $id;

  echo $id;
  // $result = mysqli_query($conn, $sql);

  // if ($result) {
  //   echo var_dump($result);
  // } else {
  //   echo mysqli_error($conn);
  // }
  // echo mysqli_query($conn, $sql);
  // $conn->close();
}