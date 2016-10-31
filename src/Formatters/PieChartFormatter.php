<?php

namespace JK\LaraChartie\Formatters;

use Illuminate\Support\Collection;
use JK\LaraChartie\Contracts\DataTable;
use JK\LaraChartie\Contracts\Formatter;
use JK\LaraChartie\DataTable\Cells\Cell;
use JK\LaraChartie\DataTable\Column;
use JK\LaraChartie\DataTable\Row;



class PieChartFormatter implements Formatter
{

	/**
	 * {@inheritdoc}
	 */
	public function format(DataTable $dataTable)
	{
		return array_merge(
			[$this->columns($dataTable->columns())],
			$this->rows($dataTable->rows())
		);
	}



	/**
	 * @param Collection $columns
	 * @return array
	 */
	protected function columns(Collection $columns)
	{
		return $columns->map(function (Column $column) {
			return $column->label();
		})->toArray();
	}



	/**
	 * @param Collection $rows
	 * @return array
	 */
	protected function rows(Collection $rows)
	{
		return $rows->map(function (Row $row) {
			return $row->cells()->map(function (Cell $cell) {
				return $cell->value();
			});
		})->toArray();
	}
}
