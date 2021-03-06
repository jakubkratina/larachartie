<?php

namespace JK\LaraChartie\DataTable\Factory;

use JK\LaraChartie\Contracts\Factory\ColumnsFactory as Contract;
use JK\LaraChartie\DataTable\Column;
use JK\LaraChartie\DataTable\Type;
use JK\LaraChartie\Exceptions\InvalidColumnTypeException;



class ColumnsFactory implements Contract
{

	/**
	 * {@inheritdoc}
	 */
	public static function create($type, $label = '')
	{
		if (Type::exists($type) === false) {
			throw new InvalidColumnTypeException($type);
		}

		return new Column($type, $label);
	}
}
