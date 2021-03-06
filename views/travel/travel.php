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
    <h2 class="mb-3">Travel Details Page</h2>
    <form>
        <div class="form-group col-md-4">
          <label for="placeFrom">From</label>
          <input
            readonly
            type="text"
            class="form-control"
            id="placeFrom"
            name="placeFrom"
            placeholder="Barcelona, Spain"
            value="<?=$travel["place_from"] ?>">
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
            value="<?=$travel["place_to"]?>">
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
            value=<?=$travel["budget"]?> >
        </div>
        <div class="form-group col-md-4">
          <label for="dateFrom">Date From</label>
          <input
            type="text"
            readonly
            class="form-control"
            id="dateFrom"
            name="dateFrom"
            placeholder="2020-01-01"
            value="<?=$travel["date_from"]?>">
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
            value=<?= $travel["date_to"] ?> >
        </div>
        <div class="form-group col-md-4">
          <label for="employees">Employees</label><br>
          <?php echo join("<br>", array_map(function($employee) {
            return '<a href="index.php?controller=employee&action=displayEmployee&id='.$employee['id'].'">'
            . $employee['first_name'] . ' ' . $employee['last_name'] .'</a>';
          }, $employees));
          ?>
        </div>
        <div class="form-group col-md-6">
          <label for="reason">Reason</label>
          <textarea
            readonly
            class="form-control"
            id="reason"
            name="reason"
            rows="3"><?= $travel["reason"] ?></textarea>
        </div>
        <a href="index.php?controller=travel&action=displayDashboard" class="btn btn-secondary">Back</a>
      </div>
    </form>
  </div>
</body>

</html>