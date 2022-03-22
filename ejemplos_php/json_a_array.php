<?php
$json = '{
	"name": "Monty",
	"email": "monty@something.com",
	"age": 77
}';

$array = json_decode($json,true);

print_r($array);

echo $array["name"];

$json2 = '{
	"customers": [
	{
		"name": "Andrew",
		"email": "andrew@something.com",
		"age": 62,
		"countries": [
			{
				"name": "Italy",
				"year": 1983
			},
			{
				"name": "Canada",
				"year": 1998
			},
			{
				"name": "Germany",
				"year": 2003
			}
			]
	},
	{
		"name": "Sajal",
		"email": "sajal@something.com",
		"age": 65,
		"countries": [
			{
				"name": "Belgium",
				"year": 1994
			},
			{
				"name": "Hungary",
				"year": 2001
			},
			{
				"name": "Chile",
				"year": 2013
			}
		]
	},
	{
		"name": "Adam",
		"email": "adam@something.com",
		"age": 72,
		"countries": [
			{
				"name": "France",
				"year": 1988
			},
			{
				"name": "Brazil",
				"year": 1998
			},
			{
				"name": "Poland",
				"year": 2002
			}
		]
	},
	{
		"name": "Monty",
		"email": "monty@something.com",
		"age": 77,
		"countries": [
			{
				"name": "Spain",
				"year": 1982
			},
			{
				"name": "Australia",
				"year": 1996
			},
			{
				"name": "Germany",
				"year": 1987
			}
		]
	}
	]
}
';

$array2 = json_decode($json2, true);
echo "<pre>";
print_r($array2);
echo "</pre>";