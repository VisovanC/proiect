function delete_client(id){
  const frmData = new FormData();
  frmData.append('client_id', id);
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "clients/delete_client.php", false);
  xhttp.send(frmData);
  loadPage('clients.php');
  show_alert(xhttp.response);
}