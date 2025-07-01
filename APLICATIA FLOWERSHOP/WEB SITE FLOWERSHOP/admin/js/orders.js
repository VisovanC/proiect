$('#fls_order_status').on('change', (e) => {
  const order_id = $('#fls_oreder_id')[0].value;
  const order_status = e.target.value;
  const frmData = new FormData();
  frmData.append('submit', true);
  frmData.append('order_id', order_id);
  frmData.append('order_status', order_status);
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "orders/update_status.php", false);
  xhttp.send(frmData);
  show_alert(xhttp.response);
})


function delete_order(order){
  const order_id = order.id;
  const frmData = new FormData();
  frmData.append('order_id', order_id);
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "orders/delete_order.php", false);
  xhttp.send(frmData);
  loadPage('orders.php');
  show_alert(xhttp.response);
}