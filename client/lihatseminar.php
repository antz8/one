<?php
	require ('RESTClient.php');
	require ('auth.php');
	require ('navigasi.php');

	$sesi = new Session();
	$client = new RESTClient();
	$nav = new Navigasi();
	$sesi->awal();
	$sesi->ambil_id();

	$result = $client->get('http://localhost/resfull/RESTServerP.php/seminarr/'.$sesi->id_pemilik, array());

	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Seminar yang Telah Dibuat</title>

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
		<?php $nav->nav_lihatseminar(); ?>
		<!-- =============================================== -->

		
		<h2>Daftar Seminar yang Telah Dibuat</h2>
		<table class="table">
		<tr>
		  <th> ID Seminar </th>
		  <th> Nama Seminar </th>
		  <th> Tanggal Seminar </th>
		  <th> Deskripsi </th>
		</tr>
<?php
	$xml = simplexml_load_string($result);
	//print_r($xml)
	foreach ($xml->seminar as $seminar) {

	echo "<form action='hapusseminar.php' method='POST'>";
    echo "<tr> <td> " . htmlspecialchars($seminar->id_seminar) . "</td> ".
		 " <td> " . htmlspecialchars($seminar->nama_seminar) . "</td> " . 
		 " <td> " . htmlspecialchars($seminar->tanggal_seminar) . "</td> " .
		 " <td> " . htmlspecialchars($seminar->deskripsi) . " </td>";
	echo"<input type='hidden' name='id_seminar' value='".htmlspecialchars($seminar->id_seminar) ."'>";
	echo"<td><a href='presensi.php/". htmlspecialchars($seminar->id_seminar) ."' class='btn btn-success'>Presensi</a></td>";
	echo"<td><a href='lihatpeserta.php/". htmlspecialchars($seminar->id_seminar) ."' class='btn btn-inverse'>Lihat Peserta</a></td>";
	echo"<td><a href='editseminar.php/". htmlspecialchars($seminar->id_seminar) ."' class='btn btn-info'>Edit</a></td>";
	echo "<input type='hidden' name='oke' value='".htmlspecialchars($seminar->id_seminar) ."'>";
	echo"<td><input class='btn btn-danger' type='submit' name='hapus' value='hapus'></td>";
		 echo "</tr> ";
	echo "</form>";	 
} 
?>
		</table>
	</div>
</body>
</html>