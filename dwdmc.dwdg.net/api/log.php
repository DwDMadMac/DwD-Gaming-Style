<?php

include '../library/dwd/functions.inc.php';
define("SERVER_BASE_PATH", "/home/MC/Servers/");
$serverPath = stripslashes($_GET['server']);

if (file_exists(SERVER_BASE_PATH . $serverPath)) {
    // Server exists, what about the log itself?
    if (!isset($_GET['log']))
        $logPath = "latest";
    else
        $logPath = $_GET['log'];

    $logPath = stripslashes($logPath);

    if (file_exists(SERVER_BASE_PATH . $serverPath . "/logs/" . $logPath)) {

        if (stripos($logPath, ".gz"))#
            $fileContents = gzdecode(file_get_contents(SERVER_BASE_PATH . $serverPath . "/logs/" . $logPath));
        else
            $fileContents = file_get_contents(SERVER_BASE_PATH . $serverPath . "/logs/" . $logPath);

        $logData = parseMCLogData($fileContents, (isset($_GET['dl']) ? false : true));

        if (isset($_GET['hideParams'])) {
            $params = explode(",", $_GET['hideParams']);


            foreach ($params as $param) {
                if (in_array("realMotd", $params))
                    $paramsToHide[] = "Looking up replacement '&";

                $paramsToHide[] = "[" . $param . "]";
            }

            foreach (explode("\n", $logData) as $line) {
                $output = true;
                foreach ($paramsToHide as $param) {
                    if (stripos($line, $param))
                        $output = false;
                }
                if ($output === true) {
                    $finalLogData .= $line . "
";
                }
            }

            if (isset($_GET['dl'])) {
                header("Content-Type: application/octet-stream");
                header("Content-Transfer-Encoding: Binary");
                header("Content-disposition: attachment; filename=\"" . $serverPath . "-" . str_replace(".gz","",$logPath) . "\"");
                exit($finalLogData);
            }

            exit($finalLogData);
        }
        if (isset($_GET['dl'])) {
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"" . $serverPath . "-" . str_replace(".gz","",$logPath) . "\"");
            exit($logData);
        }
        exit($logData);
    } else {
        exit("Error: Log doesnt exist!");
    }
} else {
    exit("Error: Server Folder doesnt exist!");
}
?>
