<?php
	class RESTClient 
	{
		protected $with_curl;

		const USER_AGENT='RESTClient';

		public function __construct()
		{
			if (function_exists("curl_init")) {
				$this->with_curl = TRUE;
			} else {
				$this->with_curl = FALSE;
			}
		}

		public function get($url, $params)
		{
			
			$params_str = "?";
			if (is_array($params)) {
				foreach ($params as $key => $value) {
					$params_str .= urlencode($key) . "=" . urlencode($value) . "&";
				}
			} else {
				$params_str .= $params;
			}

			$url .= $params_str; 
			$result = ""; 

			if ($this->with_curl) {
				$curl = curl_init($url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				$result = curl_exec($curl);
				curl_close($curl);
			}

			return $result;
		}

		public function post($url, $data) 
		{
			$result = "";
			if ($this->with_curl) {
				$curl = curl_init();
				//curl_setopt($curl, CURLOPT_HTTPHEADER, Array ("Content-Type: " . $content_type));
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_POST, TRUE);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				
				//curl_setopt($curl, CURLOPT_USERAGENT, RESTClient :: USER_AGENT);

				$result = curl_exec($curl);
				curl_close($curl);
			} //else {
			/*	$opts = array (
				'http' => array (
					'method' => "POST",
					'header' => "User-Agent: " . RESTClient :: USER_AGENT . "\r\n" .
					"Content-Type: " . $content_type . "\r\n" .
					"Content-length: " . strlen($data
				) . "\r\n",
				'content' => $data
				));

				$context = stream_context_create($opts);
				$fp = fopen($url, 'r', false, $context);
				$result = fpassthru($fp);
				fclose($fp);
			} */
			return $result;
		}

		public function put($url, $data) 
		{
			$result = "";
			if ($this->with_curl) {
				/*$fh = fopen('php://memory', 'rw');
				fwrite($fh, $data);
				rewind($fh);*/

				$curl = curl_init();
				//curl_setopt($curl, CURLOPT_USERAGENT, RESTClient :: USER_AGENT);
				//curl_setopt($curl, CURLOPT_INFILE, $fh);
				curl_setopt($curl, CURLOPT_INFILESIZE, strlen($data));
				//curl_setopt($curl, CURLOPT_TIMEOUT, 10);
				curl_setopt($curl, CURLOPT_PUT, 1);
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

				$result = curl_exec($curl);
				curl_close($curl);
				fclose($fh);
			} //else {
			/*	$opts = array (
				'http' => array (
					'method' => "PUT",
					'header' => "User-Agent: " . RESTClient ::USER_AGENT . "\r\n" .
					"Content-Type: " . $content_type . "\r\n" .
					"Content-length: " . strlen($data
				) . "\r\n",
				'content' => $data
				));
				
				$context = stream_context_create($opts);
				$fp = fopen($url, 'r', false, $context);
				$result = fpassthru($fp);
				fclose($fp);
			}
			*/
			return $result;
		}

		public function delete($url) 
		{
			/*$params_str = "?";
			if (is_array($params)) {
				foreach ($params as $key => $value) {
				$params_str .= urlencode($key) . "=" . urlencode($value) . "&";
				}
			} else {
				$params_str .= $params;
			}

			$url .= $params_str;*/
			$result = "";
			if ($this->with_curl) {
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
				//curl_setopt($curl, CURLOPT_USERAGENT, RESTClient :: USER_AGENT);

				$result = curl_exec($curl);
				curl_close($curl);
			} //else {
			/*	$opts = array (
				'http' => array (
				'method' => "DELETE",
				'header' => "User-Agent: " . RESTClient :: USER_AGENT . "\r\n"
				)
				);
				$context = stream_context_create($opts);
				$fp = fopen($url, 'r', false, $context);
				$result = fpassthru($fp);
				fclose($fp);
			}*/

			return $result;
		}

	}
	
	/* End of file RESTClient.php */
	/* Location: .localhost/resfull/client/RESTClient.php */
?>