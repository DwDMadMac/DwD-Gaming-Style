<?php

define('FORUM_URL', "http://localhost:81/");

function callXenApi($function, $args) {
    $argsString = "";

    foreach ($args as $key => $val) {
        $argsString .= "&" . $key . "=" . $val;
    }
    $argsString .="&hash=aD4GorDwJBu9yKT9QZ82";

    $result = file_get_contents(FORUM_URL . "api.php?action=" . $function . $argsString);
    return json_decode($result, true);
}

function getUserImage($userId, $size = "s") {
    $imageUrl = callXenApi("getAvatar", array(
        'size' => $size,
        'value' => $userId
    ));
    return str_replace(FORUM_URL, "", $imageUrl['avatar']);
}

function getPostContents($postId, $returnScope = null, $limit = -1) {
    global $parser;
    $data = callXenApi("getPost", array(
        'value' => $postId
    ));

    if ($returnScope != null) {
        if ($returnScope == "message") {
            if ($limit > 0) {
                if (strlen($data['message']) > $limit) {
                    $data['message'] = substr($data['message'], 0, $limit);
                    $data['message'] .= "...";
                }
            }
            return $parser->render($data['message']);
        }
        return $data[$returnScope];
    }
    return $data;
}

function time_elapsed_string($ptime, $type = true) {
    if ($type)
        $etime = time() - $ptime;
    else
        $etime = $ptime;

    if ($etime < 1) {
        return '0 seconds';
    }

    $a = array(12 * 30 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60 => 'month',
        24 * 60 * 60 => 'day',
        60 * 60 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            if ($r == 45 && $str = "year")
                return "Forever";
            return $r . ' ' . $str . ($r > 1 ? 's' : '');
        }
    }
}

function parseMCLogData($dataString, $html = true) {

    if ($html) {
        $dataString = str_replace("[m", "</span><span class='mcLog-reset'>", $dataString);
        $dataString = str_replace("[0;32;1m", "</span><span class='mcLog-col-a'>", $dataString);
        $dataString = str_replace("[0;36;1m", "</span><span class='mcLog-col-b'>", $dataString);
        $dataString = str_replace("[0;31;1m", "</span><span class='mcLog-col-c'>", $dataString);
        $dataString = str_replace("[0;35;1m", "</span><span class='mcLog-col-d'>", $dataString);
        $dataString = str_replace("[0;33;1m", "</span><span class='mcLog-col-e'>", $dataString);
        $dataString = str_replace("[0;37;1m", "</span><span class='mcLog-col-f'>", $dataString);
        $dataString = str_replace("[0;30;22m", "</span><span class='mcLog-col-0'>", $dataString);
        $dataString = str_replace("[0;34;22m", "</span><span class='mcLog-col-1'>", $dataString);
        $dataString = str_replace("[0;32;22m", "</span><span class='mcLog-col-2'>", $dataString);
        $dataString = str_replace("[0;36;22m", "</span><span class='mcLog-col-3'>", $dataString);
        $dataString = str_replace("[0;31;22m", "</span><span class='mcLog-col-4'>", $dataString);
        $dataString = str_replace("[0;35;22m", "</span><span class='mcLog-col-5'>", $dataString);
        $dataString = str_replace("[0;33;22m", "</span><span class='mcLog-col-6'>", $dataString);
        $dataString = str_replace("[0;37;22m", "</span><span class='mcLog-col-7'>", $dataString);
        $dataString = str_replace("[0;30;1m", "</span><span class='mcLog-col-8'>", $dataString);
        $dataString = str_replace("[0;34;1m", "</span><span class='mcLog-col-9'>", $dataString);
    } else {
        $dataString = str_replace("[m", "", $dataString);
        $dataString = str_replace("[0;32;1m", "", $dataString);
        $dataString = str_replace("[0;36;1m", "", $dataString);
        $dataString = str_replace("[0;31;1m", "", $dataString);
        $dataString = str_replace("[0;35;1m", "", $dataString);
        $dataString = str_replace("[0;33;1m", "", $dataString);
        $dataString = str_replace("[0;37;1m", "", $dataString);
        $dataString = str_replace("[0;30;22m", "", $dataString);
        $dataString = str_replace("[0;34;22m", "", $dataString);
        $dataString = str_replace("[0;32;22m", "", $dataString);
        $dataString = str_replace("[0;36;22m", "", $dataString);
        $dataString = str_replace("[0;31;22m", "", $dataString);
        $dataString = str_replace("[0;35;22m", "", $dataString);
        $dataString = str_replace("[0;33;22m", "", $dataString);
        $dataString = str_replace("[0;37;22m", "", $dataString);
        $dataString = str_replace("[0;30;1m", "", $dataString);
        $dataString = str_replace("[0;34;1m", "", $dataString);
    }

    return $dataString;
}

function MDASort(&$array, $key) {
    $sorter = array();
    $ret = array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii] = $va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii] = $array[$ii];
    }
    $array = $ret;
}

function YorN($no) {
    if($no == 1) {
        return "Yes";
    }
    else {
        return "No";
    }
}

function hasGlobal($data, $type, $bannedPlayer, $bannedTime) {
    foreach($data as $dat) {
        if($dat['server'] == 'Global') {
            if(strtolower($dat['type']) == strtolower($type)) {
                if(strtolower($dat['player']) == strtolower($bannedPlayer)) {
                    if($dat['time'] == $bannedTime) {
                        return true;
                    }
                }
            }
        }
    }
    return false;
}

function includeModule($moduleName) {
    
    $path = "library/trudan/modules/".  strtolower(str_replace("/", "", str_replace(".","",$moduleName))).".class.php";
    
    if(file_exists($path)) {
        require_once($path);
        return true;
    }
    return false;
}

function emailHash($email) {
    return md5(strtolower(trim($email)));
}

?>
