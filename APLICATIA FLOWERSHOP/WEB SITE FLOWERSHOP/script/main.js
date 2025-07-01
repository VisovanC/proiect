$('.product_image').click(function() {
    var valoare = $(this).data('id');
    $.ajax({
        url:'product_details.php',
        type: 'POST',
        data: { val: valoare },
        success: function(response) {
            const product = JSON.parse(response);
            $('#fls_pd_image').attr('src',product.image);
            $('#productModalLabel').text(product.name);
            $('#fls_pd_description').text(product.description);
            $('#fls_pd_price').text(product.price);
            $('#fls_pd_category').text(product.category_name);
            $('#add_cart_btn').click(()=>{             
              addToCart({
                id:valoare,
                quantity:1,
                price:product.price
              })
            })
    },
    error: function() {
        alert('A apărut o eroare în timpul trimiterii valorii către PHP.');
    }
    });
  });


function loadPage(page) {
  $.ajax({
    url: page,
    success: function(response) {
      $('#content').html(response);
    }
  });
}