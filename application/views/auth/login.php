<!DOCTYPE html>
<html>
	<head>

	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>SIM Asset | Log in</title>
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
  </head>

<body class="hold-transition login-page">

<div class="login-box">

  <div class="login-logo">
    <img src="<?= base_url('assets/dist/img/nj.png'); ?>" width="100px" alt=""><br>
    <a href="<?= base_url(); ?>"><b>SIM Asset</b></a>
    <p>PP Nurul Jadid</p>
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?= $this->session->flashdata('message'); ?>

    <form action="<?= base_url('auth'); ?>" method="post">

      <div class="form-group has-feedback">
        <input type="username" name="username" class="form-control" placeholder="Username" autofocus required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?> 
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?> 
      </div>

      <div class="row">
        <div class="col-xs-4 pull-right">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>

    </form>

  </div>
</div>

<script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>