<?php


class PriorityQueue{
	private $elements=[];
	// insert an element by value in increasing order
	public function push($data,$value)
	{
		if(empty($this->elements))
		{
			$this->elements[]=[
				"data" => $data,
				"value" => $value
			];
			return;
		}
		for ($i=0; $i < sizeof($this->elements); $i++) { 
			if($this->elements[$i]["value"]> $value)
			{
				if($i == 0){
					$array=[
						"data" => $data,
						"value" => $value
					];
					$this->elements = array_merge([$array],$this->elements);
				}
				else{
					$start = array_slice($this->elements,0, $i);
					$end = array_slice($this->elements, $i);
					$start[]=[
						"data" => $data,
						"value" => $value
					];
					$this->elements= array_merge($start,$end);
				}
				return;
			}
		}
		$this->elements[]=[
				"data" => $data,
				"value" => $value
			];
	}
	public function pull()
	{
		if(empty($this->elements)){
			return [];
		}
		$data = $this->elements[0];
		$this->elements = array_slice($this->elements,1);
		return $data;
	}
	public function isEmpty(){
		return empty($this->elements);
	}
}