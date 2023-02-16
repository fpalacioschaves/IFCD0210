<?php
$x = 10;

if($x == 0){
    echo "la variable x vale 0";
}
elseif($x == 5){
    echo "la variable x vale 5";
}
elseif($x== 10){
    echo "la variable x vale 10";
}
else{
    echo "la variable x no sé cuanto vale";
}

switch($x){
    case 0: 
        echo "La variable x vale 0";
        break;
    case 5:
        echo "La variable x vale 5";
        break;
    case 10:
        echo "La variable x vale 10";
        break;
    default:
        echo "No sé cuanto vale la variable x";
        break;
}