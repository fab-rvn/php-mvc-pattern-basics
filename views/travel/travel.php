<?php

function renderTravel($row = "")
{
  echo (isset($_GET['id']) ?
    '<h2 class"mb-3">Travel Details Page</h2>' :
    '<h2>Add Travel</h2>');

  echo
  '
    <form action="index.php?controller=travel&action=createTravel" method="POST">
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="placeFrom">From</label>
          <input type="text" class="form-control" id="placeFrom" name="placeFrom" placeholder="Barcelona, Spain" value="'. (isset($_GET['id']) ? $row["place_from"] : "") .'">
        </div>
        <div class="form-group col-md-4">
          <label for="placeTo">Destination</label>
          <input type="text" class="form-control" id="placeTo" name="placeTo" placeholder="New York, EEUU" value="'. (isset($_GET['id']) ? $row["place_to"] : "") .'">
        </div>
        <div class="form-group col-md-4">
          <label for="budget">Budget</label>
          <input type="text" class="form-control" id="budget" name="budget" placeholder="1000€" value="'. (isset($_GET['id']) ? $row["budget"] : "") .'">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="dateFrom">Date From</label>
          <input type="text" class="form-control" id="dateFrom" name="dateFrom" placeholder="2020-01-01" value="'. (isset($_GET['id']) ? $row["date_from"] : "") .'">
        </div>
        <div class="form-group col-md-6">
          <label for="dateTo">Date To</label>
          <input type="text" class="form-control" id="dateTo" name="dateTo" placeholder="2020-01-01" value="'. (isset($_GET['id']) ? $row["date_to"] : "") .'">
        </div>
      </div>
      <div class="form-group">
        <label for="reason">Reason</label>
        <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Travel Motivation">'. (isset($_GET['id']) ? $row["reason"] : "") .'</textarea>
      </div>
      <button type="submit" class="btn btn-success mr-2">Submit</button>
      <a href="index.php?controller=travel&action=getAllTravels" class="btn btn-secondary">Back</a>
    </form>
  ';
}