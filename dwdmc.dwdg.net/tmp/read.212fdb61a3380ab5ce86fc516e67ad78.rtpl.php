<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_header" );?>

<div class="body styled">
    <ol class="breadcrumb1">
        <li><a href="/home">Home</a></li>
        <li><a href="/logs">Logs & Statistics</a></li>
        <li><a href="/logs/list/<?php echo $curID;?>"><?php echo $curServer;?></a></li>
        <li><a href="/"><?php echo $curLog;?></a></li>
    </ol>

    <div class="row">
        <div class="content col-md-12">
            <div class="inner">
                <h3>Log Reader <small><?php echo $curServer;?> - <?php echo $curLog;?></small></h3>

                <input type="hidden" id="curServer" value="<?php echo $curServer;?>" />
                <input type="hidden" id="curLog" value="<?php echo $curLog;?>" />


                Click to hide: 
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-default toggleButton" id="toggleJSONAPI">JSONAPI</button>
                    <button type="button" class="btn btn-sm btn-default toggleButton" id="toggleRealMotd">RealMotd</button>
                    <button type="button" class="btn btn-sm btn-default toggleButton" id="toggleCommunityBridge">CommunityBridge</button>
                </div>

                <a class="btn btn-sm btn-info pull-right" href="//api/log.php?server=<?php echo $curServer;?>&log=<?php echo $curLog;?>">Download Log</a>

                <br />
                <br />

                <pre style="overflow-y:scroll;height:400px;" id="logReader"><?php echo $logData;?></pre>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function updateLog() {
        var server = $('#curServer').attr('value');
        var log = $('#curLog').attr('value');
        var hideParams = "";
        if ($('#toggleJSONAPI').hasClass('active'))
            hideParams += ",jsonapi";
        if ($('#toggleRealMotd').hasClass('active'))
            hideParams += ",realMotd";
        if ($('#toggleCommunityBridge').hasClass('active'))
            hideParams += ",communitybridge";

        console.log('/api/log.php?server=' + server + '&log=' + log + '&hideParams=' + hideParams);

        $('#logReader').load('/api/log.php?server=' + server + '&log=' + log + '&hideParams=' + hideParams);
    }

    $('.toggleButton').click(function() {
        if ($(this).hasClass("active"))
            $(this).removeClass("active");
        else
            $(this).addClass("active");

        updateLog();
    });

</script>

<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_footer" );?>