import { openModal } from './modal.js';

export function editEmpModal(employee) {
	const modal = document.createElement('div');
	modal.className = 'employee-modal centered-modal';
	modal.innerHTML = `<form>
    <div class="form-row">
        <input hidden name="id" value="${employee.id}">
      <div class="form-group col-md-6">
        <label for="firstName">First Name</label>
        <input
          type="text"
          class="form-control"
          id="firstName"
          name="firstName"
          placeholder="First Name"
          value="${employee.first_name}">
      </div>
      <div class="form-group col-md-6">
        <label for="lastName">Last Name</label>
        <input
          type="text"
          class="form-control"
          id="lastName"
          name="lastName"
          placeholder="Last Name"
          value="${employee.last_name}">
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
          placeholder="2020-01-01"
          value="${employee.birth_date}">
      </div>
      <div class="form-group col-md-6">
        <label for="dateFrom">Hired Date</label>
        <input
          type="text"
          class="form-control"
          id="hiredDate"
          name="hiredDate"
          placeholder="2020-01-01"
          value="${employee.hired_date}">
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
          placeholder="Job Title"
          value="${employee.job_title}">
      </div>
      <div class="form-group col-md-4">
        <label for="salaries">Salary</label>
        <input
          type="text"
          class="form-control"
          id="salary"
          name="salary"
          placeholder="30.000"
          value="${employee.salary}">
      </div>
    </div>
    <button type="submit" class="btn btn-success mr-2">Edit</button>
    <button id="closeButton" class="btn btn-secondary">Back</a>
  </form>`;

	const closeModal = openModal({
		node: modal,
	});

	const employeeEditForm = modal.querySelector('form');
	if (employeeEditForm) {
		employeeEditForm.addEventListener('submit', (event) => {
			event.preventDefault();
			const formData = new FormData(event.target);
			const value = Object.fromEntries(formData.entries());
			axios
				.put('index.php?controller=employee&action=editEmployee', value)
				.then(() => (window.location.href = 'index.php?controller=employee&action=displayDashboard'));
		});
	}

	const closeButton = modal.querySelector('#closeButton');
	closeButton.addEventListener('click', closeModal);
}
