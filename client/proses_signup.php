<?
	session_start();

    require ('RESTClient.php');

    $client = new RESTClient();

    if ($_POST['username']==null || $_POST['password']==null || $_POST['nama_pemilik']==null ||$_POST['email']==null ||$_POST['alamat']==null) 
    {
        echo"<script>alert('Data harus diisi lengkap !');javascript:history.go(-1);</script>";
    }
    else
    {
        $data = "<pemiliks><pemilik><username>" . $_POST['username'] . "</username><password>" . $_POST['password'] . "</password><nama_pemilik>" . $_POST['nama_pemilik'] . "</nama_pemilik><email>" . $_POST['email'] . "</email><alamat>" . $_POST['alamat'] . "</alamat></pemilik></pemiliks>";

        $result = $client->post('http://localhost/resfull/RESTServerP.php/pemilik/',$data);
        $xml = simplexml_load_string($result);

            //print_r($xml);
            foreach ($xml->daftar as $daftar) {
                $pesan = htmlspecialchars($daftar->pesan);
            }

        if ($pesan==1) {
            echo"<script>alert('Data berhasil disimpan !');javascript:history.go(-1);</script>";
        } else
        if ($pesan==0) {
            echo"<script>alert('Username sudah terdaftar !');javascript:history.go(-1);</script>";
        }
    }
/* End of file proses_signup.php */
/* Location: .localhost/resfull/client/proses_signup.php */
?>
