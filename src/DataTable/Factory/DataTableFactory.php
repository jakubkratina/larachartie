<?php

namespace JK\LaraChartie\DataTable\Factory;

use JK\LaraChartie\Contracts\ColumnsFactory;
use JK\LaraChartie\Contracts\DataTableFactory as Contract;
use JK\LaraChartie\Contracts\RowsFactory;
use JK\LaraChartie\DataTable\DataTable;



class DataTableFactory implements Contract
{

	/**
	 * {@inheritdoc}
	 */
	public static function create(RowsFactory $rowsFactory, ColumnsFactory $columnsFactory)
	{
		return new DataTable($rowsFactory, $columnsFactory);
	}
}
