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

  echo $sql;

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  $conn->close();

  // $conn = connectionDB();
  // $sql = "INSERT INTO travels (date_from, date_to, place_from, place_to, budget, reason) VALUES (?,?,?,?,?,?)";
  // $stmt = mysqli_prepare($conn, $sql);
  // $stmt->bind_param('ssssss', $newTravel['date_from'], $newTravel['date_to'], $newTravel['place_from'], $newTravel['place_to'], $newTravel['budget'], $newTravel['reason']);
  // $stmt->execute();
  // $conn->close();
}