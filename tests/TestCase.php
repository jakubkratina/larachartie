<?php

namespace JK\LaraChartie\Tests;

use Carbon\Carbon;
use Illuminate\Contracts\Console\Kernel;
use JK\LaraChartie\ChartieServiceProvider;
use JK\LaraChartie\Contracts\DataTable;



abstract class TestCase extends \Illuminate\Foundation\Testing\TestCase
{

	/**
	 * The base URL to use while testing the application.
	 *
	 * @var string
	 */
	protected $baseUrl = 'http://ecolroy-admin.dev';



	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__ . '/../vendor/laravel/laravel/bootstrap/app.php';

		$app->register(ChartieServiceProvider::class);

		$app->make(Kernel::class)->bootstrap();

		return $app;
	}



	/**
	 * @var string[]
	 */
	protected $columns = [
		'Date'     => 'date',
		'Value'    => 'number',
		'Position' => 'string'
	];

	/**
	 * @var array
	 */
	protected $rows = [
		['now', 1, 'CEO'],
		['now', 2, 'CTO'],
		['now', 3, 'CFO'],
	];

	/**
	 * @var DataTable
	 */
	protected $dataTable;



	/**
	 * @param DataTable $dataTable
	 * @return DataTable
	 */
	protected function fill(DataTable $dataTable)
	{
		return $this->addRows($this->addColumns($dataTable));
	}



	/**
	 * @return array
	 */
	public function columnsToArray()
	{
		return collect($this->columns)->map(function ($type, $label) {
			return compact('label', 'type');
		})->values()->toArray();
	}



	/**
	 * @param DataTable $dataTable
	 * @return DataTable
	 */
	protected function addColumns(DataTable $dataTable)
	{
		foreach ($this->columns as $label => $type) {
			$dataTable->addColumn($type, $label);
		}

		return $dataTable;
	}



	/**
	 * @param DataTable $dataTable
	 * @return DataTable
	 */
	protected function addRows(DataTable $dataTable)
	{
		foreach ($this->rows as $row) {
			$dataTable->addRow($this->parseDate($row));
		}

		return $dataTable;
	}



	/**
	 * @param array $row
	 * @return array
	 */
	protected function parseDate($row)
	{
		return array_map(function ($value) {
			return $value === 'now' ? Carbon::now() : $value;
		}, $row);
	}
}
