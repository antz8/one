<?php
	session_start();
	require ('RESTClient.php');
	$client = new RESTClient();

	$hapus = $_POST['oke'];
	//echo $hapus;
	$result = $client->delete('http://localhost/resfull/RESTServerP.php/pemilik/'.$_POST['oke']);
	//print_r('http://localhost/resfull/RESTServerP.php/pemilik/'.$_POST['oke']);
	echo"<script>alert('Data berhasil dihapus !'); window.location = 'tampil_pemiliks.php';</script>";
	
?>