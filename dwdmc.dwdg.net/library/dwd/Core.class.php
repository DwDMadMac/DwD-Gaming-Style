<?php

include 'Server.php';

define("SERVER_BASE_PATH", "/home/MC/Servers/");

function cmp($a, $b) {
    return $a['logTime'] - $b['logTime'];
}

class core {

    function home() {
        global $Tpl;
    }

    function login() {
        global $Tpl, $Session;


        if (!empty($_POST)) {
            if (isset($_POST['inputUsername'])) {
                if (isset($_POST['inputPassword'])) {
                    $inputUsername = stripslashes(mysql_real_escape_string($_POST['inputUsername']));
                    $inputPassword = stripslashes(mysql_real_escape_string($_POST['inputPassword']));

                    $pass = hash("sha512", $inputPassword);

                    $sql = "SELECT `user_id`,`username`,`email`,`permissions`,`superAdmin`,`group_id` FROM `users` WHERE LOWER(`username`)='" . strtolower($inputUsername) . "' AND `password`='$pass'";

                    $result = $Session->db->query($sql);

                    if ($result->num_rows > 0) {
                        // Log in user
                        $data = $result->fetch_assoc();

                        $_SESSION['user_id'] = $data['user_id'];
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['email'] = $data['email'];
                        $_SESSION['permissions'] = $data['permissions'];
                        $_SESSION['superAdmin'] = $data['superAdmin'];
                        $_SESSION['group_id'] = $data['group_id'];
                        $_SESSION['emailhash'] = md5(strtolower(trim($_SESSION['email'])));

                        // get group info
                        $sql = "SELECT `group_id`,`group_name`,`group_permissions`,`superGroup` FROM `group` WHERE `group_id`='" . $data['group_id'] . "'";

                        $result = $Session->db->query($sql);
                        if ($result->num_rows > 0) {
                            $data = $result->fetch_assoc();

                            $_SESSION['group_name'] = $data['group_name'];
                            $_SESSION['group_permissions'] = $data['group_permissions'];
                            $_SESSION['superGroup'] = $data['superGroup'];
                        }

                        header("Location: /home");
                    } else {
                        //$Tpl->assign('noticeMsg', $pass);
                        $Tpl->assign('noticeMsg', "Username or Password is incorrect!");
                        $Tpl->assign('username', $inputUsername);
                    }
                } else {
                    $Tpl->assign('noticeMsg', "You must input a password!");
                }
            } else {
                $Tpl->assign('noticeMsg', "You must input a username!");
            }
        }
    }

    function logout() {
        global $Session;

        session_destroy();
        header("Location: /login");
    }

