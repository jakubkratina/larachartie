<?php

namespace JK\LaraChartie\DataTable;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use JK\LaraChartie\Contracts\Factory\CellsFactory;
use JK\LaraChartie\DataTable\Cells\Cell;



class Row implements Arrayable
{

	/**
	 * @var Collection|Cell[]
	 */
	protected $cells;

	/**
	 * @var CellsFactory
	 */
	protected $cellsFactory;



	/**
	 * @param CellsFactory $cellsFactory
	 */
	public function __construct(CellsFactory $cellsFactory)
	{
		$this->cellsFactory = $cellsFactory;

		$this->cells = new Collection();
	}



	/**
	 * @param array $values
	 * @return $this
	 */
	public function addCells(array $values)
	{
		$this->cells = $this->cells->merge(array_map(function ($value) {
			return $this->cellsFactory->create($value);
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
