<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POS | 401 Access Denied</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href=".assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href=".assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href=".assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href=".assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href=".assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">

  <!-- Main content -->
    <section class="content">

      <div class="error-page">
        <h3 class="headline text-red">401</h3>

        <div class="error-content">
          <br>
          <h3><i class="fa fa-warning text-red"></i> <?= $heading; ?></h3>

          <p>
            <?= $message; ?>
            Meanwhile, you may <a href=".">return to dashboard</a> or try to back.
          </p>
          
        </div>
      </div>
      <!-- /.error-page -->

    </section>
    <!-- /.content -->
  
<script src=".assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src=".assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src=".assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src=".assets/dist/js/adminlte.min.js"></script>
<script src=".assets/dist/js/demo.js"></script>
</body>
</html>
