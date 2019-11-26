$(document).ready(function(){
  $(document.body).on('submit','.js-confirm',function(){
    var $el = $(this)
    var text = $el.data('confirm') ? $el.data('confirm') : 'Anda yakin melakukan tindakan ini ?'
    var c = confirm(text);
    return c;
  });

  $(document.body).on('submit','.js-review-delete', function(){
    var $el = $(this);
    var text = $el.data('confirm') ? $el.data('confirm') : 'Anda yakin melakukan tindakan ini ?';
    var c = confirm(text);
    if (c === false) return c;
    //delete via ajax
    event.preventDefault();
    //delete books data with ajax
    $.ajax({
      type : 'POST',
      url : $(this).attr('action'),
      dataType : 'json',
      data : {
        _method : 'DELETE',
        //add csrf token from Laravel
        _token : $(this).children('input[name=_token]').val()
    }
  }).done(function(data){
    rows = $('#form-'+data.id).closest('tr');
    rows.fadeOut(300, function(){
      $(this).remove()
    });
  });
  });
});

// add selectize to select element
$('.js-selectize').selectize({
  sortField: 'text'
});
