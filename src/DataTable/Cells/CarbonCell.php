<?php

namespace JK\LaraChartie\DataTable\Cells;

use Carbon\Carbon;



class CarbonCell extends Cell
{

	/**
	 * @var Carbon
	 */
	protected $value;



	/**
	 * @return array
	 */
	public function toArray()
	{
		return [
			'v' => $this->formatToGoogleChartValue(),
			'f' => $this->format !== null ? $this->value->format($this->format) : null
		];
	}



	/**
	 * @return string
	 */
	protected function formatToGoogleChartValue()
	{
		return sprintf('Date(%s, %s, %s, %s, %s, %s)',
			$this->value->year,
			$this->value->month,
			$this->value->day,
			$this->value->hour,
			$this->value->minute,
			$this->value->second
		);
	}
}
