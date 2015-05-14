<?php
	session_start();

    require ('RESTClient.php');

    $client = new RESTClient();

    if ($_POST['usernamelogin'] != "" and $_POST['password'] != "") {
	    $data = "<pemiliks><pemilik><username>" . $_POST['usernamelogin'] . "</username><password>" . $_POST['password'] . "</password></pemilik></pemiliks>";
	    $result = $client->post('http://localhost/resfull/RESTServerP.php/login/',$data);
	   	//echo $result;
	    //$resultt = $client->get('http://localhost/resfull/RESTServerP.php/login/', array());

		$xml = simplexml_load_string($result);
		//print_r($xml);
		foreach ($xml->pemilik as $pemilik) {
			$id_pemilik = htmlspecialchars($pemilik->id_pemilik);
		}
			
		if ($id_pemilik > 0) {
			$_SESSION['id_pemilik'] = "$id_pemilik";
			header("Location:welcome.php");
			//print_r($xml);
		} else {
			echo "<script>alert('Username atau Password Salah !');javascript:history.go(-1);</script>";
		}
	} else {
		echo "<script>alert('Username dan Password harus diisi !');javascript:history.go(-1);</script>";
	}
/* End of file proses_login.php */
/* Location: .localhost/resfull/client/proses_login.php */
?>