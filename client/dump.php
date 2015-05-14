<?php 
	/**
	* dump.php adalah kumpulan kode-kode yang dibuang
	*/
	class Dump extends AnotherClass
	{
		
		function from_welcome()
		{
			//print_r($xml);
			//printf("Response = %s <br>", htmlspecialchars($result));
			/*echo "<form action='hapusdata.php' method='POST'>";
		    echo "<tr> <td> " . htmlspecialchars($pemilik->username) . "</td> ".
				 " <td> " . htmlspecialchars($pemilik->nama_pemilik) . "</td> " . 
				 " <td> " . htmlspecialchars($pemilik->email) . "</td> " .
				 " <td> " . htmlspecialchars($pemilik->alamat) . " </td>";
			echo"<input type='hidden' name='oke' value='".htmlspecialchars($pemilik->id_pemilik) ."'>";
			echo"<td><input class='btn btn-info' type='submit' name='edit' value='edit'></td>";
			echo"<td><input class='btn btn-danger' type='submit' name='hapus' value='hapus'></td>";
				 echo "</tr> ";
			echo "</form>";	*/ 
		}

		function from_welcome2()
		{/*
			<ul class="nav nav-tabs">
			<li class="active"><a href="welcome.php">Home</a></li>
			<li><a href="tampil_pemiliks.php">Tampil Pemilik</a></li>
			<li><a href="#">Tampil Semua Seminar</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>*/
		}

		function editdata()
		{/*
			<style type="text/css">
			 body {
	        padding-top: 20px;
	        padding-bottom: 40px;
		      }

		      /* Custom container */
		     /* .container-narrow {
		        margin: 0 auto;
		        max-width: 700px;
		      }
		      .container-narrow > hr {
		        margin: 30px 0;
		      }

		      /* Main marketing message and sign up button */
		     /* .jumbotron {
		        margin: 60px 0;
		        text-align: center;
		      }
		      .jumbotron h1 {
		        font-size: 72px;
		        line-height: 1;
		      }
		      .jumbotron .btn {
		        font-size: 21px;
		        padding: 14px 24px;
		      }

		      /* Supporting marketing content */
		      /*.marketing {
		        margin: 60px 0;
		      }
		      .marketing p + h4 {
		        margin-top: 28px;
		      }
			</style>*/
		}

		function hapusdata()
		{/*
					if($_POST['edit'] == "edit")
			{
				function redirectPage ($page) {
					$newpage = "<script type='text/javascript'>";
					$newpage .= "window.location.href='$page';";
					$newpage .= "</script>";
					$newpage .= "<noscript>";
					$newpage .= "<meta http-equiv='refresh' content='0;url=$page'/>";
					$newpage .= "</noscript>";
						
					return $newpage;
				}


				//$username = $_SESSION[user];
				//print_r($_POST['oke']);
				$page = "editdata.php"."?username=".$_POST['oke'];
				echo redirectPage($page);
				echo"<script>window.location = 'editdata.php';</script>";

			} else

			if($_POST['hapus'] == "hapus")
			{*/
		}

		function proses_signup()
		{  
		    /*
		    $ch = curl_init();

		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($ch, CURLOPT_POST, true);
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		    $response = curl_exec($ch);

		    curl_close($ch);
		    */
		}

		function proses_tambah_seminar()
		{
		/*	$xml = simplexml_load_string($result);

            //print_r($xml);
            foreach ($xml->daftar as $daftar) {
                $pesan = htmlspecialchars($daftar->pesan);
            }

        if ($pesan==1) {
            echo"<script>alert('Data berhasil disimpan !');javascript:history.go(-1);</script>";
        } else
        if ($pesan==0) {
            echo"<script>alert('Username sudah terdaftar !');javascript:history.go(-1);</script>";
        }*/
		}
	}
/* End of file dump.php */
/* Location: .localhost/resfull/client/dump.php */
?>