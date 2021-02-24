<?php

define("BASE_PATH", dirname(__FILE__));
include "config/constants.php";


if (isset($_GET['controller'])) {
  $controllerPath = CONTROLLERS . $_REQUEST['controller'] . "Controller.php";
  if (file_exists($controllerPath)) {
    require $controllerPath;
  } else {
    header("Location: index.php?error=noController");
    die();
  }
} else {
  include "./views/main/main.php";
}

require_once CONTROLLERS . "errorController.php";