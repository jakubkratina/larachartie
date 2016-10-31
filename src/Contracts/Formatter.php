<?php

namespace JK\LaraChartie\Contracts;

interface Formatter
{

	/**
	 * @param DataTable $dataTable
	 * @return array
	 */
	public function format(DataTable $dataTable);
}
