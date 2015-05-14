<?php

class ServerS 
{

	public function init_database() 
	{
		$link = mysql_connect('localhost','root','') or die('Could not connect: ' . mysql_error());
		mysql_select_db('reseminar') or die('Could not select database');
		return $link;
	}

	public function login()
	{
		$input = file_get_contents("php://input");
		$xml = simplexml_load_string($input);

		foreach ($xml->pemilik as $pemilik) {
			//$query = "INSERT INTO pemilik_seminar (username, password, nama_pemilik, email, alamat) VALUES ('$pemilik->username', '$pemilik->password', '$pemilik->nama_pemilik', '$pemilik->email', '$pemilik->alamat')";
			$query = "SELECT ps.id_pemilik, ps.username, ps.nama_pemilik, ps.email, ps.alamat from pemilik_seminar as ps  WHERE username='$pemilik->username' and password='$pemilik->password'";
			$result = mysql_query($query);
			$jmlUser = mysql_num_rows($result);
			if($jmlUser > 0)
			{
				$this->success_login($query);
				/*session_register(username);
				$_SESSION['username'] = "$username";
				header("Location:main.php?page=choose");*/
			}else{
				$this->error_login();
			}
			mysql_free_result($result);
		}
	}

	public function error_login()
	{
		echo "<pemiliks>";
			echo "<pemilik>";
				echo "<id_pemilik>0</id_pemilik>";
			echo "</pemilik>";
		echo "</pemiliks>";
		header("Content-Type: text/xml");
	}

	public function success_login($query)
	{
		$root_element_name = 'pemiliks';
		$wrapper_element_name = 'pemilik';
		$this->print_result($query, $root_element_name, $wrapper_element_name);
	}

	public function add_pemilik() 
	{
		$input = file_get_contents("php://input");
		$xml = simplexml_load_string($input);

		foreach ($xml->pemilik as $pemilik) {
			$kueri = "SELECT count(username) as jumlah FROM pemilik_seminar WHERE username='$pemilik->username'";
			$jadi = mysql_query($kueri);
			while ($baris = mysql_fetch_array($jadi)) {
				$jumlah = $baris['jumlah'];
			}
			if ($jumlah >= 1) {
				$this->error_username();
			} else {
				$query = "INSERT INTO pemilik_seminar (username, password, nama_pemilik, email, alamat) VALUES ('$pemilik->username', '$pemilik->password', '$pemilik->nama_pemilik', '$pemilik->email', '$pemilik->alamat')";
				$result = mysql_query($query);
				$this->success_username();
			}
		}
	}

	public function error_username()
	{
		echo "<daftars>";
			echo "<daftar>";
				echo "<pesan>0</pesan>";
			echo "</daftar>";
		echo "</daftars>";
		header("Content-Type: text/xml");
	}

	public function success_username()
	{
		echo "<daftars>";
			echo "<daftar>";
				echo "<pesan>1</pesan>";
			echo "</daftar>";
		echo "</daftars>";
		header("Content-Type: text/xml");
	}
	
	public function add_peserta() 
	{
		$input = file_get_contents("php://input");
		$xml = simplexml_load_string($input);

		foreach ($xml->peserta as $peserta) {
			$query = "INSERT INTO peserta (id_seminar, nama_peserta, email_peserta, alamat_peserta, lokasi, status) VALUES ('$peserta->id_seminar','$peserta->nama_peserta','$peserta->email_peserta','$peserta->alamat_peserta','$peserta->lokasi', '$peserta->status')";
			$result = mysql_query($query);
			mysql_free_result($result);
		}
	}

	public function add_pesertaa()
	{
		$input = file_get_contents("php://input");
		$xml = simplexml_load_string($input);

		foreach ($xml->peserta as $peserta) {
			$query = "SELECT id_peserta FROM peserta WHERE id_seminar='$peserta->id_seminar' AND nama_peserta LIKE '$peserta->nama_peserta'";
			$result = mysql_query($query);

			$root_element_name = 'pesertas';
			$wrapper_element_name = 'peserta';
			$this->print_result($query, $root_element_name, $wrapper_element_name);
		}
	}

	public function add_seminar() 
	{
		$input = file_get_contents("php://input");
		$xml = simplexml_load_string($input);

		foreach ($xml->seminar as $seminar) {
			$query = "INSERT INTO seminar (id_pemilik, nama_seminar, tanggal_seminar, deskripsi) VALUES ('$seminar->id_pemilik', '$seminar->nama_seminar', '$seminar->tanggal_seminar', '$seminar->deskripsi')";
			$result = mysql_query($query);
			mysql_free_result($result);
		}
	}

	public function presensi()
	{
		$input = file_get_contents("php://input");
		$xml = simplexml_load_string($input);

		foreach ($xml->peserta as $peserta) {
			$query = "SELECT id_peserta FROM peserta WHERE id_peserta='$peserta->id_peserta' AND id_seminar='$peserta->id_seminar'";
			$result = mysql_query($query);
			$jmlUser = mysql_num_rows($result);
			if($jmlUser==1)
			{
				$kueri = "UPDATE peserta SET status=1 WHERE id_peserta='$peserta->id_peserta'";
				$hasil = mysql_query($kueri);
				$this->presensi_success();
			} else
			if ($jmlUser==0) {
				$this->presensi_failed();
			}
		}
	}

	public function presensi_success()
	{
		echo "<pesertas>";
			echo "<peserta>";
				echo "<pesan>1</pesan>";
			echo "</peserta>";
		echo "</pesertas>";
		header("Content-Type: text/xml");
	}

