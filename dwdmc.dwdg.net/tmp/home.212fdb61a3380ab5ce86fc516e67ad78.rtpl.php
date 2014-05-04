<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_header" );?>

<div class="body styled">
    <ol class="breadcrumb1">
        <li><a href="/#">Home</a></li>
        <li><a href="/#">Logs & Statistics</a></li>
    </ol>

    <div class="row">
        <div class="content col-md-12">
            <div class="page-header logStats"><h1>Logs & Statistics <small>Console Logs & General Stats</small></h1></div>
            <div class="inner">
                <h3>Logs & Statistics</h3>

                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Server</th>
                            <th>Latest Log Entry</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        <?php $counter1=-1; if( isset($servers) && is_array($servers) && sizeof($servers) ) foreach( $servers as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                            <td><?php echo $value1["name"];?></td>
                            <td></td>
                            <td>
                                <a href='/logs/items/<?php echo $value1["id"];?>' class='btn btn-xs btn-default'><span class="glyphicon glyphicon-list-alt"></span> View Logs</a>
                                <a href='/logs/read/<?php echo $value1["id"];?>/latest.log' class='btn btn-xs btn-info'><span class="glyphicon glyphicon-book"></span> Read Latest</a>                               
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