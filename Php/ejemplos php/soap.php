<?php
$client = new SoapClient('http://ws.cdyne.com/ip2geo/ip2geo.asmx?wsdl'); 
$param = array( 'ipAddress' => '95.23.148.203', 'licenseKey' => '0', ); 
$result = $client→ResolveIP($param);
print_r($result); 
echo $result→ResolveIPResult→City;*/

?>