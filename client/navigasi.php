<?php
	/**
	* 
	*/
	class Navigasi
	{
		public function headd()
		{
			echo "<div><br></div>".
			"<div class='navbar navbar-inverse'>".
				"<div class='navbar-inner'>".
		    		"<div class='container'>".
		      			"<a class='brand' href='#'>ReSeminar Project</a>".
		    		"</div>".
		  		"</div>".
			"</div>";
		}

		public function nav_welcome()
		{
			if (@$_SESSION['id_pemilik']==1) {
				return $this->nav_welcome_admin();
			} else {
				return $this->nav_welcome_user();
			}
		}

		public function nav_welcome_admin()
		{
			echo "<ul class='nav nav-tabs'>".
			"<li class='active'><a href='welcome.php'>Home</a></li>".
			"<li><a href='tampil_pemiliks.php'>Tampil Pemilik</a></li>".
			"<li><a href='#'>Tampil Semua Seminar</a></li>".
			"<li><a href='logout.php'>Logout</a></li>".
			"</ul>";
		}

		public function nav_welcome_user()
		{
			echo "<ul class='nav nav-tabs'>".
			"<li class='active'><a href='welcome.php'>Home</a></li>".
			"<li><a href='tambah_seminar.php'>Tambah Seminar</a></li>".
			"<li><a href='lihatseminar.php'>Lihat Seminar</a></li>".
			"<li><a href='editprofil.php'>Edit Profile</a></li>".
			"<li><a href='logout.php'>Logout</a></li>".
			"</ul>";
		}

		public function nav_tampil_pemiliks()
		{
			echo "<ul class='nav nav-tabs'>".
			"<li><a href='welcome.php'>Home</a></li>".
			"<li class='active'><a href='tampil_pemiliks.php'>Tampil Pemilik</a></li>".
			"<li><a href='#'>Tampil Semua Seminar</a></li>".
			"<li><a href='logout.php'>Logout</a></li>".
			"</ul>";
		}

		public function nav_editprofil()
		{
			echo "<ul class='nav nav-tabs'>".
			"<li><a href='welcome.php'>Home</a></li>".
			"<li><a href='tambah_seminar.php'>Tambah Seminar</a></li>".
			"<li><a href='lihatseminar.php'>Lihat Seminar</a></li>".
			"<li class='active'><a href='editprofil.php'>Edit Profile</a></li>".
			"<li><a href='logout.php'>Logout</a></li>".
			"</ul>";
		}

		public function nav_tambah_seminar()
		{
			echo "<ul class='nav nav-tabs'>".
			"<li><a href='welcome.php'>Home</a></li>".
			"<li class='active'><a href='tambah_seminar.php'>Tambah Seminar</a></li>".
			"<li><a href='lihatseminar.php'>Lihat Seminar</a></li>".
			"<li><a href='editprofil.php'>Edit Profile</a></li>".
			"<li><a href='logout.php'>Logout</a></li>".
			"</ul>";
		}

		public function nav_lihatseminar()
		{
			echo "<ul class='nav nav-tabs'>".
			"<li><a href='welcome.php'>Home</a></li>".
			"<li><a href='tambah_seminar.php'>Tambah Seminar</a></li>".
			"<li class='active'><a href='lihatseminar.php'>Lihat Seminar</a></li>".
			"<li><a href='editprofil.php'>Edit Profile</a></li>".
			"<li><a href='logout.php'>Logout</a></li>".
			"</ul>";
		}
	}
/* End of file navigasi.php */
/* Location: .localhost/resfull/client/navigasi.php */
?>