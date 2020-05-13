<?php 
/*
NIM : 12131294
NAMA : Wawan Chahyo Nugroho
*/
define("BASE_URL","https://www.googleapis.com/fusiontables/v1/tables/1SQFWkxf1bT3vFqRt-nDNusM31Oq2QceXsX2AQDE2");
function remotePost($url)
{
    $options = [  
		CURLOPT_CUSTOMREQUEST  =>"POST",  		
		CURLOPT_HTTPHEADER => [
			'Content-Type: application/json',
			'Accept: application/json'
			//'Authorization: Basic '
		],	
        CURLOPT_RETURNTRANSFER => 1
    ];
		$ch = curl_init( $url );  // Inisialisasi Curl
		curl_setopt_array( $ch, $options );  // Set Opsi
		$content = curl_exec( $ch ); // Eksekusi Curl
		curl_close( $ch );  // Stop atau tutup script		
    return $content;
 }

$token = 'your_token';
$tableid = '1SQFWkxf1bT3vFqRt-nDNusM31Oq2QceXsX2AQDE2';

// Transaction data to be sent
try {
  $sql='UPDATE '.$tableid.' SET description = "testing" WHERE ROWID ="11"&key='.$token;
  $url = BASE_URL.$sql;
  $response = remotePost($url); 
  echo $response;
  var_dump($response);
  //header('Location:'.$newURL);
} catch (Exception $e) {
  echo $e->getMessage();
  die();
}
?>
