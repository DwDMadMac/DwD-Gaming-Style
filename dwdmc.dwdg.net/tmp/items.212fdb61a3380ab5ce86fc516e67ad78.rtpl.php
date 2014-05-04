<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_header" );?>

<div class="body styled">
    <ol class="breadcrumb1">
        <li><a href="/home">Home</a></li>
        <li><a href="/logs">Logs & Statistics</a></li>
        <li><a href="/"><?php echo $curServer;?></a></li>
    </ol>

    <div class="row">
        <div class="content col-md-12">
            <div class="inner">
                <h3>Logs for <?php echo $curServer;?></h3>

                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Log File</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        <?php $counter1=-1; if( isset($logFiles) && is_array($logFiles) && sizeof($logFiles) ) foreach( $logFiles as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                            <td><?php echo $value1;?></td>
                            <td>
                                <a href='/logs/read/<?php echo $curID;?>/<?php echo $value1;?>' class='btn btn-xs btn-default'><span class="glyphicon glyphicon-list-alt"></span> View Log</a>
                                <a href='/api/log.php?server=<?php echo $curServer;?>&log=<?php echo $value1;?>&dl' class='btn btn-xs btn-info'><span class="glyphicon glyphicon-download-alt"></span> Download</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_footer" );?>