<?php

namespace JK\LaraChartie\Contracts;

use App\Charts\DataTable\Row;
use App\Charts\Exceptions\InvalidCellsCountException;



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
