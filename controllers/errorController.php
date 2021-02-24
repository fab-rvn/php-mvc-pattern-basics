<?php

const ERROR_CODES = array(
  "noController" => "No controller with this name",
  "noAction" => "No action with this name",
  "noEmp" => "No employee found",
  "noTravel" => "No travel found",
  "emptyFields" => "Empty fields found"
);

if(isset($_GET["error"])) {
  $errorMsg = ERROR_CODES[$_GET["error"]];
  include VIEWS . "error/error.php";
}