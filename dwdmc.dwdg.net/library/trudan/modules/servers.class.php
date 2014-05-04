<?php

class servers {

    private $args;

    function __construct() {
        $ex = explode('?', $_SERVER["REQUEST_URI"]);
        $keyArr = explode("/", $ex[0]);
        array_shift($keyArr);
        array_shift($keyArr);
        array_shift($keyArr);
        $this->args = $keyArr;
    }

    function home() {
        global $Tpl;
        $serverList = array();

        $MySQLi = new mysqli('localhost', 'minecraft_monito', 'x7NH85wYyrzQnLWw', 'minecraft_monitor');
        $query = $MySQLi->query("SELECT * FROM `servers` ORDER BY `id` ASC");

        $servers = array();
        $data = array();

        while ($row = $query->fetch_assoc()) {
            if ($row['internalFolder'] !== '') {
                $Server = new Server($row['id']);
                $serverList[$row['id']] = $row;

                $tmp = $Server->getAllLogData();
                usort($tmp, "cmp");

                $data[$row['id']] = $tmp;
            }
        }

        $Tpl->assign("servers", $data);
        $Tpl->assign("serverList", $serverList);
    }

    function manage() {
        global $Tpl;
        
        if (isset($this->args[0])) {            
            // Plugins
            $Server = new Server($this->args[0]);
                        
            $Tpl->assign('serverPlugins',$Server->callAPI('plugins'));
            $Tpl->assign('serverInfo',$Server->callAPI("server"));
            $Tpl->assign('serverPlayers',$Server->callAPI("players.online.names"));
                        
            $Tpl->assign('server',$Server->getCacheData());
        }
    }

}

?>
