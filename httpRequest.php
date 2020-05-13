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

$data1 = get_web_page('http://www.bmkg.go.id/cuaca/prakiraan-cuaca-indonesia.bmkg?Prov=06&NamaProv=DI%20Yogyakarta');
$data2 = explode('<div class="table-responsive">',$data1);
echo str_replace("<table","<table border='1'",$data2[1]);
?>