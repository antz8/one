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
		$result = $client->get('http://localhost/resfull/RESTServerP.php/pesertaa/'.@$path_params[1], array());
		$xml = simplexml_load_string($result);
		//print_r($xml);
		
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Peserta</title>
	<base href="http://localhost/resfull/client/">
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

		
		<h3>Daftar Peserta</h3>
		<table class="table">
		<tr>
		  <th> ID Peserta </th>
		  <th> Nama Peserta </th>
		  <th> Email </th>
		  <th> Alamat </th>
		  <th> Lokasi </th>
		  <th> Status </th>
		</tr>
<?php
	foreach ($xml->peserta as $peserta) {
		$id_peserta = htmlspecialchars($peserta->id_peserta);
		$nama_peserta = htmlspecialchars($peserta->nama_peserta);
		$email_peserta = htmlspecialchars($peserta->email_peserta);
		$alamat_peserta = htmlspecialchars($peserta->alamat_peserta);
		$lokasi = htmlspecialchars($peserta->lokasi);
		$status = htmlspecialchars($peserta->status);

		if ($status==0) {
			$status = "belum hadir";
		} else
		if ($status==1) {
			$status = "hadir";
		}

    echo "<tr> <td> " . $id_peserta . "</td> ".
		 " <td> " . $nama_peserta . "</td> " . 
		 " <td> " . $email_peserta . "</td> " .
		 " <td> " . $alamat_peserta . "</td> " .
		 " <td> " . $lokasi . "</td> " .
		 " <td> " . $status . " </td>";
		 echo "</tr> ";
}
?>
		</table>
	</div>
</body>
</html>