<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="login-logo">
    <a href="#"><b>Admin </b><?php echo $title; ?></a>
</div>

<div class="login-box-body">
    <p class="login-box-msg"><?php echo lang('auth_sign_session'); ?></p>
    <?php echo $message;?>

    <?php echo form_open('auth/login');?>
        <div class="form-group has-feedback">
            <?php echo form_input($identity);?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?php echo form_input($password);?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?><?php echo lang('auth_remember_me'); ?>
                    </label>
                </div>
            </div>
            <div class="col-xs-4">
                <?php echo form_submit('submit', lang('auth_login'), array('class' => 'btn btn-primary btn-block btn-flat'));?>
            </div>
        </div>
<?php echo form_close();?>
