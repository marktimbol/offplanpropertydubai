<?php

namespace App;
use Cart;

class Compare
{
	public static function all()
	{
		return Cart::content();
	}

	public static function add($id, $name, $quantity = 0, $price = 0, $options = [])
	{
		return Cart::add($id, $name, $quantity, $price, $options);
	}

	public static function remove($rowId)
	{
		Cart::remove($rowId);
	}
}