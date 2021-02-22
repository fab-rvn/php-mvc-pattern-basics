const editForm = document.querySelector('form.edit');
if (editForm) {
  editForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    // formData.append('id', employee.id);
    const value = Object.fromEntries(formData.entries());
    axios.put("index.php?controller=employee&action=editEmployee&id=$id&modify=true", value);
    // updateEmployee(value, closeModal);
    console.log(value);
  })
}
console.log(editForm);
