<div class="form-group">
<fieldset>
    <form id="diamondForm">
    <legend>Thông tin nhân vật</legend>
    <div class="form-group">
        <label>Chọn máy chủ*</label>
        <select class="form-control"  id="serverName" required>
            <option value="">Chọn máy chủ</option>
            <?php foreach ($serverdata as $data) {?>
            <option value="<?php echo $data['DatabaseName'] ?>"><?php echo $data['ServerName'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Nhân vật*</label>
        <select class="form-control" id="figure" required>
        </select>
    </div>
    <div class="form-group">
        <label>Rút kim cương*</label>
        <select class="form-control" id="money" required>
            <option value="">Chọn rút kim cương</option>
            <?php foreach ($diamondlist as $key => $value) {?>
            <option value="<?php echo $key ?>"><?php echo $value ?></option>
            <?php } ?>
        </select>
    </div>
    <form>
    <div class="row">
        <div class="col-xs-12">
            <?php echo form_button('submit', 'Rút kim cương', array('class' => 'btn btn-primary btn-block btn-flat', 'id'=> 'diamonDraw'));?>
       </div>
    </div>
    
  </fieldset>
  </div>

  <div class="form-group">
  <fieldset>
    <legend>Lịch sử rút kim cương</legend>
    <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="logDraw" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Xu</th>
                  <th>K/C nhận</th>
                  <th>Ngày nhận</th>
                  <th>Tên nhân vật</th>
                  <th>Class</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $count = 1;
                    foreach ($tranlog as $data) {?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo number_format(($data['coin_request'] / 100), 3, '.', '.'); ?></td>
                            <td><?php echo number_format(($data['coin_receive'] / 100), 3, '.', '.'); ?></td>
                            <td><?php echo $data['timecreate'] ?></td>
                            <td><?php echo $data['rolename'] ?></td>
                            <td></td>
                        </tr>
                    <?php $count++; } ?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </fieldset>
  </div>
  <script src="../../assets/js/diamon_draw.js"></script>
  <script>
    $('#logDraw').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
    });
  </script>