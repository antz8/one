<?
  require ('auth.php');
  $sesi = new Session();
  $sesi->indexphp();

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reseminar</title>

		<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.min.css" />

	<style type="text/css">
		 body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
	</style>
</head>
<!-- =========================================================================== -->
<body>
	  <div class="container-narrow">
		<div class="masthead">
			<ul class="nav nav-pills pull-right">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="#">About</a></li>
			</ul>
			<h3 class="muted">ReSeminar Project</h3>
		</div>

		<hr>

      <div class="jumbotron">
        <h1>Connet your seminar online Now!</h1>
        <br/>
        <a class="btn btn-large btn-success" href="signup.php">Sign up today</a>
        <br/>
        <h3>Or, become a participant and attend the seminar!</h3>
        <br/>
        <a class="btn btn-large btn-info" href="seminar.php">Show seminars</a>
      </div>
      <hr>
      <div class="footer">
        <p>&copy; ReSeminar 2013</p>
      </div>
	</div>
</body>
</html>