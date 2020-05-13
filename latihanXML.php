<?php
$list = array(
	"eggs",
	"bread",
	"milk",
	"bananas",
	"bacon",
	"cheese"
);
$xml = new SimpleXMLElement("<list />");
foreach($list as $item){
	$xml->addChild("item", $item);
}
$dom = dom_import_simplexml($xml)->ownerDocument;
$dom->formatOutput = true;
echo $dom->saveXML();
?>