<?php 
/*
$person = array
(
	'name' => 'ashutosh', 
	'age' => '22', 
	'location' => 'mumbai'
);


echo '<pre>', print_r($person, true) , '</pre>';

echo '</br>';

echo  $value = json_encode($person, JSON_PRETTY_PRINT);

$jsonFIle = fopen('information.json', 'w');
fwrite($jsonFIle, $value);
fclose($jsonFIle);
*/

$person = array
(
	'name' => 'ashutosh', 
	'age' => '22', 
	'location' => 
	array(
		'location1' => 'mumbai',
		'location2' => 'kalyan'
	)
);

echo '<pre>', print_r($person, true) , '</pre>';

echo '</br>';

$value = json_encode($person, JSON_PRETTY_PRINT);

$jsonFIle = fopen('information.json', 'w');
fwrite($jsonFIle, $value);
fclose($jsonFIle);

echo '<br>' ;

echo "now reading from json";

$readingFile = file_get_contents("information.json");
$jsonData = json_decode($readingFile,true);
echo '<br>' ;
echo '<pre>', print_r($jsonData, true) , '</pre>';

foreach ($jsonData as $key => $value) {
	if(!is_array($value))
	{
		echo $key. '=>' . $value . '</br>';
	}
	else
		foreach ($value as $key => $val) {
			echo $key. '=>' . $val . '</br>';
		}
}