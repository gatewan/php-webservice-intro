<?php
function get_web_page( $url )
{
	$options = [
		CURLOPT_CUSTOMREQUEST =>"GET", // atur tipe request
		CURLOPT_RETURNTRANSFER => 1
	];
		$ch = curl_init( $url ); // inisialisasi Curl
		curl_setopt_array( $ch, $options ); // set Opsi
		$content = curl_exec( $ch ); // Eksekusi Curl
		curl_close( $ch ); // Stop atau tutup script
	return $content;
}

$data1 = get_web_page('http://www.pegadaian.co.id/widgetHargaEmasv2.php');
$data2 = explode('<div class="jqh_slide" title="Emas Cetakan ANTAM" style="display: block; opacity: 0;">',$data1);
echo str_replace("<table","<table border='1'",$data2[1]);
?>