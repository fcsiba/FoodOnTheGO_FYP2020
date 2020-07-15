<!DOCTYPE html>
<html>
<head>
<title>Dashboard - Food On The Go</title>
 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
<link rel="stylesheet" type="text/css" href="<?php echo e(url('style.css')); ?>">
 
</head>
<body>
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Welcome Dashboard!</h3>
              <div class="card">
                  <div class="card-body">
                   
                  </div>
                  <div class="card-body">
                  <a class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"  href="<?php echo e(route('qrcoderoute')); ?>">Generate QR Code</a>
                    <a class="small" href="<?php echo e(url('logout')); ?>">Logout</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 
</body>
</html><?php /**PATH C:\xampp\htdocs\laravelcopyQR\resources\views/dashboard.blade.php ENDPATH**/ ?>