<?php



class FastTravel{
	private $cities=null;
	private $connections=null;
	public function __construct($cities=null,$connections=null)
	{
		$this->cities= $cities;
		$this->connections= $connections;
		if($cities!==null)
		{
			if(!is_array($cities)){
				throw new Exception("Argument 0 (cities) is not an array", 1);
			}
		}
		if($connections!==null)
		{
			if(!is_array($connections)){
				throw new Exception("Argument 1 (connections) is not a two dimensional array", 1);
			}
			else if(!is_array($connections[0])){
				throw new Exception("Argument 1 (connections) is not a two dimensional array", 1);
			}
		}
		
	}
	public function shortestPath($origin,$destination,$cities=null,$connections=null)
	{
		//
	}
	public function allShortestPaths()
	{
		//
	}
	private function clalculateShortestPath($origin,$destination){
		
	}
}