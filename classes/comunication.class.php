<?php
class Main extends Env {
    public static $message;

    public static function init($regNumber) {
    $regNumber = str_replace("-","",$regNumber);
        if(strlen($regNumber)==7){
            return self::load($regNumber);
        }else{ 
            return array (
                "message" =>"Invalid Reg");
        }
    
    }
    public static function load($regNumber) {
        $username           = Env::Config()->user_api;
        if(Env::Config()->sandbox){
            $xmlData            = file_get_contents("Sandbox.xml");
        }else{
            $xmlData =file_get_contents(Env::Config()->remote_api.
            "?RegistrationNumber=" . $regNumber ."&username=" . Env::Config()->user_api);
        }
        $xml                = simplexml_load_string($xmlData);
        $xml                = (array) $xml;
        $xml['vehicleJson'] = json_decode($xml['vehicleJson']);
        $xml['reg'] = $regNumber;
        $xml                = (object) $xml;
        self::$message       = $xml;
        return self::$message;
    }
    
}

?>