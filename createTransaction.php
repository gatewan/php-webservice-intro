<?php
/*
NIM : 12131294
NAMA : Wawan Chahyo Nugroho
*/

define("BASE_URL","https://api.sandbox.midtrans.com/v2/");
function remotePost( $url, $server_key,$postData )
{
    $options = [  
		CURLOPT_CUSTOMREQUEST  =>"POST",  		
		CURLOPT_HTTPHEADER => [
			'Content-Type: application/json',
			'Accept: application/json',
			'Authorization: Basic ' . base64_encode($server_key . ':')
		],	
        CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_POSTFIELDS => $postData
    ];
		$ch = curl_init( $url );  // Inisialisasi Curl
		curl_setopt_array( $ch, $options );  // Set Opsi
		$content = curl_exec( $ch ); // Eksekusi Curl
		curl_close( $ch );  // Stop atau tutup script		
    return $content;
 }
 
// Populate items
$items = array(
    array(
      'id'       => 'item1',
      'price'    => 7500000,
      'quantity' => 1,
      'name'     => 'Laptop core i7'
    ),
    array(
      'id'       => 'item2',
      'price'    => 2500000,
      'quantity' => 2,
      'name'     => 'Kambing Etawa'
	)
);
$total=0;
for($i=0;$i<count($items);$i++){
	$total += $items[$i]['price']*($items[$i]['quantity'])."<br>";
}
$transaction_details = array(
  'order_id'    => time(),
  'gross_amount'  => $total
);
// Populate customer's billing address
$billing_address = array(
    'first_name'   => "Andri",
    'last_name'    => "Safriyanto",
    'address'      => "Karet Belakang 15A, Setiabudi.",
    'city'         => "Jakarta",
    'postal_code'  => "51161",
    'phone'        => "081322311801",
    'country_code' => 'IDN'
);
// Populate customer's shipping address
$shipping_address = array(
    'first_name'   => "John",
    'last_name'    => "Watson",
    'address'      => "Bakerstreet 221B.",
    'city'         => "Jakarta",
    'postal_code'  => "51162",
    'phone'        => "081322311801",
    'country_code' => 'IDN'
);
// Populate customer's info
$customer_details = array(
    'first_name'       => "Andri",
    'last_name'        => "Safriyanto",
    'email'            => "wahyusoft@yahoo.com",
    'phone'            => "081322311801",
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
);

// Token ID from checkout page
// Generate Token Untuk keperluan parameter credit_card
$param = array(
		'card_number' => '4811111111111114',
		'card_cvv' => "123",
		'card_exp_month' => '09',
		'card_exp_year' => '2019',
		'client_key'=> "VT-client-MnLzU_-3bN5Fsllf"
      );

$token = BASE_URL.'token?'.http_build_query($param); //Tokenize Credit Card information before being charged
$contents = file_get_contents($token);
$decode = json_decode($contents, true);

// Transaction data to be sent
$transaction_data = array(
    'payment_type' => 'credit_card', // ubah disini
    'credit_card'  => array( 
	    //*required, karena menggunakan metode pembayaran credit_card
	    'card_number' => '4811111111111114',
		'card_cvv' => "123",
		'card_exp_month' => '09',
		'card_exp_year' => '2019',
		'bank' => 'maybank',
		'secure' => true,
		'installment' => true,
		'installment_term' => '6',
		'token_id' => $decode['token_id'],
		'two_click' => true,
		'type' => 	"authorize",
		'channel' => 	"migs",
		'point' => true,
		'client_key'=> "VT-client-MnLzU_-3bN5Fsllf"
	), // ubah disini 
    'transaction_details' => $transaction_details,
    'item_details'        => $items,
    'customer_details'    => $customer_details
);
try {
  $data2 = json_encode($transaction_data);
  $url = BASE_URL.'charge?';	
  $response = remotePost($url,'VT-server-Y62ZTnc5i2g3pX7w5otA-Set',$data2); 
  $data = file_get_contents($url);
  echo $response;
  //header('Location:'.$newURL);
} catch (Exception $e) {
  echo $e->getMessage();
  die();
}

?>
