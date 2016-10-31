<?php

namespace JK\LaraChartie\Formatters;

use JK\LaraChartie\Contracts\DataTable;
use JK\LaraChartie\Contracts\Formatter;



class LineChartFormatter implements Formatter
{

	/**
	 * {@inheritdoc}
	 */
	public function format(DataTable $dataTable)
	{
		return [
			'cols' => $dataTable->columns()->toArray(),
			'rows' => $dataTable->rows()->toArray(),
		];
	}
}
