<?php

namespace Application\Entity;

class Address
{
	/**
	 * @var string
	 \*/
	protected $name;
	
	/**
	 * @var int
	 \*/
	protected $quantity;
	
	/**
	 * @param string $quantity
	 * @return Product
	 \*/
	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
		return $this;
	}
	
	/**
	 * @return string
	 \*/
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * @param string $name
	 * @return Category
	 \*/
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 \*/
	public function getName()
	{
		return $this->name;
	}
}