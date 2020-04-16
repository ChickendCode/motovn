$(function(){
    $('#diamonDraw').click(function(){

        $.ajax({
            url: 'Diamonddraw/get_dummy_data',
            type: 'POST',
            data: {'keyParam': 'valueParam'},
            success: function( data, textStatus, jQxhr ){
                showModelDialog(TYPE_SUCCESS);
                // showModelDialog(TYPE_DANGER);
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    });
});