<?php

if($_POST){

    $country = $_POST["isocode"];

    $client = new SoapClient('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL'); 
    $param = array( 'sCountryISOCode' => $country ); 
    $result = $client->FullCountryInfo($param); 
    $resultado = $result->FullCountryInfoResult;

    print_r($resultado);

    echo "Nombre: " . $resultado->sName . "<br>";
    echo "Capital: " . $resultado->sCapitalCity . "<br>";
    echo "<img src='".$resultado->sCountryFlag."'>";

}
else{
?>
<form id="" action="" method="post">
    Introduce código ISO del pais: <input type="text" name="isocode" id="isocode">
    <input type="submit" value="Enviar">




<?php } ?>