    function servers() {
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

    function logs() {
        global $Tpl, $Session;


        $ex = explode('?', $_SERVER["REQUEST_URI"]);
        $keyArr = explode("/", $ex[0]);
        array_shift($keyArr);


        if (isset($keyArr[1])) {
            // are they reading a log?
            switch (strtolower($keyArr[1])) {
                case 'read':

                    if (isset($keyArr[2])) {
                        $MySQLi = new mysqli('localhost', 'minecraft_monito', 'x7NH85wYyrzQnLWw', 'minecraft_monitor');
                        $query = $MySQLi->query("SELECT `internalFolder`,`name`,`id` FROM `servers` WHERE `id`='" . $MySQLi->real_escape_string($keyArr[2]) . "'");

                        if ($query->num_rows > 0) {
                            $result = $query->fetch_assoc();
                            $serverID = $result['id'];
                            $serverPath = stripslashes($result['internalFolder']);
                            if (file_exists(SERVER_BASE_PATH . $serverPath)) {
                                // Server exists, what about the log itself?
                                if (!isset($keyArr[3]))
                                    $logPath = "latest";
                                else
                                    $logPath = $keyArr[3];

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
                                    $Tpl->draw("logs_reader");
                                } else {
                                    continue;
                                }
                            } else {
                                continue;
                            }
                        } else {
                            continue;
                        }
                    } else {
                        continue;
                    }
                    exit();
                    break;

                case 'list':
                    if (isset($keyArr[2])) {
                        $MySQLi = new mysqli('localhost', 'minecraft_monito', 'x7NH85wYyrzQnLWw', 'minecraft_monitor');
                        $query = $MySQLi->query("SELECT `internalFolder`,`name`,`id` FROM `servers` WHERE `id`='" . $MySQLi->real_escape_string($keyArr[2]) . "'");

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
                                $Tpl->draw("logs_list");
                            }
                        } else {
                            continue;
                        }
                    } else {
                        continue;
                    }
                    exit();
                    break;

                default:

                    continue;
                    break;
            }
        }
        $MySQLi = new mysqli('localhost', 'minecraft_monito', 'x7NH85wYyrzQnLWw', 'minecraft_monitor');
        $query = $MySQLi->query("SELECT `internalFolder`,`name`,`id` FROM `servers` ORDER BY `id` ASC");

        $servers = array();

        while ($row = $query->fetch_assoc()) {
            if ($row['internalFolder'] != "")
                $servers[] = $row;
        }

        $Tpl->assign('servers', $servers);
    }

    function users() {
        global $Tpl;

        $serverSQL = new mysqli('localhost', 'minecraft_monito', 'x7NH85wYyrzQnLWw', 'minecraft_monitor');
        $query = $serverSQL->query("SELECT `id`,`name` FROM `servers` ORDER BY `id` ASC");

        $servers = array();

        while ($row = $query->fetch_assoc()) {
            $servers[$row['id']] = $row['name'];
        }

        $banSQL = new mysqli('localhost', 'MC_Bans', 'Vrppha5QRXZPJWUq', 'MC_Bans');

        $data = array();

        $query = $banSQL->query("SELECT * FROM `Global_ban_all` ORDER BY `ban_time` DESC LIMIT 10");
        if ($query) {
            while ($row = $query->fetch_assoc()) {
                $data[] = array(
                    'type' => 'Ban',
                    'id' => $row['ban_id'],
                    'staff' => $row['banned_by'],
                    'player' => $row['banned'],
                    'reason' => $row['ban_reason'],
                    'time' => $row['ban_time'],
                    'server' => 'Global',
                );
            }
        }

        // Get Data for each server
        foreach ($servers as $server) {

            // Bans
            $query = $banSQL->query("SELECT * FROM `" . ucwords($server) . "_bans` ORDER BY `ban_time` DESC LIMIT 10");
            if ($query) {
                while ($row = $query->fetch_assoc()) {
                    if (!hasGlobal($data, "ban", $row['banned'], $row['ban_time'])) {
                        $data[] = array(
                            'type' => 'Ban',
                            'id' => $row['ban_id'],
                            'staff' => $row['banned_by'],
                            'player' => $row['banned'],
                            'reason' => $row['ban_reason'],
                            'time' => $row['ban_time'],
                            'server' => $row['server'],
                        );
                    }
                }
            }
            $query = $banSQL->query("SELECT * FROM `" . ucwords($server) . "_ban_records` ORDER BY `ban_time` DESC LIMIT 10");
            if ($query) {
                while ($row = $query->fetch_assoc()) {
                    $data[] = array(
                        'type' => 'Ban',
                        'id' => $row['ban_record_id'],
                        'staff' => $row['banned_by'],
                        'player' => $row['banned'],
                        'reason' => $row['ban_reason'],
                        'time' => $row['ban_time'],
                        'server' => $row['server'],
                    );

                    $data[] = array(
                        'type' => 'Unban',
                        'id' => $row['ban_record_id'],
                        'staff' => $row['unbanned_by'],
                        'player' => $row['banned'],
                        'reason' => $row['ban_reason'],
                        'time' => $row['unbanned_time'],
                        'server' => $row['server'],
                    );
                }
            }

            // IP Bans
            $query = $banSQL->query("SELECT * FROM `" . ucwords($server) . "_ip_bans` ORDER BY `ban_time` DESC LIMIT 10");
            if ($query) {
                while ($row = $query->fetch_assoc()) {
                    $data[] = array(
                        'type' => 'IP Ban',
                        'id' => $row['ban_id'],
                        'staff' => $row['banned_by'],
                        'player' => $row['banned'],
                        'reason' => $row['ban_reason'],
                        'time' => $row['ban_time'],
                        'server' => $row['server'],
                    );
                }
            }
            $query = $banSQL->query("SELECT * FROM `" . ucwords($server) . "_ip_records` ORDER BY `ban_time` DESC LIMIT 10");
            if ($query) {
                while ($row = $query->fetch_assoc()) {
                    $data[] = array(
                        'type' => 'IP Ban',
                        'id' => $row['ban_record_id'],
                        'staff' => $row['banned_by'],
                        'player' => $row['banned'],
                        'reason' => $row['ban_reason'],
                        'time' => $row['ban_time'],
                        'server' => $row['server'],
                    );

                    $data[] = array(
                        'type' => 'Un IP Ban',
                        'id' => $row['ban_record_id'],
                        'staff' => $row['unbanned_by'],
                        'player' => $row['banned'],
                        'reason' => $row['ban_reason'],
                        'time' => $row['unbanned_time'],
                        'server' => $row['server'],
                    );
                }
            }

            // Kicks
            $query = $banSQL->query("SELECT * FROM `" . ucwords($server) . "_kicks` ORDER BY `kick_time` DESC LIMIT 10");
            if ($query) {
                while ($row = $query->fetch_assoc()) {
                    $data[] = array(
                        'type' => 'Kick',
                        'id' => $row['kick_id'],
                        'staff' => $row['kicked_by'],
                        'player' => $row['kicked'],
                        'reason' => $row['kick_reason'],
                        'time' => $row['kick_time'],
                        'server' => $row['server'],
                    );
                }
            }

            // Mute
            $query = $banSQL->query("SELECT * FROM `" . ucwords($server) . "_mutes` ORDER BY `mute_time` DESC LIMIT 10");
            if ($query) {
                while ($row = $query->fetch_assoc()) {
                    $data[] = array(
                        'type' => 'Mute',
                        'id' => $row['mute_id'],
                        'staff' => $row['muted_by'],
                        'player' => $row['muted'],
                        'reason' => $row['mute_reason'],
                        'time' => $row['mute_time'],
                        'server' => $row['server'],
                    );
                }
            }

            $query = $banSQL->query("SELECT * FROM `" . ucwords($server) . "_mutes_records` ORDER BY `mute_time` DESC LIMIT 10");
            if ($query) {
                while ($row = $query->fetch_assoc()) {
                    $data[] = array(
                        'type' => 'Mute',
                        'id' => $row['mute_id'],
                        'staff' => $row['muted_by'],
                        'player' => $row['muted'],
                        'reason' => $row['mute_reason'],
                        'time' => $row['mute_time'],
                        'server' => $row['server'],
                    );

                    $data[] = array(
                        'type' => 'Un Mute',
                        'id' => $row['mute_id'],
                        'staff' => $row['unmuted_by'],
                        'player' => $row['muted'],
                        'reason' => $row['mute_reason'],
                        'time' => $row['unmuted_time'],
                        'server' => $row['server'],
                    );
                }
            }
            // Warning
            $query = $banSQL->query("SELECT * FROM `" . ucwords($server) . "_warnings` ORDER BY `warn_time` DESC LIMIT 10");

            if ($query) {
                while ($row = $query->fetch_assoc()) {
                    $data[] = array(
                        'type' => 'Warning',
                        'id' => $row['warn_id'],
                        'staff' => $row['warned_by'],
                        'player' => $row['warned'],
                        'reason' => $row['warn_reason'],
                        'time' => $row['warn_time'],
                        'server' => $row['server'],
                    );
                }
            }
        }

        // Sort data by the time

        MDASort($data, "time");
        $data = array_reverse($data);

        $Tpl->assign('latestData', $data);
    }

    function acpusers() {
        global $Tpl, $Session;
        $userList = array();
        $groupList = array();

        $query = $Session->db->query("SELECT u.`user_id`,u.`username`,u.`email`,u.`superAdmin`, g.`group_id`,g.`group_name`,g.`group_permissions` FROM `users` u LEFT JOIN `groups` g ON u.`group_id`=g.`group_id` ORDER BY u.`user_id` ASC");

        while ($row = $query->fetch_assoc()) {
            $userList[] = $row;
        }

        $Tpl->assign('userList', $userList);
    }

    function acpgroups() {
        global $Tpl, $Session;
        $userList = array();

        $query = $Session->db->query("SELECT `group_id`,`group_name`,`group_permissions`,`superGroup` FROM `groups` ORDER BY `group_id` ASC");

        while ($row = $query->fetch_assoc()) {
            $groupList[] = $row;
        }

        $Tpl->assign('groupList', $groupList);
    }

}

?>
