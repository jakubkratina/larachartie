<?php

namespace JK\LaraChartie\DataTable\Factory;

use JK\LaraChartie\Contracts\RowsFactory as Contract;
use JK\LaraChartie\DataTable\Row;
use JK\LaraChartie\Exceptions\InvalidCellsCountException;



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
