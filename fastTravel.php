<?php

require("tools.php");
class FastTravel{
	private $cities=null;
	private $connections=null;
	private $journeys =[];
	public function __construct($cities,$connections)
	{
		$this->cities= $cities;

		$this->connections= $connections;
		//check if the arguments arrays
		if(!is_array($cities)){
			throw new Exception("Argument 0 (cities) is not an array", 1);
		}
		if(!is_array($connections)){
			throw new Exception("Argument 1 (connections) is not a two dimensional array", 1);
		}
		else if(!is_array($connections[0])){
			throw new Exception("Argument 1 (connections) is not a two dimensional array", 1);
		}
		//calculate all the distances at the constructor, so you can access them directly after that
		$this->init();
	}
	private function init()
	{
		$this->journeys=[];
		foreach ($this->cities as $city) {
			$this->journeys[$city]=$this->shortestPath($city);
		}
	}
	private function shortestPath($origin)
	{
		$distance = [];
		$parent = [];
		$seen = [];
		$infinity = 100 * sizeof($this->cities)+1;
		foreach ($this->cities as $city) 
		{
			
			$distance[$city]=$infinity;
			$parent[$city] =null;
			$seen[$city]=false;
		}
		$queue = new PriorityQueue();
		$queue->push($origin,0);
		while(!$queue->isEmpty()){
			$array= $queue->pull();
			$actualCity=$array["data"];
			$actualDistance= $array["value"];
			$distance[$actualCity]=$actualDistance;
			$seen[$actualCity] = true;
			foreach ($this->getAdjacentCities($actualCity) as $city) {
				if(!$seen[$city]){
					$realDistance= $distance[$actualCity] + $this->getDistance($actualCity,$city);
					if($distance[$city] > $realDistance){
						$distance[$city] = $realDistance;
						$parent[$city]=$actualCity;
						$queue->push($city,$distance[$city]);
					}
				}
			}
		}
		return [
			"origin" => $origin,
			"distance" => $distance,
			"parent" => $parent
		];

	}
	
	private function getAdjacentCities($origin){
		$adjacent=[];
		foreach ($this->cities as $city) {
			if($city != $origin )
			{
				if($this->getDistance($origin,$city)> 0)
				{
					$adjacent[]=$city;
				}
			}
		}
		return $adjacent;
	}
	private function getDistance($origin,$destination)
	{
		$originIndex= array_search($origin, $this->cities);
		$destinationIndex = array_search($destination,$this->cities);
		return $this->connections[$originIndex][$destinationIndex];

	}
	public function getRoute($origin,$destination)
	{
		if(!in_array($origin, $this->cities)){
			throw new Exception("Origin city doesn't exist!");
			
		}
		if(!in_array($destination, $this->cities)){
			throw new Exception("Destination city doesn't exist!");
			
		}
		$route = $this->journeys[$destination];
		$parents = [];
		$distance =$route["distance"][$origin];
		$step= $origin;
		while($step!== null){
			$parents[]=$step;
			$step= $route["parent"][$step];
		}
		return [$distance,$parents];
	}
	public function getDistances($origin)
	{
		if(!in_array($origin, $this->cities)){
			throw new Exception("Origin city doesn't exist!");
			
		}
		return $this->journeys[$origin]["distance"];
	}
}