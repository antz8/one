<?php 
	require ('RESTClient.php');
	require ('auth.php');
	require ('navigasi.php');

	$sesi = new Session();
	$client = new RESTClient();
	$nav = new Navigasi();
	$sesi->awal();
	$sesi->ambil_id();
	//$sesi->lihatsiapa();
	

	$result = $client->get('http://localhost/resfull/RESTServerP.php/pemilik/', array());

	$xml = simplexml_load_string($result);

?>
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
		<!-- =============================================== -->	
		<?php $nav->headd(); ?>
		<!-- =============================================== -->	
		<?php $nav->nav_tampil_pemiliks(); ?>
		<!-- =============================================== -->

		<h2>Daftar Pemilik Seminar</h2>

		<table class="table">
		<tr>
		  <th> Username </th>
		  <th> Nama Pemilik Seminar</th>
		  <th> Email</th>
		  <th> Alamat</th>
		</tr>
<?php
	//print_r($xml);
	//printf("Response = %s <br>", htmlspecialchars($result));

	foreach ($xml->pemilik as $pemilik) {
	echo "<form action='hapusdata.php' method='POST'>";
    echo "<tr> <td> " . htmlspecialchars($pemilik->username) . "</td> ".
		 " <td> " . htmlspecialchars($pemilik->nama_pemilik) . "</td> " . 
		 " <td> " . htmlspecialchars($pemilik->email) . "</td> " .
		 " <td> " . htmlspecialchars($pemilik->alamat) . " </td>";
	echo"<input type='hidden' name='oke' value='".htmlspecialchars($pemilik->id_pemilik) ."'>";
	if ($pemilik->id_pemilik!=1) {
	echo"<td><input class='btn btn-danger' type='submit' name='hapus' value='hapus'></td>";
	}
		 echo "</tr> ";
	echo "</form>";	 
	}
?>
		</table>
		<hr>
		<!-- =============================================== -->
		<div class="footer">
	    	<p>&copy; ReSeminar 2013</p>
		</div>
	</div>
</body>
<!-- end of tampil_pemiliks.php  /// Location : .localhost/resfull/client/tampil_pemiliks.php -->
</html>
