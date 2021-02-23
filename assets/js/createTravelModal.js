import { openModal } from "./modal.js";

export function createTravelModal(employees) {
    const modal = document.createElement('div');
    modal.className = 'employee-modal centered-modal';
    modal.innerHTML = `
    <form 
        travel
        action="index.php?controller=travel&action=createTravel" 
        method="POST"
    >
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="budget">Budget</label>
                <input
                type="text"
                class="form-control"
                id="budget" name="budget"
                placeholder="1000€">
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="placeFrom">From</label>
            <input
            required
            type="text"
            class="form-control"
            id="placeFrom"
            name="placeFrom"
            placeholder="Barcelona, Spain">
        </div>
        <div class="form-group col-md-6">
            <label for="placeTo">Destination</label>
            <input
            required
            type="text"
            class="form-control"
            id="placeTo"
            name="placeTo"
            placeholder="New York, EEUU">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="dateFrom">Date From</label>
            <input 
            required
            type="text"
            class="form-control"
            id="dateFrom"
            name="dateFrom"
            placeholder="2020-01-01">
        </div>
        <div class="form-group col-md-6">
            <label for="dateTo">Date To</label>
            <input
            required
            type="text"
            class="form-control"
            id="dateTo"
            name="dateTo"
            placeholder="2020-01-01">
        </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
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
            placeholder="Travel Motivation"></textarea>
        </div>
        <button type="submit" class="btn btn-success mr-2">Create</button>
        <a href="index.php?controller=travel&action=displayDashboard" class="btn btn-secondary">Back</a>
    </form>`
    openModal({
        node: modal
    });
}