<?php

namespace JK\LaraChartie\DataTable\Factory;

use App\Charts\DataTable\Row;
use App\Charts\Exceptions\InvalidCellsCountException;
use App\Contracts\Charts\RowsFactory as Contract;



class RowsFactory implements Contract
{

	/**
	 * {@inheritdoc}
	 */
	public static function create(array $values, int $columns)
	{
		if (self::areSplatted($values) === true) {
			$values = $values[0];
		}

		if (count($values) !== $columns) {
			throw new InvalidCellsCountException(count($values), $columns);
		}

		return (new Row())->addCells($values);
	}



	/**
	 * @param array $values
	 * @return bool
	 */
	protected static function areSplatted($values)
	{
		return is_array($values) && isset($values[0]) && is_array($values[0]);
	}
}
