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
		<!-- =============================================== -->
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
<?php 
	require ('RESTClient.php');
	require ('auth.php');
	require ('navigasi.php');

	$sesi = new Session();
	$client = new RESTClient();
	$nav = new Navigasi();
	$sesi->indexphp();
	//$sesi->lihatsiapa();
	//======================================================
	$path = @$_SERVER['PATH_INFO'];
	if ($path != null) {
		@$path_params = explode("/", $path);
	}

	if (@$path_params[1]!= null) {
		$result = $client->get('http://localhost/resfull/RESTServerP.php/seminar/'.@$path_params[1], array());
		$xml = simplexml_load_string($result);
		//print_r($xml);
		foreach ($xml->seminar as $seminar) {
			$nama_pemilik = htmlspecialchars($seminar->nama_pemilik);
			$id_seminar = htmlspecialchars($seminar->id_seminar);
			$nama_seminar = htmlspecialchars($seminar->nama_seminar);
			$tanggal_seminar = htmlspecialchars($seminar->tanggal_seminar);
			$deskripsi = htmlspecialchars($seminar->deskripsi);

?>
		<div class="span10" id="main">
			<a href="seminar.php" class="btn-link">Back</a>
			<h3>Detail Seminar</h3>
			<p>ID Seminar :<?php echo $id_seminar; ?></p>
			<p>Nama Seminar :<?php echo $nama_seminar; ?></p>
			<p>Pemilik Seminar :<?php echo $nama_pemilik; ?></p>
			<p>Tanggal Seminar :<?php echo $tanggal_seminar; ?></p>
			<p>Deskripsi Seminar :<?php echo $deskripsi; ?></p>
			<a href="pendaftaran.php/<?php echo htmlspecialchars($seminar->id_seminar); ?>" class="btn btn-primary">Daftar</a>
		</div>
<?php
		}
	} else {
?>		
		<!-- =============================================== -->
		<div class="span10" id="main">
			<h2>Daftar Seminar</h2>
			<table class="table">
			<tr>
			  <th> Nama Seminar </th>
			  <th> </th>
			</tr>
<?php
	$result = $client->get('http://localhost/resfull/RESTServerP.php/seminar/', array());

	$xml = simplexml_load_string($result);
	//print_r($xml);
	//printf("Response = %s <br>", htmlspecialchars($result));
	foreach ($xml->seminar as $seminar) {
    echo "<tr> <td> " . htmlspecialchars($seminar->nama_seminar) . "</td> ";
	//echo"<input type='hidden' name='oke' value='".htmlspecialchars($pemilik->id_pemilik) ."'>";
	echo"<td><a href='seminar.php/". htmlspecialchars($seminar->id_seminar) ."' class='btn btn-success'>Detail</a></td>";

		 echo "</tr> ";
	}
?>
			</table>
		</div>
<?php 
	} //close else
?>
<!-- =============================================== -->
		<hr>
		<div class="footer">
	    	<p>&copy; ReSeminar 2013</p>
		</div>
	</div>
</body>
<!-- end of seminar.php  /// Location : .localhost/resfull/client/seminar.php -->
</html>
