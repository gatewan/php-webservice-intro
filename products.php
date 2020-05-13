<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "northwind";
	//1. GET DATA FROM DATABASE
	try{
		$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Connection Failed: ". $e->getMessage();
	}
	$sql = "SELECT * FROM products AS p JOIN categories AS c ON p.CategoryID=c.CategoryID";
	$data = $conn->prepare($sql);
	$data->execute();
	$products = array();
	while ($row = $data->fetch(PDO::FETCH_OBJ)){
		$product[] = array("ProductID" => $row->ProductID,
							"ProductName" => $row->ProductName,
							"CategoryName" => $row->CategoryName,
							"QuantityPerUnit" => $row->QuantityPerUnit,
							"UnitsInStock" => $row->UnitsInStock);
	}
	
	$conn = null;
	echo "<pre>"; print_r($products);
	
	//2. PARSING DATA SQL -> XML Document
	$document = new DOMDocument();
	$document->formatOutput = true;
	$root = $document->createElement("data");
	$document->appendChild($root);
	foreach($products as $row){
		$block = $document->createElement("product");
		$id = $document->createElement("ProductID");
		$id->appendChild(
			$document->createTextNode($row['ProductID'])
		);
		$block->appendChild($id);
		
		$productName = $document->createElement("ProductName");
		$productName->appendChild(
			$document->createTextNode($row['ProductName'])
		);
		$block->appendChild($productName);
		
		$CategoryName = $document->createElement("CategoryName");
		$CategoryName->appendChild(
			$document->createTextNode($row['CategoryName'])
		);
		$block->appendChild($CategoryName);
		$QuantityPerUnit = $document->createElement("QuantityPerUnit");
		$QuantityPerUnit->appendChild(
			$document->createTextNode($row['QuantityPerUnit'])
		);
		$block->appendChild($QuantityPerUnit);
		
		$UnitsInStock = $document->createElement("UnitsInStock");
		$UnitsInStock->appendChild(
			$document->createTextNode($row['UnitsInStock'])
		);
		$block->appendChild($UnitsInStock);
		$root->appendChild($block);
	}
	$document->save("products.xml");
?>