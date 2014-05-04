<?php

require_once("bukkitJSONAPI.php");
require_once("bungeeJSONAPI.php");
require_once("MinecraftStatusPinger.php");

class Server {

    // Helper Variables
    private $MySQLi = null;
    private $pluginAPI = null;
    //
    // Internal data
    public $serverId = 0;
    public $serverVersion = "1.7.2";
    public $serverName = "";
    public $serverType = "spigot";
    //
    // Plugin API data (localhost)
    private $jsonHost = "127.0.0.1";
    private $jsonPort = 25515;
    private $jsonUser = "WebAPI";
    private $jsonPass = "";
    //
    // Internal Connection data (localhost)
    private $internalHost = "127.0.0.1";
    private $internalPort = 25565;
    private $internalSocket;
    //
    // External Connection data (global-ip)
    private $externalHost = "127.0.0.1";
    private $externalPort = 25565;
    private $externalSocket;
    //
    // Internal Information (info produced from local connection)
    public $serverStatus = null;
    public $serverMotd = "A Minecraft Server";
    public $serverTPS = null;
    public $serverRAMUsed = null;
    public $serverRAMMax = null;
    public $serverUptime = null;
    public $serverIcon = null;
    public $lastConnection = null;
    public $lastDowntime = null;
    public $lastRecoverTime = 0;
    public $internalPing = -1;
    public $playersOnline = null;
    public $playersMax = null;
    public $players = array();
    //
    // External Information (info produced from outside-connection)
    public $externalPing = -1;

    public function __construct($serverId) {
        $this->serverId = $serverId;
        $this->connectMySQL();
        $this->loadCacheData();

        $this->loadServerData();
    }

    public function __destruct() {
        $this->disconnectMySQL();
    }

    public function refreshStatistics() {
        $prevStatus = $this->serverStatus;

        // Do Actual MC related stuff
        $this->collectInternalData();
        $this->collectPluginData();

        if ($prevStatus == 0 && $this->serverStatus == 1) {
            $this->lastRecoverTime = time();
        }

        // Is the server offline?
        if ($this->serverStatus == 0) {
            $this->lastDowntime = time();
            $this->serverUptime = 0;
        } else {
            $this->serverUptime = time() - $this->lastRecoverTime;
        }
    }

    public function collectInternalData() {
        try {
            $status = new MinecraftPing($this->internalHost,$this->internalPort);
            $result = $status->Query();
        } catch(Exception $e) {
            $result = false;
        }
        
        var_dump($result);
        
        if ($result !== false) {
            $this->serverStatus = 1;
            $this->internalPing = $result['ping'];
            echo $this->internalPing;
            $this->playersOnline = $result['players'];
            $this->playersMax = $result['maxplayers'];
            $this->serverMotd = preg_replace("/§./","",$result['motd']);
        }
        else {
            $this->serverStatus = 0;
        }
    }

    public function collectPluginData() {
        if (strtolower($this->serverType) == 'spigot') {
            // Communicate to the plugin
            $this->pluginAPI = new JSONAPI($this->jsonHost, $this->jsonPort, $this->jsonUser, $this->jsonPass);
            
            // Get the TPS
            $this->serverTPS = $this->pluginAPI->call("server.performance.tick_health")[0]['success']['clockRate'];
            // Get the RAM usage/max
            $this->serverRAMUsed = $this->pluginAPI->call("server.performance.memory.used")[0]['success'];
            $this->serverRAMMax = $this->pluginAPI->call("server.performance.memory.total")[0]['success'];

            // Get a list of players
            $this->players = $this->pluginAPI->call("players.online.names")[0]['success'];
            $this->playersOnline = $this->pluginAPI->call("players.online.count")[0]['success'];
            $this->playersMax = $this->pluginAPI->call("players.online.limit")[0]['success'];

            // Server info
            $this->serverMotd = preg_replace("/§./","",$this->pluginAPI->call("server.settings.motd")[0]['success']);
        }
        elseif(strtolower($this->serverType == 'bungeecord')) {
            $this->serverStatus = 1;
            $this->pluginAPI = new BungeeJSON($this->jsonHost, $this->jsonPort, $this->jsonPass);
            $this->players = $this->pluginAPI->call("bungeecord/players_online");
            
            $playerCounts = $this->pluginAPI->call("bungeecord/player_count");
            $this->playersMax = $playerCounts['max_players'];
            $this->playersOnline = $playerCounts['current_players'];
        }
    }
    
    public function callAPI($apiPath) {
        if (strtolower($this->serverType) == 'spigot') {
            $this->pluginAPI = new JSONAPI($this->jsonHost, $this->jsonPort, $this->jsonUser, $this->jsonPass);
            
            return $this->pluginAPI->call($apiPath)[0]['success'];
        }
        
    }

