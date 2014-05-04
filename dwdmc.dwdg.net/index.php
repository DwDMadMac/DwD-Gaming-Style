<?php

$startTime = microtime();


require_once("library/dwd/Config.inc.php");
require_once("library/dwd/functions.inc.php");
require_once("library/dwd/Session.inc.php");
require_once("library/dwd/Server.php");

define("SERVER_BASE_PATH", "/home/MC/Servers/");

$acpDB = new mysqli('localhost', 'dwdg_acp', 'UEBrGdHEAXPqxYvM', 'dwdg_acp');

require_once("library/raintpl/rain.tpl.class.php");

$Tpl = new RainTPL();

if ($_SESSION['user_id'] == 0 && $_SERVER['REQUEST_URI'] != '/login') {
    header('Location: /login');
    exit();
}
if (sizeof($_SERVER['REQUEST_URI']) > 0) {
    $ex = explode('?', $_SERVER["REQUEST_URI"]);
    $keyArr = explode("/", $ex[0]);
    array_shift($keyArr);

    if (count($keyArr) > 1) {        
        $ModuleName = (isset($keyArr[0])) ? $keyArr[0] : "core";
        if (includeModule($ModuleName)) {
            $Module = (class_exists($ModuleName)) ? new $ModuleName() : new core();
            $key = (isset($keyArr[1]) && $keyArr[1] != "") ? $keyArr[1] : 'home';
        } else {
            $Tpl->draw("tpl/404");
            exit();
        }
    } else {
        $ModuleName = "core";

        if (includeModule($ModuleName)) {
            $Module = new core();
            $key = (isset($keyArr[0]) && $keyArr[0] != "") ? $keyArr[0] : 'home';

            if (!method_exists($Module, $key)) {
                if (includeModule($key)) {
                    if (method_exists($key, "home")) {
                        $Module = new $key();
                        $ModuleName = $key;
                        $key = "home";
                    }
                }
            }
        } else {
            $Tpl->draw("tpl/404");
            exit();
        }
    }
} else {
    $key = "home";
    $Module = new core();
    $ModuleName = "core";
}
$Tpl->assign('pageMod', strtolower($ModuleName));
$Tpl->assign('pageKey', strtolower($key));

if ($Session->hasPermission("page.access." . strtolower($ModuleName) . "." . strtolower($key))) {
    if (method_exists($Module, $key)) {
        $Module->$key();
    }
    if (file_exists("theme/tpl/" . strtolower($ModuleName) . "/" . $key . ".html")) {
        $Tpl->draw("tpl/" . strtolower($ModuleName) . "/" . $key);
    } else {
        $Tpl->draw("tpl/404");
    }
} else {
    $Tpl->draw("tpl/no_permission");
}
?>