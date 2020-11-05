<?php
$cities=[
	'Logroño',
	'Zaragoza',
	'Teruel',
	'Madrid',
	'Lleida',
	'Alicante',
	'Castellón',
	'Segovia',
	'Ciudad Real'
];
$connections=[
		[0,4,6,8,0,0,0,0,0],
        [4,0,2,0,2,0,0,0,0],
        [6,2,0,3,5,7,0,0,0],
        [8,0,3,0,0,0,0,0,0],
        [0,2,5,0,0,0,4,8,0],
        [0,0,7,0,0,0,3,0,7],
        [0,0,0,0,4,3,0,0,6],
        [0,0,0,0,8,0,0,0,4],
        [0,0,0,0,0,7,6,4,0]
];
require("fastTravel.php");
$travel= new FastTravel($cities,$connections);
var_dump($travel->getDistances("Logroñso"));

/*
require("tools.php");

$queue=  new PriorityQueue();
$queue->push("Zaragoza",4);
$queue->push("Logroño",1);
$queue->push("Madrid",2);

$queue->push("Asturias",10);
$queue->push("Barcelona",8);
$queue->push("Sevilla",16);
$queue->push("Burgos",3);
$queue->push("Canarias",20);
$queue->push("Toledo",1);
$element = $queue->pull();
while(!empty($element))
{
	echo "data: ".$element['data']." \n";
	echo "value: ".$element['value']."\n";
	$element = $queue->pull();
}

*/

