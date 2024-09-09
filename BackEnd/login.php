<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BES | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <b>BAGGAO'S BEST SYSTEM</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="username" id="username" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
           <div class="col-8">
            <div class="g-recaptcha" data-sitekey="6LeNySsqAAAAANUWNyRokyFxsMf6grxxgKd1FmSg" data-callback="en"></div>
          </div>
           
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-12">
            <button type="button" class="btn btn-success btn-block"  id="sign">Sign In</button> 
            <button type="button" class="btn btn-primary btn-block" id="register">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
</body>
</html>
<script>
  function en(){
    document.getElementById("sign").disabled = false;
    }
  $(document).ready(function(){
  

   

    $("#sign").click(function(){
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
      });

      var username=$("#username").val();
      var password=$("#password").val();
      $.ajax({
        url:'Actions/login.php',
        data:{username:username,password:password},
        type:'POST',
        success:function(data){
         // alert(data);
          if(data==='A'){
            window.location.href='index.php';
          }
          else if(data==='B'){
            window.location.href='../FrontEnd/index.php';
          }
       
          else if(data==='D'){
             Toast.fire({
              icon: 'error',
              title: 'Wrong Credentials. Try Again'
             })
          } 
        }
      });
    });

    $("#register").click(function(){
      window.location.href="register.php";
    });
  });
</script>