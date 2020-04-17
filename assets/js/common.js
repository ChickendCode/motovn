const TYPE_SUCCESS = 'modal-success';
const TYPE_DANGER = 'modal-danger';
const TITLE = "Thông báo";
var callBackFn;

function showModelDialog(type, title, message, callback) {
    let typeRemove;
    if (type == TYPE_DANGER) {
        typeRemove = TYPE_SUCCESS;
    } else {
        typeRemove = TYPE_DANGER;
    }
    $('#commonModel').removeClass(typeRemove);
    $('#commonModel').addClass(type);
    $('.modal-title').html(title);
    $('.modal-body').html(message);

    $('#commonModel').css({'display': 'block', 'padding-right': '16px'});
    $('#commonModel').addClass('in');

    callBackFn = callback;
}

function hideModelDialog() {
    $('#commonModel').css({'display': 'none'});
    $('#commonModel').removeClass('in');

    if (callBackFn) {
        callBackFn();
    }
}