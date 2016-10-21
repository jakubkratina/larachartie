<?php

namespace JK\LaraChartie\DataTable;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use JK\LaraChartie\DataTable\CarbonCell;
use JK\LaraChartie\DataTable\Cell;



class Row implements Arrayable
{

	/**
	 * @var Collection|Cell[]
	 */
	protected $cells;



	public function __construct()
	{
		$this->cells = new Collection();
	}



	/**
	 * @param array $values
	 * @return $this
	 */
	public function addCells(array $values)
	{
		$this->cells = $this->cells->merge(array_map(function ($value) {
			if ($value instanceof Carbon) {
				return new CarbonCell($value);
			}

			return new Cell($value);
		}, $values));

		return $this;
	}



	/**
	 * @return Collection|Cell[]
	 */
	public function cells()
	{
		return $this->cells;
	}



	/**
	 * @return array
	 */
	public function toArray()
	{
		return [
			'c' => $this->cells->toArray()
		];
	}
}