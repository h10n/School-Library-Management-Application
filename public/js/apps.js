// $(document).ready(function(){
//   $(document.body).on('submit','.js-confirm',function(){
//     var $el = $(this)
//     var text = $el.data('confirm') ? $el.data('confirm') : 'Anda yakin melakukan tindakan ini ?'
//     var c = confirm(text);
//     return c;
//   });

//   $(document.body).on('submit','.js-review-delete', function(){
//     var $el = $(this);
//     var text = $el.data('confirm') ? $el.data('confirm') : 'Anda yakin melakukan tindakan ini ?';
//     var c = confirm(text);
//     if (c === false) return c;
//     //delete via ajax
//     event.preventDefault();
//     //delete books data with ajax
//     $.ajax({
//       type : 'POST',
//       url : $(this).attr('action'),
//       dataType : 'json',
//       data : {
//         _method : 'DELETE',
//         //add csrf token from Laravel
//         _token : $(this).children('input[name=_token]').val()
//     }
//   }).done(function(data){
//     rows = $('#form-'+data.id).closest('tr');
//     rows.fadeOut(300, function(){
//       $(this).remove()
//     });
//   });
//   });
// });

// add selectize to select element
$('.js-selectize').selectize({
  sortField: 'text'
});

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  function add(link, title) {
      $(".modal-title").html('<span class="glyphicon glyphicon-plus"></span> Tambah ' + title);
      save_method = 'add';
      $('#modal_form').modal('show');
      $.get(link,
          function (html) {
              $(".modal-body").html(html);
          }
      );
  }

  function edit(link, title) {
      $(".modal-title").html('<span class="glyphicon glyphicon-pencil"></span> Edit ' + title);
      save_method = 'update';
      $('#modal_form').modal('show');
      $.get(link,
          function (html) {
              $(".modal-body").html(html);
          }
      );
  }
  // $(function () {
  //     createMarquee({
  //         duration: 90000
  //     });
  // });

  $(document).on("click", ".btn-confirm", function(){
  var form = $(this).closest("form");
  
  Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya!',
      cancelButtonText: 'Batal'
  }).then((result) => {
      if (result.value) {                
          form.submit();
      }
  })
})        