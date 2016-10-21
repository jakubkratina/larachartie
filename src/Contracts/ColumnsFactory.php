<?php

namespace JK\LaraChartie\Contracts;

use App\Charts\DataTable\Column;
use App\Charts\Exceptions\InvalidColumnTypeException;



interface ColumnsFactory
{

	/**
	 * @param string $type
	 * @param string $label
	 * @return Column
	 * @throws InvalidColumnTypeException
	 */
	public static function create($type, $label = '');
}
