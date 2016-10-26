<?php

namespace JK\LaraChartie\DataTable\Factory;

use Carbon\Carbon;
use JK\LaraChartie\Contracts\Factory\CellsFactory as Contract;
use JK\LaraChartie\DataTable\Cells\CarbonCell;
use JK\LaraChartie\DataTable\Cells\Cell;



class CellsFactory implements Contract
{

	/**
	 * {@inheritdoc}
	 */
	public function create($value, $format = null)
	{
		if (is_array($value)) {
			return $this->create($value['value'], $value['format']);
		}

		if ($value instanceof Carbon) {
			return new CarbonCell($value, $format);
		}

		return new Cell($value, $format);
	}
}
