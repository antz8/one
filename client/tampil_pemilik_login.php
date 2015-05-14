<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pemilik</title>

	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.min.css" />
</head>
<body>
	<div class="container container-fluid">
	<ul class="nav nav-tabs">
		<li><a href="index.php">Home</a></li>
		<li><a href="tampil_pemiliks.php">Tampil Pemilik</a></li>
		<li class="active"><a href="tampil_pemilik_login.php">Tampil Pemilik Login</a></li>
		<li><a href="#">xxx</a></li>
	</ul>

	<h2>Pemilik Yang Login</h2>

	<table class="table">
	<tr>
	  <th> Username </th>
	  <th> Nama Pemilik Seminar</th>
	  <th> Email</th>
	  <th> Alamat</th>
	</tr>

<?php

	session_start();
	$id_pemilik = $_SESSION['id_pemilik'];
	echo "sesi : ".$id_pemilik;

	require ('RESTClient.php');

	$client = new RESTClient();
	$result = $client->get('http://localhost/resfull/RESTServerP.php/pemilik/'.$id_pemilik, array());

	$xml = simplexml_load_string($result);

	//print_r($xml);
	//printf("Response = %s <br>", htmlspecialchars($result));

	foreach ($xml->pemilik as $pemilik) {
    echo "<tr> <td> " . htmlspecialchars($pemilik->username) . "</td> ".
		 " <td> " . htmlspecialchars($pemilik->nama_pemilik) . "</td> " . 
		 " <td> " . htmlspecialchars($pemilik->email) . "</td> " .
		 " <td> " . htmlspecialchars($pemilik->alamat) . " </td></tr> ";
		 
	}
?>

<!-- end of tampil_pemiliks.php  /// Location : E:\htdocs\resfull\client\ -->

	</table>
	</div>
</body>
</html>
