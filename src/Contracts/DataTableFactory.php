<?php

namespace JK\LaraChartie\Contracts;

interface DataTableFactory
{

	/**
	 * @param RowsFactory    $rowsFactory
	 * @param ColumnsFactory $columnsFactory
	 * @return mixed
	 */
	public static function create(RowsFactory $rowsFactory, ColumnsFactory $columnsFactory);
}
