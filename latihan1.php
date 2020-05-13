<?php
function get_web_page( $url )
{
	$options = [
		CURLOPT_CUSTOMREQUEST 	=> "GET",
		CURLOPT_POST 			=> false,
		CURLOPT_FOLLOWLOCATION 	=>  true,
		CURLOPT_CONNECTTIMEOUT	=> 120,
		CURLOPT_TIMEOUT			=> 120,
	]; // sintak array di php7
		$ch = curl_init( $url );
		curl_setopt_array( $ch, $options );
		$content = curl_exec( $ch );
		curl_close ( $ch );
		$header['content'] = $content;
	return $header;
}
	echo get_web_page("http://localhost");