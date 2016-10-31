<?php

namespace JK\LaraChartie\Tests\Formatters;

use Carbon\Carbon;
use JK\LaraChartie\DataTable\Cells\CarbonCell;
use JK\LaraChartie\DataTable\Cells\Cell;
use JK\LaraChartie\Facades\Chart;
use JK\LaraChartie\Tests\TestCase;



class LineChartFormatterTest extends TestCase
{

	/** @test */
	public function it_formats_a_line_chart_data()
	{
		$this->dataTable = $this->fill(Chart::dataTable());
		$this->defaultDate = Carbon::now();

		$this->assertSame([
			'cols' => $this->columnsToArray(),
			'rows' => $this->rowsToArray()
		], $this->dataTable->toArray());
	}



	/**
	 * @return array
	 */
	public function rowsToArray()
	{
		return collect($this->rows)->map(function ($row) {
			$row = $this->parseDate($row);

			return [
				'c' => array_map(function ($value) {
					return $value instanceof Carbon
						? (new CarbonCell($value))->toArray()
						: (new Cell($value))->toArray();
				}, $row)
			];
		})->toArray();
	}
}
