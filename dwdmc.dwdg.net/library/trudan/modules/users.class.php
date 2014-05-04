<?php

class users {

    function home() {
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

        $Tpl->assign('latestData', array_slice($data,0,10));
    }
}

?>
