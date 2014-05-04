<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_header" );?>
<div class="col-md-6 col-md-offset-3 loginPanel">
    <div class="panel panel-default">
        <div class="panel-heading">Authentication</div>
        <div class="panel-body">
            <?php if( isset($noticeMsg) ){ ?>
            <div class="alert alert-danger alert-dismissabled">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $noticeMsg;?>
            </div>
            <?php } ?>

            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-offset-1 col-sm-9">
                        <input type="text" class="form-control" name="inputUsername" id="inputUsername" placeholder="Username"<?php if( isset($username) ){ ?> value="<?php echo $username;?>"<?php } ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-offset-1 col-sm-9">
                        <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_footer" );?>