<?php
define("BASE_URL","https://api.sandbox.midtrans.com/v2/");
function remoteCall( $url, $server_key)
{
    $options = [
        CURLOPT_CUSTOMREQUEST  =>"GET",  	
		CURLOPT_HTTPHEADER => [
			'Content-Type: application/json',
			'Accept: application/json',
			'Authorization: Basic ' . base64_encode($server_key . ':')
		],	
        CURLOPT_RETURNTRANSFER => 1,
    ];
		$ch = curl_init( $url );  // Inisialisasi Curl
		curl_setopt_array( $ch, $options );  // Set Opsi
		$content = curl_exec( $ch ); // Eksekusi Curl
		curl_close( $ch );  // Stop atau tutup script		
        return $content;
 }

$param = array(
		'card_number' => '4811111111111114',
		'card_exp_month' => '09',
		'card_exp_year' => '2019',
		'client_key'=> 'VT-client-MnLzU_-3bN5Fsllf',
		'card_cvv' => "212"
      );
	  
$token = BASE_URL.'token?'.http_build_query($param);
$contents = file_get_contents($token);
//$tes = header('Location: '.$token);
//$mtu = getElementsByTagName('<pre>');
echo $contents;
$decode = json_decode($contents, true);
echo '<br /><br />';
echo 'akhrinya bisa juga grap tokennya saja: '.$decode['token_id'];
?>