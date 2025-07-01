function deleteProduct(productId){
  const frmData = new FormData();
  frmData.append('id',productId);
  console.log(frmData)
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "products/delete_product.php", false);
  xhttp.send(frmData);
  render_products();
  show_alert(xhttp.response);
};

function addNewProduct(event) {
  const form = document.getElementById('add_product_form');
  const frmData = new FormData(form);
  frmData.append('submit',true);
  console.log(frmData)
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "products/new_product.php", false);
  xhttp.send(frmData);
  render_products();
  show_alert(xhttp.response);
}

function save_product(){
  const form = document.getElementById('edit_product_form');
  const frmData = new FormData(form);
  frmData.append('submit',true);
  console.log(frmData)
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "products/edit_product.php", false);
  xhttp.send(frmData);
  render_products();
  show_alert(xhttp.response);
}

function render_products(){
  loadPage('products.php');
}