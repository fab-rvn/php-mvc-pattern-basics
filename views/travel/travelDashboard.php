<?php

function renderTravelsDashboard($result)
{

  echo '<h2 class="mb-3">Travel Dashboard</h2>

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Place From</th>
        <th scope="col">Place To</th>
        <th scope="col">Reason</th>
        <th scope="col">View</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>';

  while( $row = $result->fetch_assoc()) {
    $id = $row['id'];
    echo
    '
    <tr>
      <td>'.$row["id"].'</td>
      <td>'.$row["place_from"] .'</td>
      <td>'.$row["place_to"] .'</td>
      <td>'.$row["reason"].'</td>
      <td><a href='."index.php?controller=travel&action=getTravel&id=$id".' class="btn btn-primary">View</a></td>
      <td><a href='."index.php?controller=travel&action=editTravel&modify=true&id=$id".' class="btn btn-info">Edit</a></td>
      <td><a href='."index.php?controller=travel&action=deleteTravel&id=$id".' class="btn btn-danger">Delete</a></td>
    </tr>';
  }

  echo
  '
      </tbody>
    </table>
    <a href="index.php?controller=travel&action=createTravel" class="btn btn-success mt-2 mr-1">Create</a>
    <a href="index.php" class="btn btn-secondary mt-2 ml-1">Back</a>
  ';

}
