<?php 
	require ('RESTClient.php');
	require ('auth.php');
	require ('navigasi.php');

	$sesi = new Session();
	$client = new RESTClient();
	$nav = new Navigasi();
	$sesi->indexphp();

	$path = @$_SERVER['PATH_INFO'];
	if ($path != null) {
		@$path_params = explode("/", $path);
	}

	$id_seminar = $path_params[1];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Seminar</title>

	<base href="http://localhost/resfull/client/">

	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.min.css" />
	<style type="text/css">
		#main {
			margin:0 auto;
			float:none;
		}
		p {
			color:black;
		}
	</style>
</head>
<body>
	<div class="container container-fluid">
		<div><br></div>
		<div class="navbar navbar-inverse">
		  <div class="navbar-inner">
		     <div class="container">
	          <a class="brand" href="#">ReSeminar Project</a>
	          <ul class="nav nav-pills pull-right">
	            <li><a href="index.php">Home</a></li>
	          </ul>
	        </div>
	      </div>
	  	</div>
		
		<div class="span8" id="main">
		<form action="proses_pendaftaran.php" method="POST">
			<fieldset>
			<legend><h3>Pendaftaran Seminar</h3></legend>
			<p>ID Seminar :<?php echo $id_seminar ?></p>
			<input type="text" class="input-xlarge" placeholder="Nama Lengkap" name="nama_peserta"><br/>
			<input type="text" class="input-xlarge" placeholder="Email" name="email_peserta"><br/>
			<input type="text" class="input-xlarge" placeholder="Alamat" name="alamat_peserta"><br/>
			<input type="text" class="input-xlarge" placeholder="Kota lokasi" name="lokasi"><br/>
			<input type="hidden" name="status" value="0">
			<input type="hidden" name="id_seminar" value="<?php echo $id_seminar ?>">
			<button type="submit" class="btn btn-primary">Submit</button>
			</fieldset>
		</form>
		</div>
	</div>
</body>
</html>