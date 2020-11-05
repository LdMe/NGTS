<?php



class Node{
	public $value;
	public $data;
	public $next;
	public $prev;
	public function __construct($data=null,$value = 0,$next=null,$prev=null)
	{
		$this->data=$data;
		$this->value = $value;
		$this->next= $next;
		$this->prev= $prev;
	}
}

class PriorityQueue{
	private $head;

	public function __construct()
	{
		$this->head = null;
	}
	public function push($data,$value)
	{
		if($this->head===null)
		{
			$this->head = new Node($data,$value);
			return;
		}
		$node= $this->head;
		$condition= true;
		while($condition)
		{
			$conditionstr = '$value > $node->value';
			eval("\$condition = $conditionstr;");
			if($node->next ===null || !$condition)
			{
				break;
			}
			$node = $node->next;
		}
		// IF $VALUE IS BIGGER THAN $NODE->VALUE 
		if($condition){
			$next= $node->next;

			$node->next= new Node($data,$value);
			if($next !== null)
			{
				$next->prev = $node->next;
			}
		}
		// VALUE IS SMALLER THAN NODE VALUE
		else{
			$newNode= new Node($data,$value,$node);
			$prev= $node->prev;
			// IF NODE PREVIOUS IS NULL, IT MEANS IT SHOULD BE THE HEAD OF THE QUEUE
			if($prev!== null)
			{
				$prev->next= $newNode;
				$NewNode->prev= $prev;
			}
			else{
				echo "is uhllll\n";
				$this->head= $newNode;
			}
			$node->prev= $newNode;
		}

	}
	public function pull(){
		if($this->head === null){
			return [];
		}
		$results = [
			"data" => $this->head->data,
			"value" => $this->head->value
		];
		$this->head= $this->head->next;
		if($this->head !==null){
			$this->head->prev=null;
		}
		return $results;
	}
}
