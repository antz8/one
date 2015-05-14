<?
	require ('auth.php');
  $sesi = new Session();
  $sesi->indexphp();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Signup ReSeminar</title>

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
	  <div class="container">
		<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="#">ReSeminar Project</a>
          <ul class="nav nav-pills pull-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </div>
      </div>
  </div>
  </div>
  <div class="container-narrow">
		
    <form action="proses_signup.php" method="POST">
      <fieldset>
      <legend><h3>Sign Up</h3></legend>

        <input type="text" class="input-xlarge" placeholder="Username" name="username"><br/>
        <input type="password" class="input-xlarge" placeholder="Password" name="password"><br/>
        <input type="text" class="input-xlarge" placeholder="Nama Lengkap" name="nama_pemilik"><br/>
        <input type="text" class="input-xlarge" placeholder="Email" name="email"><br/>
        <input type="text" class="input-xlarge" placeholder="Alamat" name="alamat"><br/>

      <button type="submit" class="btn btn-primary">Submit</button>
      </fieldset>
    </form>
      

    <hr>

      <div class="footer">
        <p>&copy; ReSeminar 2013</p>
      </div>
	</div>
</body>
</html>