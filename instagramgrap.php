<?php 
function get_web_page( $url )
{
	$options = [
		CURLOPT_CUSTOMREQUEST =>"GET", // atur tipe request
		CURLOPT_HTTPHEADER => [ 
		'Content-Type: application/json',
		'Accept: application/json'
		], //membuat batasan data request dan response
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_SSL_VERIFYPEER => 0,     // Disabled SSL Cert checks
		CURLOPT_SSL_VERIFYHOST => 0
	];
		$ch = curl_init( $url ); // inisialisasi Curl
		curl_setopt_array( $ch, $options ); // set Opsi
		$content = curl_exec( $ch ); // Eksekusi Curl
		curl_close( $ch ); // Stop atau tutup script
	return $content;
}

$data1 = get_web_page('https://www.instagram.com/santaiarea/');
$data2 = explode('<span id="react-root">',$data1);
var_dump($data1);
//echo $data1;
//echo str_replace("<span id","<span id",$data2[0]);
//echo str_replace("<table","<table border='1'",$data2[1]);
?>