function loadPage(page) {
  $.ajax({
    url: page,
    success: function(response) {
      $('#content').html(response);
    }
  });
}

function show_alert(alert){

  $('#alert_box').html(alert);
  $('#alert_box').show();
  setTimeout(()=>{
    $('#alert_box').hide();
  }, 2000)
}
$(document).ready(function() {
  $('.nav-link').click(function(e) {
    e.preventDefault();
    var page = $(this).attr('href');
    loadPage(page);
  });
});