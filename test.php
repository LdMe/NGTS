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
var_dump($travel->getDistances("Zaragoza"));
var_dump($travel->getRoute("Logroño","Segovia"));


