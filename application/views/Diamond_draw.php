<div class="form-group">
<fieldset>
    <legend>Thông tin nhân vật</legend>
    <div class="form-group">
        <label>Chọn máy chủ*</label>
        <select class="form-control">
            <option>Chọn máy chủ</option>
            <?php foreach ($serverdata as $data) {?>
            <option value="<?php echo $data['Id'] ?>"><?php echo $data['ServerName'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Nhân vật*</label>
        <select class="form-control">
        </select>
    </div>
    <div class="form-group">
        <label>Rút kim cương*</label>
        <select class="form-control">
            <option>Chọn rút kim cương</option>
            <?php foreach ($diamondlist as $key => $value) {?>
            <option value="<?php echo $key ?>"><?php echo $value ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <?php echo form_submit('submit', 'Rút kim cương', array('class' => 'btn btn-primary btn-block btn-flat', 'id'=> 'diamonDraw'));?>
       </div>
    </div>
  </fieldset>
  </div>

  <div class="form-group">
  <fieldset>
    <legend>Lịch sử rút kim cương</legend>
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
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
                    <tr>
                        <td>1</td>
                        <td>
                            1.000.000
                        </td>
                        <td>1000</td>
                        <td>15/04 20:00</td>
                        <td>Justin</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            1.000.000
                        </td>
                        <td>1000</td>
                        <td>15/04 20:00</td>
                        <td>Justin</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            1.000.000
                        </td>
                        <td>1000</td>
                        <td>15/04 20:00</td>
                        <td>Justin</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            1.000.000
                        </td>
                        <td>1000</td>
                        <td>15/04 20:00</td>
                        <td>Justin</td>
                        <td></td>
                    </tr>
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </fieldset>
  </div>
  <script src="../../assets/js/diamon_draw.js"></script>