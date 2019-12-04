<?php
class Main extends Env {
    public static $values;

    public static function init($regNumber) {
        $username           = Env::Config()->user_api;
        if(Env::Config()->sandbox){
            $xmlData            = file_get_contents("Sandbox.xml");
        }else{
            $xmlData =file_get_contents("http://placaapi.com/api/reg.asmx/CheckBrazil?".
            "RegistrationNumber=" . $regNumber ."&username=" . $username);
        }
        $xml                = simplexml_load_string($xmlData);
        $xml                = (array) $xml;
        $xml['vehicleJson'] = json_decode($xml['vehicleJson']);
        $xml['reg'] = $regNumber;
        $xml                = (object) $xml;
        self::$values       = json_encode($xml);
        return self::$values;
    }
    
}

?>