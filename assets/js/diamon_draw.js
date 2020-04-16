$(function(){
    $('#diamonDraw').click(function(){

        $.ajax({
            url: 'Diamonddraw/get_dummy_data',
            type: 'POST',
            data: {'keyParam': 'valueParam'},
            success: function( data, textStatus, jQxhr ){
                showModelDialog(TYPE_SUCCESS, TITLE, 'Rút tiền thành công');
                // showModelDialog(TYPE_DANGER, TITLE, 'Rút tiền thất bại');
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    });
});