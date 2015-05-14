<?php
	require ('RESTClient.php');
	require ('auth.php');
	require ('navigasi.php');


	$client = new RESTClient();
	session_start();
	$nama_peserta = $_SESSION['nama_peserta'];
	$id_seminar = $_SESSION['id_seminar'];

	$data = "<pesertas><peserta><id_seminar>" . $id_seminar . "</id_seminar><nama_peserta>" . $nama_peserta . "</nama_peserta></peserta></pesertas>";

	$result = $client->post('http://localhost/resfull/RESTServerP.php/pesertaa/', $data);
		$xml = simplexml_load_string($result);
		//print_r($xml);
		foreach ($xml->peserta as $peserta) {
			$id_peserta = htmlspecialchars($peserta->id_peserta);
		}
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
		h4 {
			color:red;
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
		<!-- ========================================== -->
		<div class="span10" id="main">
			<a href="seminar.php" class="btn-link">Back</a>
			<h3>Selamat, Anda Telah Terdaftar.. Harap CATAT di bawah ini, untuk Anda Presensi saat seminar</h3>
			<h4>ID Peserta Anda :<?php echo $id_peserta; ?></h4>
			
		</div>
	</div>
</body>
</html>