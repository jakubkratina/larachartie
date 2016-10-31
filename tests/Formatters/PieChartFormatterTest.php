<?php

namespace JK\LaraChartie\Tests\Formatters;

use JK\LaraChartie\Facades\Chart;
use JK\LaraChartie\Formatters\PieChartFormatter;
use JK\LaraChartie\Tests\TestCase;



class PieChartFormatterTest extends TestCase
{

	/**
	 * @var array
	 */
	protected $columns = ['Tasks', 'Hours per Day'];

	/**
	 * @var array
	 */
	protected $rows = [
		['Work', 11],
		['Eat', 2],
		['Commute', 2],
		['Watch TV', 2],
		['Sleep', 7]
	];



	/** @test */
	public function it_formats_a_pie_chart_data()
	{
		$dataTable = (Chart::dataTable())
			->formatter(new PieChartFormatter)
			->addStringColumn('Tasks')
			->addNumberColumn('Hours per Day')
			->addRows($this->rows);

		$this->assertSame($this->toArray(), $dataTable->toArray());
	}



	/**
	 * @return array
	 */
	protected function toArray()
	{
		return array_merge([$this->columns], $this->rows);
	}
}
