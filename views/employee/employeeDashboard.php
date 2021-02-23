<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
  <script src="./assets/js/createEmpModal.js" defer type="module"></script>
  <title>MVC Basic</title>
</head>

<body>
  <div class="container mt-2">
    <h2 class="mb-3">Employee Dashboard</h2>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Birthday</th>
          <th scope="col">Role</th>
          <th scope="col">View</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($employees as $row) {
          $id = $row['id'];
          echo
          '<tr>
      <td>' . $row["id"] . '</td>
      <td>' . $row["first_name"] . '</td>
      <td>' . $row["last_name"] . '</td>
      <td>' . $row["birth_date"] . '</td>
      <td>' . $row["job_title"] . '</td>
      <td><a href=' . "index.php?controller=employee&action=displayEmployee&id=$id" . ' class="btn btn-primary">View</a></td>
      <td><a data-id="' . $id . '" class="editEmp btn btn-info">Edit</a></td>
      <td><a href=' . "index.php?controller=employee&action=deleteEmployee&id=$id" . ' class="btn btn-danger">Delete</a></td>

    </tr>';
        }
        ?>
      </tbody>
    </table>
    <a id="createEmp" class="btn btn-success mt-2 mr-1">Create</a>
    <a href="index.php" class="btn btn-secondary mt-2 ml-1">Back</a>
  </div>
  <script type="module">
    import {
      editEmpModal
    } from "./assets/js/editEmpModal.js";
    import {
      createEmpModal
    } from "./assets/js/createEmpModal.js";

    const createButton = document.querySelector("#createEmp");
    createButton.addEventListener("click", createEmpModal);

    let employees = <?= json_encode($employees) ?>;
    const editButtons = document.querySelectorAll(".editEmp");
    editButtons.forEach(button => button.addEventListener("click", openEditModal))

    function openEditModal(event) {
      const employee = getEmployeeById(event.target.dataset.id);
      editEmpModal(employee)
    }

    function getEmployeeById(id) {
      return employees.filter((employee) => employee.id == id)[0];
    }
  </script>
</body>
</html>