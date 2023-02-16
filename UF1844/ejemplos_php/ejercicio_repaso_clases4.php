<?php

class kids
{

    public function __set($property, $value)
    {
        $this->property = $value;
     
    }

    public function __get($property)
    {
        return "The child's height is " . $this->property . " inches tall";
    }
}

$kid1 = new kids;

$kid1->height = 45;

$kid1->weight = 65;

echo $kid1->height;
echo $kid1->weight;

var_dump($kid1);
