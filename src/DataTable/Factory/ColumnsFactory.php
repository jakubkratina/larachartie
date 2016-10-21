<?php

namespace JK\LaraChartie\DataTable\Factory;

use App\Charts\Exceptions\InvalidColumnTypeException;
use App\Charts\DataTable\Column;
use App\Charts\DataTable\Type;
use App\Contracts\Charts\ColumnsFactory as Contract;



class ColumnsFactory implements Contract
{

	/**
	 * @param string $type
	 * @param string $label
	 * @return Column
	 * @throws InvalidColumnTypeException
	 */
	public static function create($type, $label = '')
	{
		if (Type::exists($type) === false) {
			throw new InvalidColumnTypeException($type);
		}

		return new Column($type, $label);
	}
}
