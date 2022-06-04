const params = new URLSearchParams(window.location.search);
if (params.has("toast")) {
  let color = params.get("color");
  let message = params.get("message");
  displayToast(color, message);
  window.history.replaceState({}, "", "/zavprojekttwe/products/");
}

function displayToast(color, message) {
  Toastify({
    text: message,
    duration: 3000,
    gravity: "top", // `top` or `bottom`
    position: "center", // `left`, `center` or `right`
    stopOnFocus: true, // Prevents dismissing of toast on hover
    style: {
      background: color,
      borderRadius: "25px",
    },
  }).showToast();
}
