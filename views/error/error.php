
<div class="alert alert-danger alert-dismissible fade show error-msg" id="error">
  <strong>Error!</strong> <?= $errorMsg ?>
  <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>

<script>
  setTimeout(() => {
    document.querySelector('#error').remove();
  }, 3000);
</script>