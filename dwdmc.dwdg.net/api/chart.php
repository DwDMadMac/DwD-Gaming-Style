<?php

include '../library/dwd/Server.php';

function cmp($a, $b) {
    return $a['logTime'] - $b['logTime'];
}

$limit = (isset($_GET['l']) && $_GET['l'] < 10000) ? $_GET['l'] : 500;

for ($x = 1; $x < 18; $x++) {
    $Server = new Server($x);
    $serverList[$x] = $Server;


    $tmp = $Server->getAllLogData($limit);
    usort($tmp, "cmp");

    $data[$x] = $tmp;
}

//var_dump($data);

$servers = isset($_GET['server']) ? $_GET['server'] : 'all';
$selectedData = array();


if($servers == "all")
    $selectedData = $data;
else {
    $servers = explode(",",$servers);
    foreach($servers as $sid) {
        $selectedData[$sid] = $data[$sid];
    }
}

switch ($_GET['param']) {

    case 'internalPing':
        $newArr = array();
        $newArr['data'] = array();
        
        foreach($selectedData as $server => $serverdata) {
        
            foreach($serverdata as $dat) {
                $newArr['data'][$serverList[$server]->serverName][] = array(
                  (int)round($dat['logTime']/60)*60000,(int)$dat['cacheInternalPing'] 
                );
            }
        
        }

    break;
    
    case 'playersOnline':
    default:
        $newArr = array();
        $newArr['data'] = array();
        
        foreach($selectedData as $server => $serverdata) {
        
            foreach($serverdata as $dat) {
                $newArr['data'][$serverList[$server]->serverName][] = array(
                  (int)round($dat['logTime']/60)*60000,(int)(count(unserialize($dat['cachePlayers'])))
                );
            }
        
        }

    break;
}

exit(json_encode($newArr));
?>
