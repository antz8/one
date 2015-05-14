<?php
	function redirectPage ($page) {
		$newpage = "<script type='text/javascript'>";
		$newpage .= "window.location.href='$page';";
		$newpage .= "</script>";
		$newpage .= "<noscript>";
		$newpage .= "<meta http-equiv='refresh' content='0;url=$page'/>";
		$newpage .= "</noscript>";
		
		return $newpage;
	}
?>