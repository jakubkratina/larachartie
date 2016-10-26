<?php

namespace JK\LaraChartie;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use JK\LaraChartie\Contracts\Chart;
use JK\LaraChartie\Contracts\Factory\CellsFactory;
use JK\LaraChartie\Contracts\Factory\ColumnsFactory;
use JK\LaraChartie\Contracts\Factory\DataTableFactory;
use JK\LaraChartie\Contracts\Factory\RowsFactory;



class ChartieServiceProvider extends ServiceProvider
{

	/**
	 * @var bool
	 */
	protected $defer = true;



	public function register()
	{
		$this->registerRowsFactory();
		$this->registerDataTable();

		$this->app->alias(Chart::class, 'chart');

		$this->app->alias(\JK\LaraChartie\DataTable\Factory\DataTableFactory::class, DataTableFactory::class);
		$this->app->alias(\JK\LaraChartie\DataTable\Factory\RowsFactory::class, RowsFactory::class);
		$this->app->alias(\JK\LaraChartie\DataTable\Factory\ColumnsFactory::class, ColumnsFactory::class);
		$this->app->alias(\JK\LaraChartie\DataTable\Factory\CellsFactory::class, CellsFactory::class);
	}



	protected function registerDataTable()
	{
		$this->app->bind(Chart::class, function (Application $app) {
			return new \JK\LaraChartie\Chart(
				$app, $app[DataTableFactory::class], $app[RowsFactory::class], $app[ColumnsFactory::class]
			);
		});
	}



	protected function registerRowsFactory()
	{
		$this->app->bind(RowsFactory::class, function (Application $app) {
			return new \JK\LaraChartie\DataTable\Factory\RowsFactory(
				$app[CellsFactory::class]
			);
		});
	}
}
