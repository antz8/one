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
	

	$result = $client->get('http://localhost/resfull/RESTServerP.php/pemilik/'.$sesi->id_pemilik, array());

	$xml = simplexml_load_string($result);
	foreach ($xml->pemilik as $pemilik) {
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Selamat Datang <?php echo htmlspecialchars($pemilik->username); ?></title>

	<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.min.css" />
	<style type="text/css">
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
		<?php $nav->nav_welcome(); ?>
		<!-- =============================================== -->	
		<h3>Selamat datang <?php echo htmlspecialchars($pemilik->nama_pemilik); ?></h3>
		<!-- =============================================== -->
		<div class="row">
			<div class="span6">
				<h4>Account Information</h4>
				<p>Username : <?php echo htmlspecialchars($pemilik->username); ?></p>
				<p>Nama Lengkap : <?php echo htmlspecialchars($pemilik->nama_pemilik); ?></p>
				<p>Email : <?php echo htmlspecialchars($pemilik->email); ?></p>
				<p>Alamat : <address><?php echo htmlspecialchars($pemilik->alamat); ?></address></p>
				
			</div>
			<div class="span6">
				<h4>ReSeminar Overview</h4>
				<p>Number of User : </p>
				<p>Number of Seminar(s) : </p>
				<p>Number of Peserta : </p>		
			</div>
		</div>
<?php
	} //close foreach
?>
		</table>
		<hr>
		<!-- =============================================== -->
		<div class="footer">
	    	<p>&copy; ReSeminar 2013</p>
		</div>  
	</div>
</body>
<!-- end of welcome.php  /// .localhost/resfull/client/welcome.php -->
</html>
