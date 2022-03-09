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

$(document).on("click", ".btn-confirm", function () {
    var form = $(this).closest("form");

    Swal.fire({
        title: 'Are you sure?',
        text: "You will not be able to undo this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
            form.submit();
        }
    })
})