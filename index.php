<?php

define("BASE_PATH", dirname(__FILE__));
include_once "config/constants.php";


if (isset($_GET['controller'])) {
  if (file_exists(CONTROLLERS . $_REQUEST['controller'] . "Controller.php")) {
    require(CONTROLLERS . $_REQUEST['controller'] . "Controller.php");
  } else {
    include_once "./views/error/error404.php";
  }
} else {
  include_once "./views/main/main.php";
}

if(isset($_GET['error'])) {
  require(CONTROLLERS . "Controller.php");
  $errorMsg = $_GET['error'];
  require VIEWS . "error/error.php";
}