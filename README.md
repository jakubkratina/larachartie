# LaraChartie
Lightweight PHP wrapper for Google Chart javascript library for Laravel framework

## Installation

Install via composer:

```
composer require jakubkratina/larachartie
```

Register service provider:

```php
\JK\LaraChartie\ChartieServiceProvider::class
```

Register LaraChartie's facade:
```php
'Chartie' => JK\LaraChartie\Facades\Chart::class
```

## Usage

You can create a folder for you definitions, for example `app\Charts\DataTable`.

In this folder you can put your files, which have to implements `JK\LaraChartie\Contracts\Source` contract.

```php
<?php

namespace App\Charts\DataTable;

use Carbon\Carbon;
use JK\LaraChartie\Contracts\DataTable;
use JK\LaraChartie\Contracts\Source;
use JK\LaraChartie\DataTable\Type;



class UsersSource implements JK\LaraChartie\Contracts\Source
{

	/**
	 * @param DataTable $dataTable
	 */
	public function columns(DataTable $dataTable)
	{
		$dataTable
			->addColumn(Type::DATE, 'Created At')
			->addStringColumn('Name')
			->addStringColumn('Country');
	}



	/**
	 * @param DataTable $dataTable
	 */
	public function fill(DataTable $dataTable)
	{
		foreach (User::all() as $user) {
			$dataTable->addRow(
				$user->created_at,
				$user->firstname,
				[
					'value' => $user->country,
					'format' => 'User is from ' . $user->country
				]
			);
		}
	}
}

```

Then you can just have to call following in the your controller class:

```php

use use JK\LaraChartie\Facades\Chart;
use use App\Charts\DataTable\UsersStorage;

class UsersController extends Controller
{

	/**
	 * @return array
	 */
	public function progress()
	{
		return Chart::dataTable()
			->source(UsersStorage::class)
			->toArray();
	}
}
```

And your output will be like this:

```json
{
	"cols": [
		{
			"label": "Date",
			"type": "date"
		},
		{
			"label": "Name",
			"type": "string"
		},
		{
			"label": "Country",
			"type": "string"
		}
	],
	"rows": [
		{
			"c": [
				{
					"v": "Date(2016, 8, 12, 18, 24, 21)",
					"f": null
				},
				{
					"v": "John",
					"f": null
				},
				{
					"v": "ZA",
					"f": "User is from ZA"
				}
			]
		},
		{
			"c": [
					{
						"v": "Date(2016, 8, 15, 10, 0, 53)",
						"f": null
					},
					{
						"v": "Tomas",
						"f": null
					},
					{
						"v": "CA",
						"f": "User is from CA"
					}
			]
		}
	]
}
```

And at the end of the day, you just have to pass the data into the Google chart via an ajax request:

```javascript
const users = $.ajax({
			url: '/api/users',
			dataType: 'json',
			async: false
		}).responseText;

		const data = new google.visualization.DataTable(users);
```

## Formatters

As a default formatter is used `LineChartFormatter`, which provides the previous response.
 
If you want to format the result, use one of the followings formatters:

### PieChartFormatter

```php
	return Chart::dataTable()
		->addStringColumn('Tasks')
		->addNumberColumn('Hours per Day')
		->formatter(PieChartFormatter)
		->addRows([
			['Work', 11],
			['Eat', 2],
			['Commute', 2],
			['Watch TV', 2],
			['Sleep', 7]
		])
		->toArray();
```

#### Response

```
[
	["Tasks", "Hours per Day"],
	["Work", 11],
	["Eat", 2],
	["Commute", 2],
	["Watch TV", 2],
	["Sleep", 7]
]
```

## DataTable's methods

```php
interface DataTable
{

	/**
	 * @param string $type
	 * @param string $label
	 * @return $this
	 */
	public function addColumn($type, $label);



	/**
	 * @param string $label
	 * @return $this
	 */
	public function addStringColumn($label);



	/**
	 * @param string $label
	 * @return $this
	 */
	public function addNumberColumn($label);



	/**
	 * @param string $label
	 * @return $this
	 */
	public function addBooleanColumn($label);



	/**
	 * @param string $label
	 * @return $this
	 */
	public function addDateColumn($label);



	/**
	 * @param string $label
	 * @return $this
	 */
	public function addDateTimeColumn($label);



	/**
	 * @param array ...$values
	 * @return $this
	 */
	public function addRow(... $values);



	/**
	 * @return Collection|Column[]
	 */
	public function columns();



	/**
	 * @return Collection|Column[]
	 */
	public function rows();



	/**
	 * @return array
	 */
	public function toArray();



	/**
	 * @param string $dataTable
	 * @return DataTable
	 */
	public function source($dataTable);
}
```
