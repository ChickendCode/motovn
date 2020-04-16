const TYPE_SUCCESS = 'modal-success';
const TYPE_DANGER = 'modal-danger';

function showModelDialog(type) {
    let typeRemove;
    if (type == TYPE_DANGER) {
        typeRemove = TYPE_SUCCESS;
    } else {
        typeRemove = TYPE_DANGER;
    }
    $('#commonModel').removeClass(typeRemove);
    $('#commonModel').addClass(type);

    $('#commonModel').css({'display': 'block', 'padding-right': '16px'});
    $('#commonModel').addClass('in');
}

function hideModelDialog() {
    $('#commonModel').css({'display': 'none'});
    $('#commonModel').removeClass('in');
}