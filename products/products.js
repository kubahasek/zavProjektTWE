let productsTableData = document.querySelector(".products-table-data");
let searchbox = document.querySelector(".search-box");
if (searchbox) {
  searchbox.addEventListener("input", updateValue);
}

let Products = productsData;
renderTable(Products);

function updateValue() {
  let searchValue = searchbox?.value.toLowerCase();
  if (searchValue !== "" && searchValue !== undefined) {
    let filteredProducts = Products.filter((product) => {
      if (product.name.toLowerCase().includes(searchValue)) {
        return true;
      } else {
        return false;
      }
    });
    renderTable(filteredProducts);
  } else {
    renderTable(Products);
  }
}

function renderTable(ProductsArray) {
  productsTableData.innerHTML = "";
  ProductsArray.map((Product) => {
    productsTableData.innerHTML += `<tr class="employee-card">
                                      <td>${Product.name}</td>
                                      <td>${Product.category}</td>
                                      <td>
                                          <div class="actions">
                                              <a href="/zavprojekttwe/products/form.php?id=${Product.id}">
                                                  <div class="edit-icon"><i class="fa-solid fa-lg fa-edit"></i></div>
                                              </a>
                                              <a href="/zavprojekttwe/products/delete.php?id=${Product.id}">
                                                  <div class="delete-icon"><i class="fa-solid fa-lg fa-trash-alt"></i></div>
                                              </a>
                                          </div>
                                      </td>
                                  </tr>`;
  });
}
