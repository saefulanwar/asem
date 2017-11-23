<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $__env->yieldContent('title', 'MyBlog'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/backend/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/backend/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/backend/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/backend/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="/backend/plugins/simplemde/simplemde.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
  <link rel="stylesheet" href="/swtalert/sweetalert.css">
  <link rel="stylesheet" href="/backend/css/custom.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php echo $__env->make('includes.backend.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('includes.backend.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <?php echo $__env->yieldContent('content'); ?>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/backend/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/backend/js/bootstrap.min.js"></script>
<script src="/backend/plugins/simplemde/simplemde.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/swtalert/sweetalert.min.js"></script>
<script src="/backend/js/app.min.js"></script>
<script src="/backend/js/jquery.steps.js"></script>
<script src="/backend/js/custom.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
