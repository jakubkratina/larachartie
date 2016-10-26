<?php

namespace JK\LaraChartie\Contracts\Factory;

use JK\LaraChartie\DataTable\Cells\Cell;



interface CellsFactory
{

	/**
	 * @param mixed  $value
	 * @param string $format
	 * @return Cell
	 */
	public function create($value, $format = null);
}
