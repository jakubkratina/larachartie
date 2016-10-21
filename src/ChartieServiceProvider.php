<?php

namespace JK\LaraChartie;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use JK\LaraChartie\Contracts\Chart;
use JK\LaraChartie\Contracts\ColumnsFactory;
use JK\LaraChartie\Contracts\RowsFactory;
use JK\LaraChartie\DataTable\Factory\DataTableFactory;



class ChartieServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->app->bind(Chart::class, function (Application $app) {
			return new \App\Charts\Chart($app, new DataTableFactory);
		});

		$this->app->alias(Chart::class, 'chart');

		$this->app->singleton(RowsFactory::class, \App\Charts\DataTable\Factory\RowsFactory::class);
		$this->app->singleton(ColumnsFactory::class, \App\Charts\DataTable\Factory\ColumnsFactory::class);
	}
}
