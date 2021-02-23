<?php

echo '<form 
action="index.php?controller=travel&action=createTravel" 
method="POST"
>
<div class="form-row">
  <input hidden value='.$_GET['id'].' name="id" type="number"></input>
  <div class="form-group col-md-4">
    <label for="placeFrom">From</label>
    <input
      '.(isset($_GET['modify']) ? "" : "readonly").'
      type="text"
      class="form-control"
      id="placeFrom"
      name="placeFrom"
      placeholder="Barcelona, Spain"
      value="'. (isset($_GET['id']) ? $row["place_from"] : "") .'">
  </div>
  <div class="form-group col-md-4">
    <label for="placeTo">Destination</label>
    <input
      '.(isset($_GET['modify']) ? "" : "readonly").'
      type="text"
      class="form-control"
      id="placeTo"
      name="placeTo"
      placeholder="New York, EEUU"
      value="'. (isset($_GET['id']) ? $row["place_to"] : "") .'">
  </div>
  <div class="form-group col-md-4">
    <label for="budget">Budget</label>
    <input
      '.(isset($_GET['modify']) ? "" : "readonly").'
      type="text"
      class="form-control"
      id="budget" name="budget"
      placeholder="1000€"
      value="'. (isset($_GET['id']) ? $row["budget"] : "") .'">
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="dateFrom">Date From</label>
    <input type="text"
      '.(isset($_GET['modify']) ? "" : "readonly").'
      class="form-control"
      id="dateFrom"
      name="dateFrom"
      placeholder="2020-01-01"
      value="'. (isset($_GET['id']) ? $row["date_from"] : "") .'">
  </div>
  <div class="form-group col-md-4">
    <label for="dateTo">Date To</label>
    <input
      '.(isset($_GET['modify']) ? "" : "readonly").'
      type="text"
      class="form-control"
      id="dateTo"
      name="dateTo"
      placeholder="2020-01-01"
      value="'. (isset($_GET['id']) ? $row["date_to"] : "") .'">
  </div>
  <div class="form-group col-md-4">
    <label for="employees">Select Employee</label>
      <select
        '.(isset($_GET['modify']) ? "" : "readonly").'
        multiple
        class="form-control"
        id="employees"
        name="employees[]">
        '. join(" ", array_map(function($employee) {
            return
            "<option value=".$employee['id'].">
              " . $employee['first_name'] ." ". $employee['last_name'] ."
            </option>";
        }, $employees )).'
      </select>
  </div>
</div>
<div class="form-group">
  <label for="reason">Reason</label>
  <textarea
    '.(isset($_GET['modify']) ? "" : "readonly").'
    class="form-control"
    id="reason"
    name="reason"
    rows="3"
    placeholder="Travel Motivation">'. (isset($_GET['id']) ? $row["reason"] : "") .'</textarea>
</div>
<button type="submit" class="btn btn-success mr-2">Submit</button>
<a href="index.php?controller=travel&action=displayDashboard" class="btn btn-secondary">Back</a>
</form>';