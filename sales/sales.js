let salesTableData = document.querySelector(".sales-table-data");
let searchbox = document.querySelector(".search-box");
if (searchbox) {
  searchbox.addEventListener("input", updateValue);
}

let sales = salesData;
renderTable(sales);

console.log(sales);

function updateValue() {
  let searchValue = searchbox?.value.toLowerCase();
  if (searchValue !== "" && searchValue !== undefined) {
    let filteredSales = sales.filter((sale) => {
      if (
        sale.name.toLowerCase().includes(searchValue) ||
        sale.surname.toLowerCase().includes(searchValue)
      ) {
        return true;
      } else {
        return false;
      }
    });
    renderTable(filteredSales);
  } else {
    renderTable(sales);
  }
}

function renderTable(salesData) {
  salesTableData.innerHTML = "";
  salesData.map((sale) => {
    salesTableData.innerHTML += `<tr class="employee-card">
                                      <td>${sale.sellerName}</td>
                                      <td>${sale.productName}</td>
                                      <td>${sale.items}</td>
                                      <td>${sale.price}</td>
                                      <td>
                                          <div class="actions">
                                              <a href="/zavprojekttwe/products/form.php?id=${sale.id}">
                                                  <div class="edit-icon"><i class="fa-solid fa-lg fa-edit"></i></div>
                                              </a>
                                              <a href="/zavprojekttwe/products/delete.php?id=${sale.id}">
                                                  <div class="delete-icon"><i class="fa-solid fa-lg fa-trash-alt"></i></div>
                                              </a>
                                          </div>
                                      </td>
                                  </tr>`;
  });
}
