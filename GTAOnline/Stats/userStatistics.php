<?php

class GTAOnline_Stats_userStatistics {
    public static function render(XenForo_ControllerPublic_Abstract $controller, XenForo_ControllerResponse_Abstract &$response) {
        $json = file_get_contents('https://socialclub.rockstargames.com/Friends/GetAccountDetails?nickname='.rawurlencode($value));
        $asObjects = json_decode($string);
    }
}