    public function isOnline() {
        if ($this->serverStatus > 0)
            return true;
        return false;
    }

    public function saveDataToCache() {
        if ($this->MySQLi->connect_errno > 0)
            return;

        echo $sqlQuery = "UPDATE `servers` SET 
            `lastConnection` = '" . $this->MySQLi->escape_string($this->lastConnection) . "',
            `cacheVersion` = '" . $this->MySQLi->escape_string($this->serverVersion) . "',
            `cacheStatus` = '" . $this->MySQLi->escape_string($this->serverStatus) . "',
            `cacheMotd` = '" . $this->MySQLi->escape_string($this->serverMotd) . "',
            `cacheTPS` = '" . $this->MySQLi->escape_string($this->serverTPS) . "',
            `cacheUptime` = '" . $this->MySQLi->escape_string($this->serverUptime) . "',
            `cacheRecover` = '" . $this->MySQLi->escape_string($this->lastRecoverTime) . "',
            `cacheIcon` = '" . $this->MySQLi->escape_string($this->serverIcon) . "',
            `cacheInternalPing` = '" . $this->MySQLi->escape_string($this->internalPing) . "',
            `cacheExternalPing` = '" . $this->MySQLi->escape_string($this->externalPing) . "',
            `cachePlayersOnline` = '" . $this->MySQLi->escape_string($this->playersOnline) . "',
            `cachePlayersMax` = '" . $this->MySQLi->escape_string($this->playersMax) . "',
            `cachePlayers` = '" . $this->MySQLi->escape_string(serialize($this->players)) . "',
            `cacheServerRAMUsed` = '" . $this->MySQLi->escape_string($this->serverRAMUsed) . "',
            `cacheServerRAMMax` = '" . $this->MySQLi->escape_string($this->serverRAMMax) . "'
            WHERE `id`= '" . $this->MySQLi->escape_string($this->serverId) . "'";

        $this->MySQLi->query($sqlQuery);
    }

    public function saveDataToLog() {
        if ($this->MySQLi->connect_errno > 0)
            return;

        $sqlQuery = "INSERT INTO `serverLog` SET 
            `logTime` = '" . $this->MySQLi->escape_string(time()) . "',
            `server_id` = '" . $this->MySQLi->escape_string($this->serverId) . "',
            `lastConnection` = '" . $this->MySQLi->escape_string($this->lastConnection) . "',
            `cacheVersion` = '" . $this->MySQLi->escape_string($this->serverVersion) . "',
            `cacheStatus` = '" . $this->MySQLi->escape_string($this->serverStatus) . "',
            `cacheMotd` = '" . $this->MySQLi->escape_string($this->serverMotd) . "',
            `cacheTPS` = '" . $this->MySQLi->escape_string($this->serverTPS) . "',
            `cacheUptime` = '" . $this->MySQLi->escape_string($this->serverUptime) . "',
            `cacheRecover` = '" . $this->MySQLi->escape_string($this->lastRecoverTime) . "',
            `cacheIcon` = '" . $this->MySQLi->escape_string($this->serverIcon) . "',
            `cacheInternalPing` = '" . $this->MySQLi->escape_string($this->internalPing) . "',
            `cacheExternalPing` = '" . $this->MySQLi->escape_string($this->externalPing) . "',
            `cachePlayersOnline` = '" . $this->MySQLi->escape_string($this->playersOnline) . "',
            `cachePlayersMax` = '" . $this->MySQLi->escape_string($this->playersMax) . "',
            `cachePlayers` = '" . $this->MySQLi->escape_string(serialize($this->players)) . "',
            `cacheServerRAMUsed` = '" . $this->MySQLi->escape_string($this->serverRAMUsed) . "',
            `cacheServerRAMMax` = '" . $this->MySQLi->escape_string($this->serverRAMMax) . "'";

        $this->MySQLi->query($sqlQuery);
    }

    public function getCacheData() {
        $data = array(
            'lastConnection' => $this->lastConnection,
            'serverName' => $this->serverName,
            'externalHost' => $this->externalHost,
            'serverType' => $this->serverType,
            'serverVersion' => $this->serverVersion,
            'serverStatus' => $this->serverStatus,
            'serverMotd' => $this->serverMotd,
            'serverTPS' => $this->serverTPS,
            'serverUptime' => $this->serverUptime,
            'serverRecover' => $this->lastRecoverTime,
            'serverIcon' => $this->serverIcon,
            'internalPing' => $this->internalPing,
            'externalPing' => $this->externalPing,
            'playersOnline' => $this->playersOnline,
            'playersMax' => $this->playersMax,
            'players' => $this->players,
            'serverRAMUsed' => $this->serverRAMUsed,
            'serverRAMMax' => $this->serverRAMMax
        );
        return $data;
    }

