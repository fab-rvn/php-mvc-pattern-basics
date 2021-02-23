<?php

function error($errorCode, $redirectUrl = "index.php" )
{
  header("Location: $redirectUrl?error=$errorCode");
  die();
}


function decodeError($errorCode)
{
  if ($errorCode === 1) {
    return "Employee was not found!";
  }

}


function error404()
{
  require VIEWS . "error/error404.php";
}