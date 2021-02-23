import { openModal } from "./modal.js";

export function editTravelModal(travel, employees) {
    const modal = document.createElement('div');
    modal.className = 'employee-modal centered-modal';
    modal.innerHTML = `<form>
    <div class="form-row">
      <input hidden value=${travel.id} name="id" type="number"></input>
      <div class="form-group col-md-4">
        <label for="placeFrom">From</label>
        <input
          type="text"
          class="form-control"
          id="placeFrom"
          name="placeFrom"
          placeholder="Barcelona, Spain"
          value=${travel.place_from}>
      </div>
      <div class="form-group col-md-4">
        <label for="placeTo">Destination</label>
        <input
          type="text"
          class="form-control"
          id="placeTo"
          name="placeTo"
          placeholder="New York, EEUU"
          value=${travel.place_to}>
      </div>
      <div class="form-group col-md-4">
        <label for="budget">Budget</label>
        <input
          type="text"
          class="form-control"
          id="budget" name="budget"
          placeholder="1000€"
          value=${travel.budget}>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="dateFrom">Date From</label>
        <input type="text"
          class="form-control"
          id="dateFrom"
          name="dateFrom"
          placeholder="2020-01-01"
          value=${travel.date_from}>
      </div>
      <div class="form-group col-md-4">
        <label for="dateTo">Date To</label>
        <input
          type="text"
          class="form-control"
          id="dateTo"
          name="dateTo"
          placeholder="2020-01-01"
          value=${travel.date_to}>
      </div>
      <div class="form-group col-md-4">
        <label for="employees">Select Employee</label>
        <select
            required
            multiple
            class="form-control"
            id="employees"
            name="employees[]">        
            ${
                employees.map(employee=> {
                    return `<option value="${employee.id}">
                    ${employee.first_name} ${employee.last_name}
                    </option>`
                }).join()
            }
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="reason">Reason</label>
      <textarea
        class="form-control"
        id="reason"
        name="reason"
        rows="3"
        placeholder="Travel Motivation">${travel.reason}</textarea>
    </div>
    <button type="submit" class="btn btn-success mr-2">Edit</button>
    <a href="index.php?controller=travel&action=displayDashboard" class="btn btn-secondary">Back</a>
  </form>`
    const travelEditForm = modal.querySelector('form');
    if (travelEditForm) {
        travelEditForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const formData = new FormData(event.target);
            const value = Object.fromEntries(formData.entries());
            axios
            .put("index.php?controller=travel&action=editTravel", value)
            .then(() => window.location.href = "index.php?controller=travel&action=displayDashboard")
        })
    }
    openModal({
        node: modal
    });
}