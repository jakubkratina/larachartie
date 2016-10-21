<?php

namespace JK\LaraChartie\Facades;

use Illuminate\Support\Facades\Facade;
use JK\LaraChartie\Contracts\DataTable;



/**
 * @see JK\LaraChartie\Chart
 *
 * @method static DataTable dataTable()
 */
class Chart extends Facade
{

	/**
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'chart';
	}
}
