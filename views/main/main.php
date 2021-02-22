<!-- This is the main generic view of your application, it's not required to use it -->
<?php

  echo
  "
    <div class='mb-5'>
      <h1>Welcome to MVC pattern basic!</h1>
      <div class='my-3'>
        <a href='index.php?controller=employee&action=getAllEmployees' class='btn btn-outline-secondary'>Employees</a>
      </div>
      <div class='my-3'>
        <a href='index.php?controller=travel&action=getAllTravels' class='btn btn-outline-secondary'>Travels</a>
      </div>
    </div>
  ";