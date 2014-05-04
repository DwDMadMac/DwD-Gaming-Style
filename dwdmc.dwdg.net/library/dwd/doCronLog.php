<?php

include 'doCron.php';

$Cron->exportCacheToLog();
$Cron->generateGraphs();
?>
