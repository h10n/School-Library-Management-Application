function readURL(input, element) {    
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(element).css('background-image', 'url(' + e.target.result + ')');
            $(element).hide();
            $(element).fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function changeAvatar(e, el) {    
    readURL(el, '#imagePreview');
    $('#imagePreview').css('background-size', 'cover');
}

$('#imageDelete').on('click', function () {        
    let uploadEl = $(this).parent().parent().find('input[type=file]');        
    if(imgUrl){        
      $('#imagePreview').css('background-image', 'url('+imgUrl+')');
    }else{
      $('#imagePreview').css('background-image', 'url('+noImgUrl+')');
      $('#imagePreview').css('background-size', 'initial');
    }        
    uploadEl.val('');
});