<?php
	session_start();

    require ('RESTClient.php');

    $client = new RESTClient();

    if ($_POST['username']==null || $_POST['password']==null || $_POST['nama_pemilik']==null ||$_POST['email']==null ||$_POST['alamat']==null) 
    {
        echo"<script>alert('Data harus diisi lengkap !');javascript:history.go(-1);</script>";
    } else {
    	$data = "<pemiliks><pemilik><username>" . $_POST['username'] . "</username><password>" . $_POST['password'] . "</password><nama_pemilik>" . $_POST['nama_pemilik'] . "</nama_pemilik><email>" . $_POST['email'] . "</email><alamat>" . $_POST['alamat'] . "</alamat></pemilik></pemiliks>";

	    //print_r($data);
	    $result = $client->post('http://localhost/resfull/RESTServerP.php/pemilik_update/'.$_POST['username'],$data);

	    echo"<script>alert('Data berhasil di-Update !');javascript:history.go(-1);</script>";

    }
    
    
/* End of file proses_edit.php */
/* Location: .localhost/resfull/client/proses_edit.php */
?>