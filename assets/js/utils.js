const employeeEditForm = document.querySelector('form.edit[employee]');
if (employeeEditForm) {
  employeeEditForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const value = Object.fromEntries(formData.entries());
    axios
      .put("index.php?controller=employee&action=editEmployee&id=$id&modify=true", value)
      .then(() => window.location.href = "index.php?controller=employee&action=displayDashboard")
  })
}
console.log(employeeEditForm);

const travelEditForm = document.querySelector('form.edit[travel]');
if (travelEditForm) {
  travelEditForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const value = Object.fromEntries(formData.entries());
    axios
      .put("index.php?controller=travel&action=editTravel&id=$id&modify=true", value)
      .then(() => window.location.href = "index.php?controller=travel&action=displayDashboard")
  })
}
console.log(travelEditForm);