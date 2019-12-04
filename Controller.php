<?php
/* Documetation used in: http://placaapi.com/data/doc.aspx */
header("Content-type: application/json; charset=utf-8");
$parsed = parse_ini_file('.env');
foreach ($parsed as $key => $value) {
    $_ENV[$key] = $value;
}

include_once "Config.php";

class Main extends DataBase {
    public static $values;
    public static function init() {
        $username           = $_ENV['user_api'];
        $regNumber          = $_GET['reg'];
        //$xmlData =file_get_contents("http://placaapi.com/api/reg.asmx/CheckBrazil?RegistrationNumber=" . $regNumber ."&username=" . $username);
        $xmlData            = file_get_contents("Sandbox.xml");
        $xml                = simplexml_load_string($xmlData);
        $xml                = (array) $xml;
        $xml['vehicleJson'] = json_decode($xml['vehicleJson']);
        $xml                = (object) $xml;
        self::$values       = json_encode($xml);
        return self::$values;
    }
}
echo Main::init();
?> 