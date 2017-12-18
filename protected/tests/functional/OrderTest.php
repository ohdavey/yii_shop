<?php

class OrderTest extends WebTestCase
{
	public $fixtures=array(
		'orders'=>'Order',
	);

	public function testShow()
	{
		$this->open('?r=order/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=order/create');
	}

	public function testUpdate()
	{
		$this->open('?r=order/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=order/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=order/index');
	}

	public function testAdmin()
	{
		$this->open('?r=order/admin');
	}
}
