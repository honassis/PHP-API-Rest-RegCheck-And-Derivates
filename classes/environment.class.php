<?php
class Env {
    
    public static $instance;
    public static $env;
    public static function Config(){
        if (!isset(self::$env)) {
            $parsed = parse_ini_file('.env');
            foreach ($parsed as $key => $value) {
               self::$env[$key]= $value;
            }    
        }
        
        return (object)self::$env;
    }
    

    
}
?> 