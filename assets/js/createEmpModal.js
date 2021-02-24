import { openModal } from './modal.js';

export function createEmpModal() {
	const modal = document.createElement('div');
	modal.className = 'employee-modal centered-modal';
	modal.innerHTML = `<form
    action="index.php?controller=employee&action=createEmployee"
    method="POST">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="firstName">First Name</label>
        <input
          type="text"
          class="form-control"
          id="firstName"
          name="firstName"
          placeholder="First Name">
      </div>
      <div class="form-group col-md-6">
        <label for="lastName">Last Name</label>
        <input
          type="text"
          class="form-control"
          id="lastName"
          name="lastName"
          placeholder="Last Name"
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="dateTo">Birthday</label>
        <input
          type="text"
          class="form-control"
          id="birthday"
          name="birthday"
          placeholder="2020-01-01">
      </div>
      <div class="form-group col-md-6">
        <label for="dateFrom">Hired Date</label>
        <input
          type="text"
          class="form-control"
          id="hiredDate"
          name="hiredDate"
          placeholder="2020-01-01">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="jobTitle">Role</label>
        <input
          type="text"
          class="form-control"
          id="jobTitle"
          name="jobTitle"
          placeholder="Job Title">
      </div>
      <div class="form-group col-md-4">
        <label for="salaries">Salary</label>
        <input
          type="text"
          class="form-control"
          id="salary"
          name="salary"
          placeholder="30.000">
      </div>
    </div>
    <button type="submit" class="btn btn-success mr-2">Create</button>
    <button id="closeButton" class="btn btn-secondary">Back</button>
  </form>`;
	const closeModal = openModal({
		node: modal,
	});

	const closeButton = modal.querySelector('#closeButton');
	closeButton.addEventListener('click', closeModal);
}
