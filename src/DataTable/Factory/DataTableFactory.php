<?php

namespace JK\LaraChartie\DataTable\Factory;

use JK\LaraChartie\Contracts\Factory\ColumnsFactory;
use JK\LaraChartie\Contracts\Factory\DataTableFactory as Contract;
use JK\LaraChartie\Contracts\Factory\RowsFactory;
use JK\LaraChartie\DataTable\DataTable;



class DataTableFactory implements Contract
{

	/**
	 * {@inheritdoc}
	 */
	public function create(RowsFactory $rowsFactory, ColumnsFactory $columnsFactory)
	{
		return new DataTable($rowsFactory, $columnsFactory);
	}
}
