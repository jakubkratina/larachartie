<?php

namespace JK\LaraChartie\DataTable;

class Type
{

	const STRING = 'string';
	const NUMBER = 'number';
	const BOOLEAN = 'boolean';
	const DATE = 'date';
	const DATETIME = 'datetime';



	/**
	 * @return string[]
	 */
	public static function all()
	{
		return [
			self::STRING,
			self::NUMBER,
			self::BOOLEAN,
			self::DATE,
			self::DATETIME,
		];
	}



	/**
	 * @param string $type
	 * @return bool
	 */
	public static function exists($type)
	{
		return in_array($type, self::all());
	}
}
