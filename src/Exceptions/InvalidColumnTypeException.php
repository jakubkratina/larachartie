<?php

namespace JK\LaraChartie\Exceptions;

use Exception;



class InvalidColumnTypeException extends Exception
{

	/**
	 * @param string $type
	 */
	public function __construct($type)
	{
		$this->message = sprintf('Invalid column type [%s].', $type);
	}
}
