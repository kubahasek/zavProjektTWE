"use strict";
let tableData = document.querySelector(".table-data");
let searchbox = document.querySelector(".search-box");
if (searchbox) {
  searchbox.addEventListener("input", updateValue);
}
let employees = employeesData;
renderTable(employees);
function updateValue() {
  let searchValue =
    searchbox === null || searchbox === void 0
      ? void 0
      : searchbox.value.toLowerCase();
  if (searchValue !== "" && searchValue !== undefined) {
    let filteredEmployees = employees.filter((employee) => {
      if (
        employee.name.toLowerCase().includes(searchValue) ||
        employee.surname.toLowerCase().includes(searchValue)
      ) {
        return true;
      } else {
        return false;
      }
    });
    renderTable(filteredEmployees);
  } else {
    renderTable(employees);
  }
}
function renderTable(employeesArray) {
  tableData.innerHTML = "";
  employeesArray.map((employee) => {
    tableData.innerHTML += `<tr class="employee-card">
                                    <td>${employee.id}</td>
                                    <td>${employee.name} ${employee.surname}</td>
                                    <td>${employee.job}</td>
                                    <td>
                                        <div class="actions">
                                            <a href="/zavprojekttwe/employees/employeeform.php?id=${employee.id}">
                                                <div class="edit-icon"><i class="fa-solid fa-lg fa-edit"></i></div>
                                            </a>
                                            <a href="/zavprojekttwe/employees/employeeform.php?id=${employee.id}">
                                                <div class="delete-icon"><i class="fa-solid fa-lg fa-trash-alt"></i></div>
                                            </a>
                                        </div>
                                    </td>
                                </tr>`;
  });
}
