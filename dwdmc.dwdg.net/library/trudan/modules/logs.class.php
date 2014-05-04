<?php

class logs {

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
        global $Tpl, $Session;

        $MySQLi = new mysqli('localhost', 'minecraft_monito', 'x7NH85wYyrzQnLWw', 'minecraft_monitor');
        $query = $MySQLi->query("SELECT `internalFolder`,`name`,`id` FROM `servers` ORDER BY `id` ASC");

        $servers = array();

        while ($row = $query->fetch_assoc()) {
            if ($row['internalFolder'] != "")
                $servers[] = $row;
        }

        $Tpl->assign('servers', $servers);
    }

    function items() {
        global $Tpl;
        if (isset($this->args[0])) {
            $MySQLi = new mysqli('localhost', 'minecraft_monito', 'x7NH85wYyrzQnLWw', 'minecraft_monitor');
            $query = $MySQLi->query("SELECT `internalFolder`,`name`,`id` FROM `servers` WHERE `id`='" . $MySQLi->real_escape_string($this->args[0]) . "'");

            if ($query->num_rows > 0) {
                $result = $query->fetch_assoc();

                $serverPath = stripslashes($result['internalFolder']);
                $serverID = $result['id'];

                if (file_exists(SERVER_BASE_PATH . $serverPath . "/logs/")) {
                    $logFiles = array();

                    $dh = opendir(SERVER_BASE_PATH . $serverPath . "/logs/");

                    while ($file = readdir($dh)) {
                        if ($file !== '.' && $file !== '..') {
                            $logFiles[] = $file;
                        }
                    }

                    closedir($dh);

                    natsort($logFiles);
                    $logFiles = array_reverse($logFiles);

                    $Tpl->assign('logFiles', $logFiles);
                    $Tpl->assign('curServer', $serverPath);
                    $Tpl->assign('curLog', $logPath);
                    $Tpl->assign('curID', $serverID);
                }
            }
        }
    }

    function read() {
        global $Tpl;
        if (isset($this->args[0])) {
            $MySQLi = new mysqli('localhost', 'minecraft_monito', 'x7NH85wYyrzQnLWw', 'minecraft_monitor');
            $query = $MySQLi->query("SELECT `internalFolder`,`name`,`id` FROM `servers` WHERE `id`='" . $MySQLi->real_escape_string($this->args[0]) . "'");

            if ($query->num_rows > 0) {
                $result = $query->fetch_assoc();
                $serverID = $result['id'];
                $serverPath = stripslashes($result['internalFolder']);
                if (file_exists(SERVER_BASE_PATH . $serverPath)) {
                    // Server exists, what about the log itself?
                    if (!isset($this->args[1]))
                        $logPath = "latest";
                    else
                        $logPath = $this->args[1];

                    $logPath = stripslashes($logPath);

                    if (file_exists(SERVER_BASE_PATH . $serverPath . "/logs/" . $logPath)) {
                        if (stripos($logPath, ".gz"))#
                            $fileContents = gzdecode(file_get_contents(SERVER_BASE_PATH . $serverPath . "/logs/" . $logPath));
                        else
                            $fileContents = file_get_contents(SERVER_BASE_PATH . $serverPath . "/logs/" . $logPath);

                        $Tpl->assign('logData', parseMCLogData($fileContents));
                        $Tpl->assign('curServer', $serverPath);
                        $Tpl->assign('curLog', $logPath);
                        $Tpl->assign('curID', $serverID);
                    }
                }
            }
        }
    }

}

?>
