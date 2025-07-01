function login() {
  const form = document.getElementById('fls_user_login_form');
  const frmData = new FormData(form);
  frmData.append('submit',true);
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "utils/do_login.php", false);
  xhttp.send(frmData);
  }

function validateForm(){
  alert("Name must be filled out");
  return false;
}