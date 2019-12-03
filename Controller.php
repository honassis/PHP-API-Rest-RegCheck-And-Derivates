<?php
/*
Informations in:
http://placaapi.com/data/doc.aspx
*/
$username = 'User';
$regNumber = 'Reg';
//$xmlData =file_get_contents("http://placaapi.com/api/reg.asmx/CheckBrazil?RegistrationNumber=" . $regNumber ."&username=" . $username);
$xmlData = file_get_contents("Example.xml");
$xml=simplexml_load_string($xmlData);
$strJson = $xml->vehicleJson;
$json = json_decode($strJson);
print_r($json);
?>