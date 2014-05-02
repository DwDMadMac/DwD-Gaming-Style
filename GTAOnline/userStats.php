<?php

class GTAOnline_userStats {
    
    public static function validate($field, &$value, &$error) {
        $json = file_get_contents('https://socialclub.rockstargames.com/Friends/GetAccountDetails?nickname='.rawurlencode($value));
        $asObjects = json_decode($string);
        
        $asAssociativeArray = json_decode($string, TRUE);
        
        foreach ($asObjects as $obj) {
            echo $obj->Nickname;
        }
        
        foreach ($asAssociativeArray as $arr) {
            echo $arr['Nickname'];
        }
        
        
        if(strpos($json, 'true') !== false) {
            $arr = json_decode($json, true);
            var_dump($arr['']);
        }
        else {
            $error = "The GTA account '".$value."' is not Authentic!";
            return false;
        }
    }
}

