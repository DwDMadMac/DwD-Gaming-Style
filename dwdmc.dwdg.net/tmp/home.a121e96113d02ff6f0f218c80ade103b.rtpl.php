<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_header" );?>

<div class="body styled">
    <ol class="breadcrumb1">
        <li><a href="/home">Home</a></li>
        <li><a href="/#">User Moderation</a></li>
    </ol>

    <div class="row">
        <div class="content col-md-12">
            <div class="page-header userMod"><h1>User Moderation <small>Manage the users of the MC Network</small></h1></div>
            <div class="inner">
                <div class="input-group col-md-3 pull-right">
                    <input type="text" name="player" placeholder="Search Player" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">Search</button>
                    </span>
                </div>
                <div class="clearfix"></div>
                <h4>Recent Actions</h4>
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th width="10%">Type</th>
                            <th>Server</th>
                            <th width="20%">Player</th>
                            <th width="40%">Reason</th>
                            <th width="20%">Staff Responsible</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter1=-1; if( isset($latestData) && is_array($latestData) && sizeof($latestData) ) foreach( $latestData as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                            <td><?php echo $value1["type"];?></td>
                            <td><?php echo ucwords( $value1["server"] );?></td>
                            <td><img src="https://minotar.net/helm/<?php echo $value1["player"];?>/16.png"> <?php echo $value1["player"];?></td>
                            <td><?php echo $value1["reason"];?></td>
                            <td><img src="https://minotar.net/helm/<?php echo $value1["staff"];?>/16.png"> <?php echo $value1["staff"];?></td>
                            <td></td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_footer" );?>