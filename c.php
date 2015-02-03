<?php
require_once __DIR__ . '/Opinion.php';

$op = new Opinion();
$op->addToIndex(__DIR__ . '/opinion/rt-polaritydata/rt-polarity.neg', 'neg');
$op->addToIndex(__DIR__ . '/opinion/rt-polaritydata/rt-polarity.pos', 'pos');

$string = "Avatar had a surprisingly decent plot, and genuinely incredible special effects";
$stringtwo = "It is good";

$sentiment = $op->classify($string);
echo "Classifying '$string' - " . $sentiment . "\n";

$sentimentwo = $op->classify($stringtwo);
echo "Classifying '$stringtwo' - " . $sentimentwo . "\n";


/*
* to convert the object into array
*/
$arrayObject = array('reviewOne' => $string );
$arrayObjecttwo = array('reviewTwo' => $stringtwo );
// $arrayObject = array($string);
// $arrayObjecttwo = array($stringtwo);

// $jsonPos = fopen('positive.json', 'w');
// $jsonNeg = fopen('negative.json', 'w');


// $jsonPosFile = 'positive.json';
$jsonNegFile = './dataset/negative.json';

// $jsonPosContent = file_get_contents($jsonPosFile);
$jsonNegContent = file_get_contents($jsonNegFile);


if($sentiment == 'pos')
{
	$jsonPosFile = './dataset/positive.json';
	$jsonPosContent = file_get_contents($jsonPosFile);
	$jsonDecode = json_decode($jsonPosContent, TRUE);
	$arrayValue = array_merge((array)$jsonDecode,$arrayObject);
	$json = json_encode($arrayValue, JSON_PRETTY_PRINT);
	file_put_contents($jsonPosFile, $json);
	unset($jsonPosFile);
	unset($json);
	// echo "i was here";
}
if($sentimentwo == 'pos')
{
	$jsonPosFile = './dataset/positive.json';
	$jsonPosContent = file_get_contents($jsonPosFile);
	$jsonDecode = json_decode($jsonPosContent, TRUE);
	$arrayValue = array_merge((array)$jsonDecode,$arrayObjecttwo);
	var_dump($jsonDecode);
	var_dump($arrayObjecttwo);
	var_dump($arrayValue);
	$json = json_encode($arrayValue, JSON_PRETTY_PRINT);
	file_put_contents($jsonPosFile, $json);
	unset($json);
}
if($sentiment == 'neg')
{
	$jsonDecode = json_decode($jsonNegContent, TRUE);
	$arrayValue = array_merge((array)$jsonDecode,$arrayObject);
	$json = json_encode($arrayValue, JSON_PRETTY_PRINT);
	file_put_contents($jsonNegFile, $json);
}


?>