<?
  require ('auth.php');
  $sesi = new Session();
  $sesi->indexphp();
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
		<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.min.css" />

	<style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
</head>
<!-- =========================================================================== -->
<body>
	<div class="container">
  <div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="#">ReSeminar Project</a>
          <ul class="nav nav-pills pull-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="signup.php">Sign Up</a></li>
          </ul>
        </div>
      </div>
  </div>
    <form action="proses_login.php" method="post" class="form-signin">
      <h3 class="form-signin-heading">Please login</h3>
      <input type="text" class="input-block-level" placeholder="Username" name="usernamelogin">
      <input type="password" class="input-block-level" placeholder="Password" name="password">   
      <button class="btn btn-medium btn-primary" type="submit" name="btn_login" value="login">Sign in</button>
    </form>
    <hr>
    <div class="footer">
      <p>&copy; ReSeminar 2013</p>
    </div>  
  </div> <!-- /container -->
</body>
</html>