	public function presensi_failed()
	{
		echo "<pesertas>";
			echo "<peserta>";
				echo "<pesan>0</pesan>";
			echo "</peserta>";
		echo "</pesertas>";
		header("Content-Type: text/xml");
	}

	public function print_result($query, $root_element_name, $wrapper_element_name) 
	{
		$result = mysql_query($query);
		echo "<$root_element_name>";

		while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			echo "<$wrapper_element_name>";
			foreach ($line as $key => $col_value) {
				echo "<$key>$col_value</$key>";
			}
			echo "</$wrapper_element_name>";
		}
		echo "</$root_element_name>"; 
		mysql_free_result($result);
		header("Content-Type: text/xml");

	}

	public function get_peserta($peserta_id)
	{
		$query = "SELECT p.id_peserta, p.nama_peserta, p.email_peserta, p.alamat_peserta, p.lokasi, p.status FROM peserta as p WHERE p.id_peserta = $peserta_id";
		$root_element_name = 'pesertas';
		$wrapper_element_name = 'peserta';
		$this->print_result($query, $root_element_name, $wrapper_element_name);
	}

	public function get_pesertaa($seminar_id)
	{
		$query = "SELECT p.id_peserta, p.nama_peserta, p.email_peserta, p.alamat_peserta, p.lokasi, p.status FROM peserta as p WHERE p.id_seminar = $seminar_id";
		$root_element_name = 'pesertas';
		$wrapper_element_name = 'peserta';
		$this->print_result($query, $root_element_name, $wrapper_element_name);
	}

	public function get_seminar($seminar_id)
	{
		$query = "SELECT ps.nama_pemilik, s.id_seminar, s.nama_seminar, s.tanggal_seminar, s.deskripsi FROM seminar as s INNER JOIN pemilik_seminar as ps ON s.id_pemilik=ps.id_pemilik WHERE s.id_seminar = $seminar_id";
		$root_element_name = 'seminars';
		$wrapper_element_name = 'seminar';
		$this->print_result($query, $root_element_name, $wrapper_element_name);
	}

	public function get_seminarr($pemilik_user)
	{
		$query = "SELECT ps.nama_pemilik, s.id_seminar, s.nama_seminar, s.tanggal_seminar, s.deskripsi FROM seminar as s INNER JOIN pemilik_seminar as ps ON s.id_pemilik=ps.id_pemilik WHERE s.id_pemilik = $pemilik_user";
		$root_element_name = 'seminars';
		$wrapper_element_name = 'seminar';
		$this->print_result($query, $root_element_name, $wrapper_element_name);
	}

	public function get_pemilik_seminar($pemilik_user)
	{
		$query = "SELECT ps.id_pemilik, ps.password, ps.username, ps.nama_pemilik, ps.email, ps.alamat from pemilik_seminar as ps WHERE ps.id_pemilik = '$pemilik_user'";
		$root_element_name = 'pemiliks';
		$wrapper_element_name = 'pemilik';
		$this->print_result($query, $root_element_name, $wrapper_element_name);
	
	}

	public function get_pesertas()
	{
		$query = "SELECT p.nama_peserta, p.email_peserta, p.alamat_peserta, p.lokasi, p.status FROM peserta as p";
		$root_element_name = 'pesertas';
		$wrapper_element_name = 'peserta';
		$this->print_result($query, $root_element_name, $wrapper_element_name);
	}

	public function get_seminars()
	{
		$query = "SELECT s.id_seminar, s.nama_seminar, s.tanggal_seminar, s.deskripsi from seminar as s";
		$root_element_name = 'seminars';
		$wrapper_element_name = 'seminar';
		$this->print_result($query, $root_element_name, $wrapper_element_name);
	}

	public function get_pemilik_seminars()
	{
		$query = "SELECT ps.id_pemilik, ps.username, ps.nama_pemilik, ps.email, ps.alamat from pemilik_seminar as ps";
		$root_element_name = 'pemiliks';
		$wrapper_element_name = 'pemilik';
		$this->print_result($query, $root_element_name, $wrapper_element_name);
		
	
	}

	public function pemilik_update($pemilik_user)
	{
		$input = file_get_contents("php://input");
		$xml = simplexml_load_string($input);

		foreach ($xml->pemilik as $pemilik) {
			$query = "UPDATE pemilik_seminar SET username='$pemilik->username', password='$pemilik->password', nama_pemilik='$pemilik->nama_pemilik', email='$pemilik->email', alamat='$pemilik->alamat' WHERE username='$pemilik_user'";
			$result = mysql_query($query);
			mysql_free_result($result);
		}
	}

	public function delete_pemilik($pemilik_seminar)
	{
		$query = "DELETE FROM pemilik_seminar WHERE id_pemilik='$pemilik_seminar'";
		$result = mysql_query($query);
		//mysql_free_result($result);
	}

	public function delete_seminar($seminar_id)
	{
		$query = "DELETE FROM seminar WHERE id_seminar='$seminar_id'";
		$result = mysql_query($query);
		//mysql_free_result($result);
	}

	public function change_status_peserta($peserta_id, $seminar_id, $status)
	{
		//
		$query = "UPDATE peserta as p SET p.status = '$status' WHERE p.id_peserta = $peserta_id and p.id_seminar = $seminar_id";
		$this->print_result($query, $root_element_name, $wrapper_element_name);
	}
}

/* End of file RESTServerS.php */
/* Location: .localhost/resfull/RESTServerS.php.php */
?>