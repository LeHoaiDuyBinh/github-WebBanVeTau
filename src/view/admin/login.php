<?php 
session_start();
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Login</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <!-- Stylesheets-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link rel="stylesheet" href="/view/css/admin.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body style="max-height: 400px;">
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
       
      </div>
    </div>
    <div class="page">

        <!-- BUTTON ADMIN OR USER -->
        <div id="wrapper">
            <form id="form-login" method="POST"  action="/?action=login">
                <h1 class="form-heading">LOGIN ADMIN</h1>
                <?php if(isset($_SESSION['message'])): ?>
                  <p><?php echo $_SESSION['message']; ?></p>
                  <?php unset($_SESSION['message']); ?>
                <?php endif; ?>
                <!-- <div class="alert alert-danger">Username or password is incorrect.</div> -->
                <div class="form-group">
                    <i class="far fa-user"></i> 
                    <input type="email" class="form-input" placeholder="Email" name="Email">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <input type="password" class="form-input" placeholder="password" name="password">
                    <div id="eye">
                        <i class="far fa-eye"></i>
                    </div>
                </div>
                <input type="submit" value="Đăng nhập" class="form-submit">
            </form>
        </div>
     
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="../javascript/admin.js"></script> -->
  </body>
</html>