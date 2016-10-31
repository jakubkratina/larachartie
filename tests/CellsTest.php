<?php

namespace JK\LaraChartie\Tests;

use Carbon\Carbon;
use JK\LaraChartie\DataTable\Cells\CarbonCell;
use JK\LaraChartie\DataTable\Cells\Cell;



class CellsTest extends TestCase
{

	/** @test */
	public function it_returns_an_array_for_a_cell()
	{
		$cell = new Cell(1);

		$this->assertSame([
			'v' => 1,
			'f' => null
		], $cell->toArray());
	}



	/** @test */
	public function it_returns_an_formatted_array_for_a_cell()
	{
		$cell = new Cell(1, '1 Kč');

		$this->assertSame([
			'v' => 1,
			'f' => '1 Kč'
		], $cell->toArray());
	}



	/** @test */
	public function it_returns_an_array_for_a_date_cell()
	{
		$date = Carbon::createSafe(2016, 11, 17, 8, 30, 28);

		$cell = new CarbonCell($date);

		$this->assertSame([
			'v' => 'Date(2016, 11, 17, 8, 30, 28)',
			'f' => null
		], $cell->toArray());
	}



	/** @test */
	public function it_returns_an_formatted_array_for_a_date_cell()
	{
		$date = Carbon::createSafe(2016, 11, 17, 8, 30, 28);

		$cell = new CarbonCell($date, 'Y-m-d');

		$this->assertSame([
			'v' => 'Date(2016, 11, 17, 8, 30, 28)',
			'f' => '2016-11-17'
		], $cell->toArray());
	}
}
