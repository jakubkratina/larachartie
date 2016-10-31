<?php

namespace JK\LaraChartie\DataTable\Factory;

use JK\LaraChartie\Contracts\Factory\CellsFactory;
use JK\LaraChartie\Contracts\Factory\RowsFactory as Contract;
use JK\LaraChartie\DataTable\Row;
use JK\LaraChartie\Exceptions\InvalidCellsCountException;



class RowsFactory implements Contract
{

	/**
	 * @var CellsFactory
	 */
	protected $cells;



	/**
	 * @param CellsFactory $cells
	 */
	public function __construct(CellsFactory $cells)
	{
		$this->cells = $cells;
	}



	/**
	 * {@inheritdoc}
	 */
	public function create(array $values, int $columns)
	{
		if (self::areSplatted($values) === true) {
			$values = $values[0];
		}

		// TODO only at LineChartFormatter
//		if (count($values) !== $columns) {
//			throw new InvalidCellsCountException(count($values), $columns);
//		}

		return (new Row($this->cells))->addCells($values);
	}



	/**
	 * @param array $values
	 * @return bool
	 */
	protected static function areSplatted($values)
	{
		return is_array($values) && isset($values[0]) && is_array($values[0]) && isset($values[0]['value']) === false;
	}
}
