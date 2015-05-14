<?
	session_start();

    require ('RESTClient.php');

    $client = new RESTClient();

    if ($_POST['nama_peserta']==null || $_POST['email_peserta']==null || $_POST['alamat_peserta']==null ||$_POST['lokasi']==null ||$_POST['status']==null) 
    {
        echo"<script>alert('Data harus diisi lengkap !');javascript:history.go(-1);</script>";
    }
    else
    {
        $data = "<pesertas><peserta><id_seminar>" . $_POST['id_seminar'] . "</id_seminar><nama_peserta>" . $_POST['nama_peserta'] . "</nama_peserta><email_peserta>" . $_POST['email_peserta'] . "</email_peserta><alamat_peserta>" . $_POST['alamat_peserta'] . "</alamat_peserta><lokasi>" . $_POST['lokasi'] . "</lokasi><status>" . $_POST['status'] . "</status></peserta></pesertas>";

        $result = $client->post('http://localhost/resfull/RESTServerP.php/peserta/',$data);
        echo"<script>alert('Data berhasil disimpan !')</script>";
        $_SESSION['nama_peserta'] = $_POST['nama_peserta'];
        $_SESSION['id_seminar'] = $_POST['id_seminar'];
        header("Location:hasil_daftar.php");
    }
/* End of file proses_pendaftaran.php */
/* Location: .localhost/resfull/client/proses_pendaftaran.php */
?>
