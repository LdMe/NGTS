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

require("tools.php");


$stack = new PriorityStack(3);
$stack->push(2);

$value= $stack->pull();
while($value !== null)
{
	echo $value . "\n";
	$value= $stack->pull();
}
$stack->push(3);
$stack->push(2);
$stack->push(4);
$value= $stack->pull();
echo "---------------------\n";
while($value !== null)
{
	echo $value . "\n";
	$value= $stack->pull();
}
echo "---------------------\n";
$stack->push(4);
$stack->push(5);
$stack->push(7);
$stack->push(1);
$stack->push(1);
$stack->push(3);
$stack->push(2);
$value= $stack->pull();
while($value !== null)
{
	echo $value . "\n";
	$value= $stack->pull();
}
echo "---------------------\n";
