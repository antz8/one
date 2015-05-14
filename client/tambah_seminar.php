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
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Seminar</title>
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
		<?php $nav->nav_tambah_seminar(); ?>
		<!-- =============================================== -->
		<div class="row-fluid">
			<div class="span10" id="main">
				<h3>Tambah Seminar</h3>
				<p>Semua harus diisi lengkap</p>
				<form action="proses_tambah_seminar.php" method="POST">
					<fieldset>
						<input type="text" class="input-xlarge" placeholder="Nama Seminar" name="nama_seminar"><br/>
						<input type="text" class="input-xlarge" placeholder="Tanggal Seminar" name="tanggal_seminar"><br/>
						<textarea class="field span4" rows="3" cols="100" name="deskripsi" placeholder="Tulis deskripsi mengenai seminar anda!"></textarea><br/>
						<?php echo"<input type='hidden' name='id_pemilik' value='".$id_pemilik."'>"; ?>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</fieldset>
				</form>
			</div>
		</div>
		<hr>
		<!-- =============================================== -->
		<div class="footer">
	    	<p>&copy; ReSeminar 2013</p>
		</div>
	</div>
</body>
</html>