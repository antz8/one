<?
	session_start();

    require ('RESTClient.php');

    $client = new RESTClient();

    if ($_POST['id_pemilik']==null || $_POST['nama_seminar']==null || $_POST['tanggal_seminar']==null ||$_POST['deskripsi']==null) 
    {
        echo"<script>alert('Data harus diisi lengkap !');javascript:history.go(-1);</script>";
    }
    else
    {
        $data = "<seminars><seminar><id_pemilik>" . $_POST['id_pemilik'] . "</id_pemilik><nama_seminar>" . $_POST['nama_seminar'] . "</nama_seminar><tanggal_seminar>" . $_POST['tanggal_seminar'] . "</tanggal_seminar><deskripsi>" . $_POST['deskripsi'] . "</deskripsi></seminar></seminars>";

        $result = $client->post('http://localhost/resfull/RESTServerP.php/seminar/',$data);
        
        echo"<script>alert('Seminar berhasil ditambah !');javascript:history.go(-1);</script>";
    }
/* End of file proses_tambah_seminar.php */
/* Location: .localhost/resfull/client/proses_tambah_seminar.php */
?>
