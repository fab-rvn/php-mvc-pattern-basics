<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>MVC Basic</title>
</head>

<body>
  <div class="container mt-2">
    <h2 class="mb-3">Employee Profile Page</h2>
    <form>
      <div class="form-employee">
        <input type="number" name="id" value=<?= $employee['id'] ?> hidden />
        <div class="form-group col-md-6">
          <label for="firstName">First Name</label>
          <input
            readonly
            type="text"
            class="form-control"
            id="firstName"
            name="firstName"
            placeholder="First Name"
            value=<?=$employee["first_name"]?> >
            </div>
            <div class="form-group col-md-6">
              <label for="lastName">Last Name</label>
              <input
                readonly
                type="text"
                class="form-control"
                id="lastName"
                name="lastName"
                placeholder="Last Name"
                value=<?=$employee["last_name"]?> >
            </div>
          </div>
        <div class="form-employee">
          <div class="form-group col-md-6">
            <label for="dateTo">Birthday</label>
            <input
              readonly
              type="text"
              class="form-control"
              id="birthday"
              name="birthday"
              placeholder="2020-01-01"
              value=<?= $employee["birth_date"] ?> />
          </div>
          <div class="form-group col-md-6">
            <label for="dateFrom">Hired Date</label>
            <input
              readonly
              type="text"
              class="form-control"
              id="hiredDate"
              name="hiredDate"
              placeholder="2020-01-01"
              value=<?= $employee["hired_date"] ?> >
          </div>
        </div>
        <div class="form-employee">
          <div class="form-group col-md-6">
            <label for="jobTitle">Role</label>
            <input
              readonly
              type="text"
              class="form-control"
              id="jobTitle"
              name="jobTitle"
              placeholder="Job Title"
              value=<?= $employee["job_title"] ?> >
          </div>
          <div class="form-group col-md-6">
            <label for="salaries">Salary</label>
            <input
              readonly
              type="text"
              class="form-control"
              id="salary"
              name="salary"
              placeholder="30.000"
              value=<?= $employee["salary"] ?> >
          </div>
          <div class="form-group col-md-6">
            <label for="travels">Travels</label><br>
            <?php echo join("<br>", array_map(function($travel) {
              return '<a href="index.php?controller=travel&action=displayTravel&id='.$travel['id'].'">'
              . $travel['date_from'] . ' - ' . $travel['place_to'] .'</a>';
            }, $travels));
            ?>
        </div>
        <a href="index.php?controller=employee&action=displayDashboard" class="btn btn-secondary">Back</a>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </form>
  </div>
</body>

</html>