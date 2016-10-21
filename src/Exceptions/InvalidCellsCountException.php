<?php

namespace JK\LaraChartie\Exceptions;

use Exception;



class InvalidCellsCountException extends Exception
{

	/**
	 * @param int $cells
	 * @param int $columns
	 */
	public function __construct($cells, $columns)
	{
		$this->message = sprintf('Count of cells (%d) does not match with the columns\' count (%d)', $cells, $columns);
	}
}
