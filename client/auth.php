<?php 
	/**
	* 
	*/
	class Session
	{
		public $id_pemilik;

		public function awal()
		{
			session_start();
			if($_SESSION['id_pemilik']=='')
			{
				echo "<script>alert('Harus Login terlebih dahulu');</script>";
				header("location: index.php");
			}			
		}

		public function ambil_id()
		{
			$this->id_pemilik = @$_SESSION['id_pemilik'];
			return $this->id_pemilik;
		}

		public function lihatsiapa()
		{
			echo "sesi : ".@$_SESSION['id_pemilik'];
		}

		public function logout()
		{
			$_SESSION['id_pemilik'] = "";
   			session_destroy();
   			header("Location:index.php");
		}

		public function indexphp()
		{
			session_start();
			if (@$_SESSION['id_pemilik']!='') {
				header("Location:welcome.php");
			} 
		}
	}
/* End of file auth.php */
/* Location: .localhost/resfull/client/auth.php */
?>

