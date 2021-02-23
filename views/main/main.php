<!-- This is the main generic view of your application, it's not required to use it -->
<!doctype html>
<html lang='en'>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
  <link rel='stylesheet' href='./assets/css/style.css'>
  <title>MVC Basic</title>
</head>

<body>
  <div class='container mt-2'>
    <div class='mb-5'>
      <h1>Welcome to MVC pattern basic!</h1>
      <div class='my-3'>
        <a href='index.php?controller=employee&action=displayDashboard' class='btn btn-outline-secondary'>Employees</a>
      </div>
      <div class='my-3'>
        <a href='index.php?controller=travel&action=displayDashboard' class='btn btn-outline-secondary'>Travels</a>
      </div>
    </div>
  </div>
  <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js' integrity='sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==' crossorigin='anonymous'></script>
</body>

</html>