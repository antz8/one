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
		<li class="active"><a href="tampil_pemiliks.php">Tampil Pemilik</a></li>
		<li><a href="tampil_pemilik_login.php">Tampil Pemilik Login</a></li>
		<li><a href="#">xxx</a></li>
	</ul>

	<h2>Pemilik</h2>

	

	<table class="table">
	<tr>
	  <th> Id Seminar </th>
	  <th> Nama Seminar</th>
	  <th> Tanggal Seminar</th>
	  <th> Deskripsi</th>
	</tr>

<?php
	require ('RESTClient.php');

	$client = new RESTClient();
	$result = $client->get('http://localhost/resfull/RESTServerP.php/seminar/', array());

	$xml = simplexml_load_string($result);

	//print_r($xml);
	//printf("Response = %s <br>", htmlspecialchars($result));

	foreach ($xml->seminar as $seminar) {
	echo "<form action='hapusdata.php' method='POST'>";
    echo "<tr> <td> " . htmlspecialchars($seminar->id_seminar) . "</td> ".
		 " <td> " . htmlspecialchars($seminar->nama_seminar) . "</td> " . 
		 " <td> " . htmlspecialchars($seminar->tanggal_seminar) . "</td> " .
		 " <td> " . htmlspecialchars($seminar->deskripsi) . " </td>";
	echo"<input type='hidden' name='oke' value='".htmlspecialchars($seminar->id_seminar) ."'>";
	echo"<td><input class='btn btn-info' type='submit' name='edit' value='edit'></td>";
	echo"<td><input class='btn btn-danger' type='submit' name='hapus' value='hapus'></td>";
		 echo "</tr> ";
	echo "</form>";	 
	}
?>
	
<!-- end of tampil_pemiliks.php  /// Location : E:\htdocs\resfull\client\ -->

	</table>
	
	</div>
</body>
</html>
