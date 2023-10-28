function cofirmDelete(link, title, body, btn){
  $('.modal form').attr('action', link);
  $('.modal-title').html(title);
  $('.modal-body p').html(body);
  $('.modal-footer button').html(btn);
  $('.modal').show();
}

function getResultSearchBox(search_product_name){
  var host = window.location.protocol + "//" + window.location.host;
    $.get(host+"/admin/product/search_name/"+search_product_name, function(data, status){
      $('.search-ajax-result').empty();
      $('.search-ajax-result').html(data);

      $('.media-body').click(function(){
        $('#search_product_name').val( $(this).attr('data-name'));
        $('#product_id').val($(this).attr('data-id'));
        $('#price').val($(this).attr('data-price'));
        $('#total_percent').html($(this).attr('data-price'));
        $('#total_price').html($(this).attr('data-price'));
        $('#sale_percent').val(0);
        $('#sale_price').val(0);
        $('.media').remove();
      });
    });
}
//Modal
$(document).ready(function() {
  //Alert Modal
  $('.btnDelete').click(function(){
    link = $(this).attr("data-link");
    title = $(this).attr("data-title");
    body = $(this).attr("data-body");
    btn = $(this).attr("data-btn");
    if(btn=='') btn = 'Xóa';
    cofirmDelete(link, title, body, btn);
  });
  $('.btn-secondary').click(function(){
    $('.modal').hide();
  });
  $('.close').click(function(){
    $('.modal').hide();
  });

  //Search box
  $('#search_product_name').keyup(function(){
    search_product_name = $(this).val();
    getResultSearchBox(search_product_name);
  });

  //Sale
  $('#sale_percent').keyup(function(){
    price = $('#price').val();
    $('#sale_price').val(0);
    $('#total_price').val(price);
    sale_percent = $(this).val();
    if(sale_percent > 100){
      alert('Không được lớn hơn 100');
      $(this).val(0);
      $('#total_percent').html(price);
      return;
    }
    $('#total_percent').html(price*(1-sale_percent/100));
  });
  $('#sale_price').keyup(function(){
    price = $('#price').val();
    $('#sale_percent').val(0);
    $('#total_percent').val(price);
    sale_price = $(this).val()*1;
    if(sale_price > price){
      alert('Giảm giá không thể lớn hơn giá gốc sản phẩm');
      $(this).val(0);
      $('#total_price').html(price);
      return;
    }else
    $('#total_price').html(price-sale_price);
    $('#total_percent').html(price);
  });
});
//CKEditor
ClassicEditor.create(document.querySelector('#ckeditor')).catch(error =>  {
  console.error(error);
});
ClassicEditor.create(document.querySelector('#ckeditor1')).catch(error =>  {
  console.error(error);
});
ClassicEditor.create(document.querySelector('#ckeditor2')).catch(error =>  {
  console.error(error);
});
ClassicEditor.create(document.querySelector('#ckeditor3')).catch(error =>  {
  console.error(error);
});