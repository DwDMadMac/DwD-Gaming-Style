<?php

/*
 * Type : Cron Job
 * Task : Collect Minecraft Server Stats and log them into database. Then generate graphs.
 */

if(!(php_sapi_name() === 'cli'))
    die("This can only be run via a CLI");

error_reporting(0);
ini_set('display_errors', 1);

require_once("Server.php");

$Cron = new Cron();

$Cron->collectStatistics();

include "/home/Web/dwdmc.dwdg.net/library/dwd/lastCronId.auto.php";

if ($cronId >= 6) {
    $cronId = 0;
} else {
    $cronId++;
}
file_put_contents("/home/Web/dwdmc.dwdg.net/library/dwd/lastCronId.auto.php", "<?php \$cronId = $cronId; \$lastCronRuntime = ".time()."; ?>");

class Cron {

    private $timeStamp;
    private $servers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17); // Define the ID's of the servers to keep a log of (Must manually put these in MySQL)
    private $serverList = array();

    public function __construct() {
        $this->timeStamp = time();

        // Load Servers
        $this->loadServers();
    }

    public function exportCacheToLog() {
        foreach ($this->serverList as $server) {

            // Is the $server really a Server object?
            if ($server instanceof Server) {

                // Get all the server stats in one go.
                $server->saveDataToLog();
                print("Saved cache data from " . $server->serverId . "<br />");
            } else {
                print("Server not really a server | " + var_dump($server));
            }
        }
    }

    public function collectStatistics() {
        foreach ($this->serverList as $server) {

            // Is the $server really a Server object?
            if ($server instanceof Server) {

                // Get all the server stats in one go.
                $server->refreshStatistics();
                $server->saveDataToCache();
                print("Saved cache data from " . $server->serverId . "<br />");
            } else {
                print("Server not really a server | " + var_dump($server));
            }
        }
    }

    public function generateGraphs() {
        
    }

    public function loadServers() {
        foreach ($this->servers as $serverId) {
            $Server = new Server($serverId);
            $this->serverList[] = $Server;
        }
    }

}

?>
