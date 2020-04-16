$(function(){
    $('#diamonDraw').click(function(){
        $.ajax({
            url: 'Diamonddraw/get_dummy_data',
            dataType: 'json',
            type: 'post',
            contentType: 'application/json',
            data: JSON.stringify( { "first-name": $('#first-name').val(), "last-name": $('#last-name').val() } ),
            processData: false,
            success: function( data, textStatus, jQxhr ){
                $('#response pre').html( JSON.stringify( data ) );
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
        showModelDialog();
    });
});