<?php

function renderEmployeeDashboard($result)
{
  echo '<h2 class="mb-3">Employee Dashboard</h2>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Birthday</th>
          <th scope="col">Role</th>
          <th scope="col">Profile</th>
        </tr>
      </thead>
      <tbody>';

  while( $row = $result->fetch_assoc()) {
    $id = $row['id'];
    echo
    '
    <tr>
      <td>'.$row["id"].'</td>
      <td>'.$row["first_name"] .'</td>
      <td>'.$row["last_name"] .'</td>
      <td>'.$row["birth_date"].'</td>
      <td>'.$row["job_title"] .'</td>
      <td><a href='."index.php?controller=employee&action=getEmployee&id=$id".'>view employee</a></td>
    </tr>';
  }

  echo
  '
      </tbody>
    </table>
    <a href="index.php?controller=employee&action=createEmployee" class="btn btn-success mt-2 mr-1">Create</a>
    <a href="index.php" class="btn btn-secondary mt-2 ml-1">Back</a>
  ';
}