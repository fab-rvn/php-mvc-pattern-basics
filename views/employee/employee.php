<?php

function renderEmployee($row = [])
{
  echo (isset($_GET['id']) ?
    '<h2 class"mb-3">Employee Profile Page</h2>' :
    '<h2>Create New Employee</h2>');

  echo
  '
    <form
      employee
      action="index.php?controller=employee&action=createEmployee"
      class="'.(isset($_GET['modify']) ? "edit" : "").'"
      method="POST"
    >
      <div class="form-row">
        <input type="number" name="id" value="'.$_GET['id'].'" hidden />
        <div class="form-group col-md-6">
          <label for="firstName">First Name</label>
          <input
            '.(isset($_GET['modify']) ? "" : "readonly").'
            type="text"
            class="form-control"
            id="firstName"
            name="firstName"
            placeholder="First Name"
            value="' . (isset($_GET['id']) ? $row["first_name"] : "") . '">
        </div>
        <div class="form-group col-md-6">
          <label for="lastName">Last Name</label>
          <input
            type="text"
            class="form-control"
            id="lastName"
            name="lastName"
            placeholder="Last Name"
            value="' . (isset($_GET['id']) ? $row["last_name"] : "") . '">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="dateTo">Birthday</label>
          <input
            type="text"
            class="form-control"
            id="birthday"
            name="birthday"
            placeholder="2020-01-01"
            value="' . (isset($_GET['id']) ? $row["birth_date"] : "") . '">
        </div>
        <div class="form-group col-md-6">
          <label for="dateFrom">Hired Date</label>
          <input
            type="text"
            class="form-control"
            id="hiredDate"
            name="hiredDate"
            placeholder="2020-01-01"
            value="' . (isset($_GET['id']) ? $row["hired_date"] : "") . '">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="jobTitle">Role</label>
          <input
            type="text"
            class="form-control"
            id="jobTitle"
            name="jobTitle"
            placeholder="Job Title"
            value="' . (isset($_GET['id']) ? $row["job_title"] : "") . '">
        </div>
        <div class="form-group col-md-4">
          <label for="salaries">Salary</label>
          <input
            type="text"
            class="form-control"
            id="salary"
            name="salary"
            placeholder="30.000"
            value="' . (isset($_GET['id']) ? $row["salary"] : "") . '">
        </div>
      </div>
      <button type="submit" class="btn btn-success mr-2">Submit</button>
      <a href="index.php?controller=employee&action=displayEmployees" class="btn btn-secondary">Back</a>
    </form>
  ';
}
