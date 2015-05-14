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
<body>
	  <div class="container-narrow">
		<div class="masthead">
			<ul class="nav nav-pills pull-right">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="#">About</a></li>
      </ul>
			<h3 class="muted">ReSeminar Project</h3>
		</div>

		<hr>

<?php
	require ('RESTClient.php');

	$client = new RESTClient();
	$username=$_GET['username'];

	//echo $username;
	$result = $client->get('http://localhost/resfull/RESTServerP.php/pemilik/'.$username, array());
	
	$xml = simplexml_load_string($result);

	foreach ($xml->pemilik as $pemilik) {
		$username = htmlspecialchars($pemilik->username);
		$password = htmlspecialchars($pemilik->password);
		$nama_pemilik = htmlspecialchars($pemilik->nama_pemilik);
		$email = htmlspecialchars($pemilik->email);
		$alamat = htmlspecialchars($pemilik->alamat);
?>


<form action="proses_edit.php" method="POST">
      <fieldset>
      <legend><h3>Edit data</h3></legend>

        <h5>Username : </h5><input type="text" class="input-xlarge" placeholder="<?php echo $username; ?>" name="username"><br/>
        <h5>Password : </h5><input type="password" class="input-xlarge"  name="password"><br/>
        <h5>Nama Lengkap : </h5><input type="text" class="input-xlarge" placeholder="<?php echo $nama_pemilik; ?>" name="nama_pemilik"><br/>
        <h5>Email : </h5><input type="text" class="input-xlarge" placeholder="<?php echo $email; ?>" name="email"><br/>
        <h5>Alamat : </h5><input type="text" class="input-xlarge" placeholder="<?php echo $alamat; ?>" name="alamat"><br/>
		<br/>
      <button type="submit" class="btn btn-primary">Submit</button>
      </fieldset>
    </form>


<?php 
	}
?>

</body>
</html>