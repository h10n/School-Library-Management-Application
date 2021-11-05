// function readURL(input, imagePreviewEl) {    
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             imagePreviewEl.css('background-image', 'url(' + e.target.result + ')');
//             imagePreviewEl.hide();
//             imagePreviewEl.fadeIn(650);
//         }
//         reader.readAsDataURL(input.files[0]);
//     }
// }

// function changeAvatar(e, el) {     
//     let imagePreviewEl = $(el).parent().parent().find('div.imagePreview');   
//     readURL(el, imagePreviewEl);
//     imagePreviewEl.css('background-size', 'cover');
// }

// $('.imageDelete').on('click', function () {            
//     let uploadEl = $(this).parent().parent().find('input[type=file]');        
//     if(imgUrl){        
//       $('.imagePreview').css('background-image', 'url('+imgUrl+')');
//     }else{
//       $('.imagePreview').css('background-image', 'url('+noImgUrl+')');
//       $('.imagePreview').css('background-size', 'initial');
//     }        
//     uploadEl.val('');
// });

function readURL(input, imagePreviewEl) {    
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            imagePreviewEl.css('background-image', 'url(' + e.target.result + ')');
            imagePreviewEl.hide();
            imagePreviewEl.fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function changeAvatar(e, el) {        
    let imagePreviewEl = $(el).parent().parent().find('div.imagePreview');       
    readURL(el, imagePreviewEl);    
}

$('.imageDelete').on('click', function () {            
    let uploadEl = $(this).parent().parent().find('input[type=file]');  
    let imagePreviewEl = $(this).parent().parent().find('div.imagePreview');       
    let imgUrl = imagePreviewEl.data('default');

    imagePreviewEl.css('background-image', 'url('+imgUrl+')');
    uploadEl.val('');
});