<?php

namespace JK\LaraChartie\Tests\DataTable;

use Carbon\Carbon;
use JK\LaraChartie\DataTable\Cells\CarbonCell;
use JK\LaraChartie\DataTable\Cells\Cell;
use JK\LaraChartie\DataTable\Row;
use JK\LaraChartie\Facades\Chart;
use JK\LaraChartie\Tests\TestCase;



class RowsTest extends TestCase
{

	public function setUp()
	{
		parent::setUp();

		$this->dataTable = $this->fill(Chart::dataTable());
	}



	/** @test */
	public function it_creates_a_rows()
	{
		$this->assertCount(3, $rows = $this->dataTable->rows());

		/** @var Row $row */
		foreach ($rows as $rowKey => $row) {
			$this->assertInstanceOf(Row::class, $row);

			foreach ($row->cells() as $cellKey => $cell) {
				$this->compare($this->rows[$rowKey][$cellKey], $cell);
			}
		}
	}



	/** @test */
	public function it_can_create_a_row_from_an_array()
	{
		$dataTable = $this->addColumns(Chart::dataTable());

		$dataTable->addRow([Carbon::now(), 1, 'CEO']);

		$this->assertCount(1, $dataTable->rows());
		$this->assertSame('CEO', $dataTable->rows()->first()->cells()->last()->value());
	}



	/** @test */
	public function it_can_create_a_row_from_an_arguments()
	{
		$dataTable = $this->addColumns(Chart::dataTable());

		$dataTable->addRow(Carbon::now(), 1, 'CEO');

		$this->assertCount(1, $dataTable->rows());
		$this->assertSame('CEO', $dataTable->rows()->first()->cells()->last()->value());
	}



	/**
	 * @param string $expected
	 * @param Cell   $actual
	 */
	protected function compare($expected, Cell $actual)
	{
		if ($expected === 'now') {
			$this->assertInstanceOf(CarbonCell::class, $actual);

		} else {
			$this->assertSame($expected, $actual->value());
		}
	}
}
