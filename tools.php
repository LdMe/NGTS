<?php


class Node
{
	private $value;
	private $prev;
	private $next;
	public function __construct($value=null,?Node $prev=null,?Node $next=null)
	{
		$this->value = $value;
		$this->prev= $prev;
		$this->next =$next;
	}
	public function getPrev()
	{
		return $this->prev;
	}
	public function getNext()
	{
		return $this->next;
	}
	public function getValue(){
		return $this->value;
	}
	public function setPrev(?Node $prev)
	{
		$this->prev=$prev;
	}
	public function setNext(?Node $next)
	{
		$this->next=$next;
	}
	public function setValue(?Node $value)
	{
		$this->value=$value;
	}

}

class PriorityStack{
	private $head=null;
	private $ascendant;
	public function __construct( $value=null,bool $ascendant=true)
	{
		if($value !== null)
		{
			$this->head = new Node($value);
		}

		$this->ascendant=$ascendant;
	}
	public function push($value)
	{
		$node =$this->head;
		if( $node ===null)
		{
			$newNode= new Node($value);
			$this->head=$newNode;
			return;
		}
		$conditionstr = '($node->getValue() < $value)';
		if(!$this->ascendant)
		{
			$conditionstr = '($node->getValue() > $value)';
		}
		$condition=true;
		while($condition)
		{
			eval("\$condition= $conditionstr;");
			echo "value: $value, node value: ".$node->getValue().", condition= $condition \n";
			if ($node->getNext() === null) {
				
				echo "no next node\n";
				break;
			}
			$node=$node->getNext();
		}
		if($condition)
		{
			$newNode = new Node($value, $node);
			$newNode->setNext($node->getNext());
			$next = $node->getNext();
			if($next !==null)
			{
				$next->setPrev($newNode);
			}
			$node->setNext($newNode);
		} 
		else{
			echo "yess\n";
			var_dump($this->head);
			$prev= $node->getPrev();
			$newNode = new Node($value,$prev,$node);
			if($prev)
			{
				$prev->setNext($newNode);
			}
			$node->setPrev($newNode);
			if($node->getValue() === $this->head->getValue())
			{
				$this->head= $newNode;
			}
			
			
		}
	}
	public function pull()
	{
		if($this->head === null){
			return null;
		}
		$value= $this->head->getValue();
		$this->head= $this->head->getNext();
		return $value;
	}
}