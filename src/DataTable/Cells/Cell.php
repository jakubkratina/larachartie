<?php

namespace JK\LaraChartie\DataTable\Cells;

use Illuminate\Contracts\Support\Arrayable;



class Cell implements Arrayable
{

	/**
	 * @var mixed
	 */
	protected $value;

	/**
	 * @var string|null
	 */
	protected $format;



	/**
	 * @param mixed       $value
	 * @param string|null $format
	 */
	public function __construct($value, $format = null)
	{
		$this->value = $value;
		$this->format = $format;
	}



	/**
	 * @return array
	 */
	public function toArray()
	{
		return [
			'v' => $this->value,
			'f' => $this->format ?: null
		];
	}



	/**
	 * @return mixed
	 */
	public function value()
	{
		return $this->value;
	}



	/**
	 * @return string|null
	 */
	public function format()
	{
		return $this->format;
	}
}
