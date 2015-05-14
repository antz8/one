<?php
	require ('RESTClient.php');
	require ('auth.php');
	require ('navigasi.php');

	$sesi = new Session();
	$client = new RESTClient();
	$nav = new Navigasi();
	$sesi->awal();
	$sesi->ambil_id();

	$path = @$_SERVER['PATH_INFO'];
	if ($path != null) {
		@$path_params = explode("/", $path);
	}

	if (@$path_params[1]!= null) {
		$result = $client->get('http://localhost/resfull/RESTServerP.php/seminar/'.@$path_params[1], array());
		$xml = simplexml_load_string($result);
		//print_r($xml);
		foreach ($xml->seminar as $seminar) {
			$id_seminar = htmlspecialchars($seminar->id_seminar);
			$nama_seminar = htmlspecialchars($seminar->nama_seminar);
		}
	}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Seminar yang Telah Dibuat</title>
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
			color: black;
		}
    </style>
</head>
<body>
	<div class="container container-fluid">
		<!-- =============================================== -->	
		<?php $nav->headd(); ?>
		<!-- =============================================== -->	
		<?php $nav->nav_lihatseminar(); ?>
		<!-- =============================================== -->
		<div class="row-fluid">
			<div class="span10" id="main">
				<a href="lihatseminar.php" class="btn-link">Back</a>
				<h2>Presensi Seminar "<?php echo $nama_seminar; ?>"</h2>
				<h4>Masukkan ID Peserta Anda!</h4>
				<form action="proses_presensi.php" method="POST">
				<fieldset>
					<input type="text" class="input-xlarge" placeholder="ID Peserta" name="id_peserta"><br/>
					<?php echo"<input type='hidden' name='id_seminar' value='".$id_seminar."'>"; ?>
					<button type="submit" class="btn btn-success">Masuk Seminar</button>
				</fieldset>
				</form>
			</div>
		</div>

	</div>
</body>
</html>