<?php

namespace JK\LaraChartie;

use JK\LaraChartie\Contracts\ColumnsFactory;
use JK\LaraChartie\Contracts\DataTable;
use JK\LaraChartie\Contracts\DataTableFactory;
use JK\LaraChartie\Contracts\RowsFactory;
use Illuminate\Foundation\Application;



class Chart
{

	/**
	 * @var Application
	 */
	protected $app;

	/**
	 * @var DataTableFactory
	 */
	protected $factory;



	/**
	 * @param Application      $app
	 * @param DataTableFactory $factory
	 */
	public function __construct(Application $app, DataTableFactory $factory)
	{
		$this->app = $app;
		$this->factory = $factory;
	}



	/**
	 * @return DataTable
	 */
	public function dataTable()
	{
		return ($this->factory)::create(
			$this->app->make(RowsFactory::class), $this->app->make(ColumnsFactory::class)
		);
	}
}
