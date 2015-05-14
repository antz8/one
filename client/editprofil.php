<?php 
	require ('RESTClient.php');
	require ('auth.php');
	require ('navigasi.php');

	$sesi = new Session();
	$client = new RESTClient();
	$nav = new Navigasi();
	$sesi->awal();
	$id_pemilik = $sesi->ambil_id();
	//$sesi->lihatsiapa();
	$result = $client->get('http://localhost/resfull/RESTServerP.php/pemilik/'.$id_pemilik, array());
	  
	$xml = simplexml_load_string($result);
	foreach ($xml->pemilik as $pemilik) {
		$username = htmlspecialchars($pemilik->username);
		$password = htmlspecialchars($pemilik->password);
		$nama_pemilik = htmlspecialchars($pemilik->nama_pemilik);
		$email = htmlspecialchars($pemilik->email);
		$alamat = htmlspecialchars($pemilik->alamat);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.min.css" />
    <style type="text/css">
		#main {
			margin:0 auto;
			float:none;
		}
		h5 {
			color: black;
		}
    </style>
</head>
<body>
	<div class="container container-fluid">
		<!-- =============================================== -->	
		<?php $nav->headd(); ?>
		<!-- =============================================== -->	
		<?php $nav->nav_editprofil(); ?>
		<!-- =============================================== -->
		<div class="row-fluid">
			<div class="span10" id="main">
				<h3>Edit Data Profil Anda</h3>
				<p>Semua harus diisi lengkap</p>
				<form action="proses_edit.php" method="POST">
					<fieldset>
						<h5>Username : </h5><input type="text" class="input-xlarge" value="<?php echo $username; ?>" name="username"><br/>
						<h5>Password : </h5><input type="password" class="input-xlarge"  name="password"><br/>
						<h5>Nama Lengkap : </h5><input type="text" class="input-xlarge" value="<?php echo $nama_pemilik; ?>" name="nama_pemilik"><br/>
						<h5>Email : </h5><input type="text" class="input-xlarge" value="<?php echo $email; ?>" name="email"><br/>
						<h5>Alamat : </h5><input type="text" class="input-xlarge" value="<?php echo $alamat; ?>" name="alamat"><br/>
						<button type="submit" class="btn btn-primary">Submit</button>
					</fieldset>
				</form>
			</div>
		</div>
<?php 
	} //close foreach
?>
		<hr>
		<!-- =============================================== -->
		<div class="footer">
	    	<p>&copy; ReSeminar 2013</p>
		</div>
	</div>
</body>
</html>