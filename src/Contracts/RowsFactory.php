<?php

namespace JK\LaraChartie\Contracts;

use JK\LaraChartie\DataTable\Row;
use JK\LaraChartie\Exceptions\InvalidCellsCountException;



interface RowsFactory
{

	/**
	 * @param array $values
	 * @param int   $columns
	 * @return Row
	 * @throws InvalidCellsCountException
	 */
	public static function create(array $values, int $columns);
}
