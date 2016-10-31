<?php

namespace JK\LaraChartie\Tests;

use Carbon\Carbon;
use JK\LaraChartie\DataTable\Column;
use JK\LaraChartie\DataTable\Type;
use JK\LaraChartie\Facades\Chart;



class ColumnsTest extends TestCase
{

	/** @test */
	public function it_creates_a_columns()
	{
		$this->dataTable = $this->fill(Chart::dataTable());

		$this->assertCount(3, $columns = $this->dataTable->columns());

		/** @var Column $column */
		foreach ($columns as $column) {
			$this->assertInstanceOf(Column::class, $column);
			$this->assertSame($this->columns[$column->label()], $column->type());
		}

		$this->assertSame($this->columnsToArray(), $this->dataTable->columns()->toArray());
	}



	/** @test */
	public function it_creates_a_string_column()
	{
		$this->dataTable = Chart::dataTable();

		$this->assertCount(0, $this->dataTable->columns());

		$this->dataTable->addStringColumn('Hi');

		$this->assertCount(1, $this->dataTable->columns());

		$column = $this->dataTable->columns()->first();
		$this->assertSame($column->type(), Type::STRING);
		$this->assertSame($column->label(), 'Hi');
	}



	/** @test */
	public function it_creates_a_number_column()
	{
		$this->dataTable = Chart::dataTable();

		$this->assertCount(0, $this->dataTable->columns());

		$this->dataTable->addNumberColumn(10);

		$this->assertCount(1, $this->dataTable->columns());

		$column = $this->dataTable->columns()->first();
		$this->assertSame($column->type(), Type::NUMBER);
		$this->assertSame($column->label(), 10);
	}



	/** @test */
	public function it_creates_a_boolean_column()
	{
		$this->dataTable = Chart::dataTable();

		$this->assertCount(0, $this->dataTable->columns());

		$this->dataTable->addBooleanColumn('label');

		$this->assertCount(1, $this->dataTable->columns());

		$column = $this->dataTable->columns()->first();
		$this->assertSame($column->type(), Type::BOOLEAN);
		$this->assertSame($column->label(), 'label');
	}



	/** @test */
	public function it_creates_a_date_column()
	{
		$this->dataTable = Chart::dataTable();

		$this->assertCount(0, $this->dataTable->columns());

		$date = Carbon::now();

		$this->dataTable->addDateColumn($date);

		$this->assertCount(1, $this->dataTable->columns());

		$column = $this->dataTable->columns()->first();
		$this->assertSame($column->type(), Type::DATE);
		$this->assertSame($column->label(), $date);
	}



	/** @test */
	public function it_creates_a_datetime_column()
	{
		$this->dataTable = Chart::dataTable();

		$this->assertCount(0, $this->dataTable->columns());

		$date = Carbon::now();

		$this->dataTable->addDateTimeColumn($date);

		$this->assertCount(1, $this->dataTable->columns());

		$column = $this->dataTable->columns()->first();
		$this->assertSame($column->type(), Type::DATETIME);
		$this->assertSame($column->label(), $date);
	}
}
