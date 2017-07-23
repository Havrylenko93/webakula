function getName(str) {
    if (str.lastIndexOf('\\')) {
        var i = str.lastIndexOf('\\') + 1;
    } else {
        var i = str.lastIndexOf('/') + 1;
    }
    var filename = str.slice(i);
    var uploaded = document.getElementById("fileformlabel");
    uploaded.innerHTML = filename;
}

$(document).ready(function(){
    $('.paulund_modal').paulund_modal_box();
});

function modal() {
    $('#modal').click(); $('body,html').animate({scrollTop: 0}, 400);
}