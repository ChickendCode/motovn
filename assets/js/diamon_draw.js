$(function(){
    $('#diamonDraw').click(function(){
        var money = $('#money').val();
        var serverName = $('#serverName').val();
        var figure = $('#figure').val();

        if (serverName == '') {
            showModelDialog(TYPE_DANGER, TITLE, 'Vui lòng chọn máy chủ');
            return;
        }

        if (figure == '' || figure == null) {
            showModelDialog(TYPE_DANGER, TITLE, 'Vui lòng chọn nhân vật');
            return;
        }

        if (money == '' ) {
            showModelDialog(TYPE_DANGER, TITLE, 'Vui lòng chọn kim cương');
            return;
        }
        
        $.ajax({
            url: 'Diamonddraw/diamon_draw',
            type: 'POST',
            data: {'money': money, 'serverName' : serverName},
            success: function(data, textStatus, jQxhr ){
                data = JSON.parse(data);
                if (data.status == 'OK') {
                    showModelDialog(TYPE_SUCCESS, TITLE, 'Rút tiền thành công', callBackFn);
                } else {
                    showModelDialog(TYPE_DANGER, TITLE, data.errors[0]);
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                showModelDialog(TYPE_DANGER, TITLE, 'Rút tiền thất bại');
            }
        });
    });

    function callBackFn() {
        location.reload();
    }

    $('#serverName').change(function(){
        var databaseName = $(this).val();
        $.ajax({
            url: 'Diamonddraw/get_figure',
            type: 'POST',
            data: {'databaseName': databaseName},
            success: function( data, textStatus, jQxhr ){
                data = JSON.parse(data).data;
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