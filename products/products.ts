/* let tableData: HTMLElement | null = document.querySelector(".table-data");
let searchbox: HTMLInputElement | null = document.querySelector(".search-box"); */
if (searchbox) {
  searchbox.addEventListener("input", updateValue);
}

type Product = {
  id: number;
  name: string;
  description: string;
  category: string;
  price: number;
  stock: number;
};

let Products: Array<Product> = productsData;

renderTable(employees);

function updateValue() {
  let searchValue: string | undefined = searchbox?.value.toLowerCase();
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

function renderTable(ProductsArray: Array<Product>) {
  tableData.innerHTML = "";
  ProductsArray.map((Product) => {
    tableData.innerHTML += `<tr class="employee-card">
                                    <td>${Product.name}</td>
                                    <td>${Product.category}</td>
                                    <td>
                                        <div class="actions">
                                            <a href="/zavprojekttwe/employees/employeeform.php?id=${Product.id}">
                                                <div class="edit-icon"><i class="fa-solid fa-lg fa-edit"></i></div>
                                            </a>
                                            <a href="/zavprojekttwe/employees/delete.php?id=${Product.id}">
                                                <div class="delete-icon"><i class="fa-solid fa-lg fa-trash-alt"></i></div>
                                            </a>
                                        </div>
                                    </td>
                                </tr>`;
  });
}
