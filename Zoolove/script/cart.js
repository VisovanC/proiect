
function setSessionVariable(cart) {
  var formData = new FormData();
  formData.append('current_order', JSON.stringify(cart));
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "cart.php", false);
  xhttp.send(formData);
}

function addToCart(product) {
  const value = sessionStorage.getItem('cart');
  $('#fls-badge-chart').removeClass('d-none');
  if (!value) {
    const cart = [
      {
        id: product.id,
        quantity: 1,
        price: product.price
      }
    ];
    $('#fls-badge-chart').text(`1`);
    sessionStorage.setItem('cart', JSON.stringify(cart));
    setSessionVariable(cart);
    return;
  }
  let cart = JSON.parse(value);
  const newProduct = cart.find(element => element.id == product.id);
  if (newProduct !== undefined) {
    newProduct.quantity += 1;
  } else {
    product.quantity = 1;
    cart.push(product);
  }
  let items = 0;
  cart.forEach(item => {
    items += item.quantity;
  });
  sessionStorage.setItem('cart', JSON.stringify(cart));
  $('#fls-badge-chart').text(`${items}`);
  setSessionVariable(cart);
}

function removeFromCart(productId) {
  const value = sessionStorage.getItem('cart');
  if (!value) {
    return;
  }
  let cart = JSON.parse(value);

  const product = cart.find(element => element.id === productId);
  product.quantity -= 1;
  if (product.quantity === 0) {
    const index = cart.indexOf(product);
    if (index !== -1) {
      cart.splice(index, 1);
    }
  }
  sessionStorage.setItem('cart', JSON.stringify(cart));
  setSessionVariable(cart);
  location.reload();
}

function clearCart() {
  console.log('clear cart');
  sessionStorage.removeItem('cart');
  $('#fls-badge-chart').text(`0`);
  window.location.href="/";
}

function placeOrder() {
  const cart = sessionStorage.getItem('cart');
  var formData = new FormData();
  formData.append('current_order', JSON.stringify(cart));
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "utils/make_order.php", false);
  xhttp.send(formData);
  sessionStorage.removeItem('cart');
  location.reload();
}

$('#fls-badge-chart').ready(() => {
  const value = sessionStorage.getItem('cart');
  let cart = JSON.parse(value);
  if(!value){
    return;
  }
  let items = 0;
  cart.forEach(item => {
    items += item.quantity;
  });
  $('#fls-badge-chart').text(`${items}`);
})