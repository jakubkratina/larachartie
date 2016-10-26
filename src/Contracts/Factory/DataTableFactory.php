<?php

namespace JK\LaraChartie\Contracts\Factory;

interface DataTableFactory
{

	/**
	 * @param RowsFactory    $rowsFactory
	 * @param ColumnsFactory $columnsFactory
	 * @return mixed
	 */
	public function create(RowsFactory $rowsFactory, ColumnsFactory $columnsFactory);
}
