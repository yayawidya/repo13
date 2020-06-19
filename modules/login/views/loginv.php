<!DOCTYPE html>
<html>
<head>
   <style> 
  .notifications {
    cursor: pointer;
    position: fixed;
    right: 500px;
    left:500px;
    z-index: 9999;
    top: 20px;
    margin-bottom: 22px;
    margin-right: 15px;
    min-width: 300px; 
    max-width: 800px;  
}</style>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-1.7.1.min.js"></script>
 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Login</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post" action="<?php echo base_url('login/masuk'); ?>">

      <?php  
        // Cetak jika ada notifikasi
        if($this->session->flashdata('sukses')) {
        echo '<p class=warning style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
        }
      ?>

      <?php 
        echo form_open('login/masuk');
      ?>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="username" value="<?php echo set_value('username'); ?>" name="username">
          <?php 
            echo form_error('username');
          ?> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>


        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" name="password">
          <p>
          <?php 
            echo form_error('password');
          ?>
          </p>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="btnSubmit" value="Login">Sign In</button>
             <div class="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
            <?php 
              echo form_close();
            ?>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <?php echo anchor(base_url().'login/register','Register a new member');
      ?>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

      
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
 <script>   
    $('.notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>

</body>
</html>
