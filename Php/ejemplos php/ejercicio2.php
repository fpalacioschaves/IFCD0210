<!DOCTYPE html>
<html>
    <title>Min, max, media</title>
<body>

<?php
class Output {

public $max;
public $min;
public $media;

public function __construct(int $max = 0, int $min = 0, float $media = 0.0) {
$this->max = $max;
$this->min = $min;
$this->media = $media;
}
}
function validate_input_array($param){
return is_null($param) || count($param) == 0;
}
function get_max_min_average(...$params){
$output = new Output(0,0,0);
if (validate_input_array($params)){
return $output;
}

$output->max= max($params);
$output->min = min($params);
$output->media = array_sum($params)/count($params);
return $output;
}

$result = get_max_min_average(3,18,5,1,14,8,0);
echo $result->max;
echo "<br>";
echo $result->min;
echo "<br>";
echo $result->media;

?>

</body>
</html>