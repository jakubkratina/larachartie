<?php

namespace JK\LaraChartie\DataTable\Factory;

use App\Charts\DataTable\DataTable;
use App\Contracts\Charts\ColumnsFactory;
use App\Contracts\Charts\DataTableFactory as Contract;
use App\Contracts\Charts\RowsFactory;



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
