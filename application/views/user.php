
<p class="login-box-msg text-danger">
</p>

<?php echo form_open('user/update');?>

  <fieldset>
    <legend>Thông tin liên hệ</legend>
    <div class="form-group has-feedback">
      <?php echo form_input($email, '', array('readonly'=>'readonly','class' => 'form-control'));?>
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <?php echo form_input($phone, '', array('readonly'=>'readonly','class' => 'form-control'));?>
      <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
    </div>
  </fieldset>
  <fieldset>
    <legend>Đổi mật khẩu</legend>
    <div class="form-group has-feedback">
      <?php echo form_input($old_password, '', array('required'=>'required','class' => 'form-control', 'placeholder'=> 'Mật khẩu cũ'));?>
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <?php echo form_input($new_password, '', array('required'=>'required','class' => 'form-control', 'placeholder'=> 'Mật khẩu mới'));?>
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <?php echo form_input($re_password, '', array('required'=>'required','class' => 'form-control', 'placeholder'=> 'Nhập lại mật khẩu'));?>
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
  </fieldset>
  
  <div class="row">
    <div class="col-xs-12">
          <?php echo form_submit('submit', 'Gửi yêu cầu', array('required'=>'required','class' => 'btn btn-primary btn-block btn-flat'));?>
    </div>
  </div>
  <?php echo form_close();?>
  
  <!-- /.modal -->

<div class="modal fade" id="commonModel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">l</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" onclick="hideModelDialog()">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
 
<?php  if(isset($message)) {?>
    <script>
        showModelDialog('<?php echo $type ?>', TITLE, '<?php echo $message ?>');
    </script>
<?php }?>
 
 
