<?
	session_start();

    require ('RESTClient.php');

    $client = new RESTClient();

    if ($_POST['id_peserta']==null) 
    {
        echo"<script>alert('Data harus diisi lengkap !');javascript:history.go(-1);</script>";
    }
    else
    {
        $data = "<pesertas><peserta><id_peserta>" . $_POST['id_peserta'] . "</id_peserta><id_seminar>" . $_POST['id_seminar'] . "</id_seminar></peserta></pesertas>";

        $result = $client->post('http://localhost/resfull/RESTServerP.php/presensi/',$data);

        $xml = simplexml_load_string($result);
        //print_r($xml);
        foreach ($xml->peserta as $peserta) {
            $pesan = htmlspecialchars($peserta->pesan);
        }
        
        if ($pesan==1) {
            echo"<script>alert('Terima Kasih !');javascript:history.go(-1);</script>";
        } else
        if ($pesan==0) {
            echo"<script>alert('Maaf ID anda tidak terdaftar/ Inputan salah, mohon dicek kembali !');javascript:history.go(-1);</script>";
        }
    }
/* End of file proses_presensi.php */
/* Location: .localhost/resfull/client/proses_presensi.php */
?>