    public function getAllLogData($limit = 100) {
        if ($this->MySQLi->connect_errno > 0)
            return;

        ini_set('memory_limit', '256M');

        $sqlQuery = "SELECT * FROM `serverLog` WHERE `server_id` = '" . $this->serverId . "' ORDER BY `logID` DESC LIMIT " . $limit;

        if (!$result = $this->MySQLi->query($sqlQuery))
            return;

        $return = array();

        while ($row = $result->fetch_assoc()) {
            $return[] = $row;
        }

        $result->free();

        return $return;
    }

    private function loadCacheData() {
        if ($this->MySQLi->connect_errno > 0)
            return;

        $sqlQuery = "SELECT * FROM `servers` WHERE `id`='" . $this->serverId . "' LIMIT 1";

        if (!$result = $this->MySQLi->query($sqlQuery))
            return;

        $row = $result->fetch_assoc();

        $this->lastConnection = $row['lastConnection'];
        $this->serverName = $row['name'];
        $this->serverType = $row['type'];
        $this->serverVersion = $row['cacheVersion'];
        $this->lastRecoverTime = $row['cacheRecover'];
        $this->serverStatus = $row['cacheStatus'];
        $this->serverMotd = $row['cacheMotd'];
        $this->serverTPS = $row['cacheTPS'];
        $this->serverUptime = $row['cacheUptime'];
        $this->serverIcon = $row['cacheIcon'];
        $this->internalPing = $row['cacheInternalPing'];
        $this->externalPing = $row['cacheExternalPing'];
        $this->playersOnline = $row['cachePlayersOnline'];
        $this->playersMax = $row['cachePlayersMax'];
        $this->players = unserialize($row['cachePlayers']);
        $this->serverRAMUsed = $row['cacheServerRAMUsed'];
        $this->serverRAMMax = $row['cacheServerRAMMax'];

        $result->free();

        return $row;
    }

    // Load data from MySQL
    private function loadServerData() {

        if ($this->MySQLi->connect_errno > 0)
            return;

        $sqlQuery = "SELECT `name`,`type`,`internalHost`,`internalPort`,`externalHost`,`externalPort`,`jsonHost`,`jsonPort`,`jsonUser`,`jsonPass` FROM `servers` WHERE `id`='" . $this->serverId . "' LIMIT 1";

        if (!$result = $this->MySQLi->query($sqlQuery))
            return;

        $row = $result->fetch_assoc();

        $this->serverName = $row['name'];
        $this->serverType = $row['type'];
        $this->internalHost = $row['internalHost'];
        $this->internalPort = $row['internalPort'];

        $this->externalHost = $row['externalHost'];
        $this->externalPort = $row['externalPort'];


        $this->jsonHost = $row['jsonHost'];
        $this->jsonPort = $row['jsonPort'];
        $this->jsonUser = $row['jsonUser'];
        $this->jsonPass = $row['jsonPass'];

        $result->free();
    }

    private function connectMySQL() {
        $this->MySQLi = new mysqli('localhost', 'minecraft_monito', 'x7NH85wYyrzQnLWw', 'minecraft_monitor');
        //$this->MySQLi->connect();
        //$this->MySQLi->select_db('minecraft_monitor');

        if ($this->MySQLi->connect_errno > 0) {
            return false;
        }
        return true;
    }

    private function disconnectMySQL() {
        $this->MySQLi->close();
    }

    private function readPacketLength($socket) {
        $a = 0;
        $b = 0;
        while (true) {
            $c = socket_read($socket, 1);
            if (!$c) {
                return 0;
            }
            $c = Ord($c);
            $a |= ($c & 0x7F) << $b++ * 7;
            if ($b > 5) {
                return false;
            }
            if (($c & 0x80) != 128) {
                break;
            }
        }
        return $a;
    }

    // Socket Utility Functions

    private function internalSocketConnect() {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_connect($socket, $this->internalHost, (int) $this->internalPort);
        $this->internalSocket = $socket;
        return $socket;
    }

    private function internalSocketDisconnect() {
        if ($this->internalSocket != null)
            socket_close($this->internalSocket);
    }

    private function externalSocketConnect() {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_connect($socket, $this->externalHost, (int) $this->externalPort);
        $this->externalSocket = $socket;
        return $socket;
    }

    private function externalSocketDisconnect() {
        if ($this->externalSocket != null)
            socket_close($this->externalSocket);
    }

}

?>