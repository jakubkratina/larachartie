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

		$this->app->alias(Chart::class, 'chartie');

		$this->app->alias(DataTable\Factory\DataTableFactory::class, DataTableFactory::class);
		$this->app->alias(DataTable\Factory\RowsFactory::class, RowsFactory::class);
		$this->app->alias(DataTable\Factory\ColumnsFactory::class, ColumnsFactory::class);
		$this->app->alias(DataTable\Factory\CellsFactory::class, CellsFactory::class);
	}



	/**
	 * @return string[]
	 */
	public function provides()
	{
		return ['chartie', \JK\LaraChartie\Chart::class];
	}



	protected function registerDataTable()
	{
		$this->app->singleton(Chart::class, function (Application $app) {
			return new \JK\LaraChartie\Chart(
				$app, $app[DataTableFactory::class], $app[RowsFactory::class], $app[ColumnsFactory::class]
			);
		});
	}



	protected function registerRowsFactory()
	{
		$this->app->singleton(RowsFactory::class, function (Application $app) {
			return new DataTable\Factory\RowsFactory(
				$app[CellsFactory::class]
			);
		});
	}
}
