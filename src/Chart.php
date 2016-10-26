<?php

namespace JK\LaraChartie;

use Illuminate\Foundation\Application;
use JK\LaraChartie\Contracts\DataTable;
use JK\LaraChartie\Contracts\Factory\ColumnsFactory;
use JK\LaraChartie\Contracts\Factory\DataTableFactory;
use JK\LaraChartie\Contracts\Factory\RowsFactory;



class Chart
{

	/**
	 * @var Application
	 */
	protected $app;

	/**
	 * @var DataTableFactory
	 */
	protected $dataTable;

	/**
	 * @var RowsFactory
	 */
	protected $rows;

	/**
	 * @var ColumnsFactory
	 */
	protected $columns;



	/**
	 * @param Application      $app
	 * @param DataTableFactory $dataTable
	 * @param RowsFactory      $rows
	 * @param ColumnsFactory   $columns
	 */
	public function __construct(
		Application $app,
		DataTableFactory $dataTable,
		RowsFactory $rows,
		ColumnsFactory $columns
	)
	{
		$this->app = $app;
		$this->dataTable = $dataTable;
		$this->rows = $rows;
		$this->columns = $columns;
	}



	/**
	 * @return DataTable
	 */
	public function dataTable()
	{
		return $this->dataTable->create($this->rows, $this->columns);
	}
}
