<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>MVC Basic</title>
</head>

<body>
  <div class="container mt-2">
    <h2 class="mb-3">Travel Details Page</h2>
    <form>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="placeFrom">From</label>
          <input
            readonly
            type="text"
            class="form-control"
            id="placeFrom"
            name="placeFrom"
            placeholder="Barcelona, Spain"
            value=<?=$row[" place_from"]?> >
        </div>
        <div class="form-group col-md-4">
          <label for="placeTo">Destination</label>
          <input
            readonly
            type="text"
            class="form-control"
            id="placeTo"
            name="placeTo"
            placeholder="New York, EEUU"
            value=<?=$row[" place_to"]?> >
        </div>
        <div class="form-group col-md-4">
          <label for="budget">Budget</label>
          <input
            readonly
            type="text"
            class="form-control"
            id="budget"
            name="budget"
            placeholder="1000€"
            value=<?=$row[" budget"]?> >
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="dateFrom">Date From</label>
          <input
            type="text"
            readonly
            class="form-control"
            id="dateFrom"
            name="dateFrom"
            placeholder="2020-01-01"
            value=<?=$row[" date_from"]?> >
        </div>
        <div class="form-group col-md-4">
          <label for="dateTo">Date To</label>
          <input
            readonly
            type="text"
            class="form-control"
            id="dateTo"
            name="dateTo"
            placeholder="2020-01-01"
            value=<?= $row[" date_to"] ?> >
        </div>
        <div class="form-group col-md-4">
          <label for="employees">Select Employee</label>
          <select
            readonly
            multiple
            class="form-control"
            id="employees"
            name="employees[]">
            <?php join(" ", array_map(function($employee) {
              return
                "<option value=".$employee['id'].">
                  " . $employee['first_name'] ." ". $employee['last_name'] ."
                </option>";
            }, $employees )) ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="reason">Reason</label>
        <textarea
          readonly
          class="form-control"
          id="reason"
          name="reason"
          rows="3"><?= $row["reason"] ?></textarea>
      </div>
      <a href="index.php?controller=travel&action=displayDashboard" class="btn btn-secondary">Back</a>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
</body>

</html>