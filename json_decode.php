<?php
//$json = '{"domain":"stmikelrahma.ac.id","core":"Web Service Using Restful","address":{"street":"Sisingamangaraja Street Number 76","city":"Yogyakarta","zipcode":"554321"},"Phone":"(0274)55124"}';
$json = file_get_contents('https://www.googleapis.com/fusiontables/v1/query?sql=SELECT%20*%20FROM%201SQFWkxf1bT3vFqRt-nDNusM31Oq2QceXsX2AQDE2&key=your_key');
echo"<pre>";
print_r(json_decode($json));
?>
