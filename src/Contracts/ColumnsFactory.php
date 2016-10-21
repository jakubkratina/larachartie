<?php

namespace JK\LaraChartie\Contracts;

use JK\LaraChartie\DataTable\Column;
use JK\LaraChartie\Exceptions\InvalidColumnTypeException;



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
