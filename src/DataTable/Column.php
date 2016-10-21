<?php

namespace JK\LaraChartie\DataTable;

use Illuminate\Contracts\Support\Arrayable;



class Column implements Arrayable
{

	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @var string
	 */
	protected $label;



	/**
	 * @param string $type
	 * @param string $label
	 */
	public function __construct($type, $label)
	{
		$this->type = $type;
		$this->label = $label;
	}



	/**
	 * @return string
	 */
	public function type()
	{
		return $this->type;
	}



	/**
	 * @return string
	 */
	public function label()
	{
		return $this->label;
	}



	/**
	 * @return array
	 */
	public function toArray()
	{
		return [
			'label' => $this->label,
			'type'  => $this->type,
		];
	}
}
