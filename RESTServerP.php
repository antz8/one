<?php
	require ('RESTServerS.php');

	$seminar = new ServerS();

	$database = $seminar->init_database();
	

	$path = $_SERVER['PATH_INFO'];
	if ($path != null) {
		$path_params = explode("/", $path);
	}


	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($path_params[1] == 'pemilik') {
			$seminar->add_pemilik();
		} else
		if ($path_params[1] == 'seminar') {
			$seminar->add_seminar();
		} else
		if ($path_params[1] == 'peserta') {
			$seminar->add_peserta();
		} else
		if ($path_params[1] == 'login') {
			$seminar->login();
		} else
		if ($path_params[1] == 'pesertaa') {
			$seminar->add_pesertaa();
		} else
		if ($path_params[1] == 'presensi') {
			$seminar->presensi();
		} else
		if ($path_params[1] == 'pemilik_update') {
			if ($path_params[2] != null) {
				$seminar->pemilik_update($path_params[2]);
			}
		}
	} else

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if ($path_params[1] == 'seminar') {
			if (@$path_params[2]!=null) {
				$seminar->get_seminar($path_params[2]);
			} else{
				$seminar->get_seminars($path_params[2]);
			}
		} else

		if ($path_params[1] == 'pemilik') {
			if (@$path_params[2] != null) {
				$seminar->get_pemilik_seminar($path_params[2]);
			} else {
				$seminar->get_pemilik_seminars($path_params[2]);
			}
			
		} else

		if ($path_params[1] == 'peserta') {
			if (@$path_params[2] != null) {
				$seminar->get_peserta($path_params[2]);
			} else {
				$seminar->get_pesertas();
			}
			
		} else
		if ($path_params[1] == 'login') {
			$seminar->login();
		} else

		if ($path_params[1] == 'seminarr') {
			if (@$path_params[2] != null) {
				$seminar->get_seminarr($path_params[2]);
			}
		} else

		if ($path_params[1] == 'pesertaa') {
			if (@$path_params[2] != null) {
				$seminar->get_pesertaa($path_params[2]);
			}
		}
	} else
	
	if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
		if ($path_params[1] == 'pemilik') {
			if ($path_params[2] != null) {
				$seminar->put_pemilik($path_params[2]);
			}
		} else
		if ($path_params[1] == 'seminar') {
			
		} else
		if ($path_params[1] == 'peserta') {
			
		}
	} else
	
	if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
		if ($path_params[1] == 'pemilik') {
			if ($path_params[2] != null) {
				$seminar->delete_pemilik($path_params[2]);
			}
		} else
		if ($path_params[1] == 'seminar') {
			if ($path_params[2] != null) {
				$seminar->delete_seminar($path_params[2]);
			}
		} else
		if ($path_params[1] == 'peserta') {
			
		}
	}
	
/* End of file RESTServerP.php */
/* Location: .localhost/resfull/RESTServerP.php */
?>