<?php

// per server
$serverList = array();

$MySQLi = new mysqli('localhost', 'minecraft_monito', 'x7NH85wYyrzQnLWw', 'minecraft_monitor');
$query = $MySQLi->query("SELECT `id`,`name`,`internalUser` FROM `servers` ORDER BY `id` ASC");

$servers = array();
$usage = array();

while ($row = $query->fetch_assoc()) {
    if($row['internalUser'] != '') {
        if(isset($_GET['series'])) {
            $usage[] = array(
                'name'  => $row['name'],
                'data'  => array(),
            );
        }
        else {
            $usage[$row['id']-1] = (int) exec("top -b -n 1 -u " . $row['internalUser'] . " | awk 'NR>7 { sum += $10; } END { print sum; }'");
        }
    }
}

echo json_encode($usage);
?>