<?php
$client = new SoapClient('http://ws.cdyne.com/ip2geo/ip2geo.asmx?wsdl'); 
$param = array( 'ipAddress' => '79.147.195.67', 'licenseKey' => '0', ); 
$result = $client->ResolveIP($param);
echo "<pre>";
print_r($result); 
echo "</pre>";
//echo $result->ResolveIPResult->City;

?>