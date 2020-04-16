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

    $('#serverName').change(function(){
        var databaseName = $(this).val();
        $.ajax({
            url: 'Diamonddraw/get_figure',
            type: 'POST',
            data: {'databaseName': databaseName},
            success: function( data, textStatus, jQxhr ){
                data = JSON.parse(data);
                if (data.role) {
                    let html = '';
                    let roles = data.role;
                    for (let index = 0; index < roles.length; index++) {
                        const element = roles[index];
                        html += '<option value="'+ element.rid+'">' + element.rname + '</option>';
                    }
                    $('#figure').html(html);
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    });
});