<!-- This is the error view that you should show when the request was wrong -->
<?php

function renderError($errorMsg)
{
  echo
  '
    <div class="alert alert-danger alert-dismissible fade show">
      <strong>Error!</strong> '. $errorMsg .'.
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
  ';
}