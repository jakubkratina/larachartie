<?php

namespace JK\LaraChartie\Contracts;

use App\Charts\DataTable\Column;
use Illuminate\Support\Collection;



interface DataTable
{

	/**
	 * @param string $type
	 * @param string $label
	 * @return $this
	 */
	public function addColumn($type, $label);



	/**
	 * @param string $label
	 * @return $this
	 */
	public function addStringColumn($label);



	/**
	 * @param string $label
	 * @return $this
	 */
	public function addNumberColumn($label);



	/**
	 * @param string $label
	 * @return $this
	 */
	public function addBooleanColumn($label);



	/**
	 * @param string $label
	 * @return $this
	 */
	public function addDateColumn($label);



	/**
	 * @param string $label
	 * @return $this
	 */
	public function addDateTimeColumn($label);



	/**
	 * @param array ...$values
	 * @return $this
	 */
	public function addRow(... $values);



	/**
	 * @return Collection|Column[]
	 */
	public function columns();



	/**
	 * @return Collection|Column[]
	 */
	public function rows();



	/**
	 * @return array
	 */
	public function toArray();



	/**
	 * @param string $dataTable
	 * @return DataTable
	 */
	public function from($dataTable);
}
