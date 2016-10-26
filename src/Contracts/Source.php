<?php

namespace JK\LaraChartie\Contracts;

interface Source
{

	/**
	 * @param DataTable $dataTable
	 */
	public function columns(DataTable $dataTable);



	/**
	 * @param DataTable $dataTable
	 */
	public function fill(DataTable $dataTable);
}
