<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_header" );?>


<div class="body styled">
    <ol class="breadcrumb1">
        <li><a href="/home">Home</a></li>
        <li><a href="/servers">Server Management</a></li>
        <li><a href="/">Manage <?php echo $server["serverName"];?></a></li>
    </ol>
    <div class="row">
        <div class="content col-md-12">
            <div class="page-header serverManagment"><h1>Manage <?php echo $server["serverName"];?> <small>Server Control Panel</small></h1></div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="row-fluid">
        <div class="col-md-8">
            <div class="btn-toolbar" role="toolbar">
                <div class="btn-group">
                    <a class="btn btn-sm btn-primary" href="/"><span class="glyphicon glyphicon-eye-open"></span> View Console</a>
                    <a class="btn btn-sm btn-info" href="/"><span class="glyphicon glyphicon-book"></span> Logs</a>
                </div>
                <div class="btn-group">
                    <a class="btn btn-sm btn-warning" href="/"><span class="glyphicon glyphicon-tags"></span> Permissions</a>
                    <a class="btn btn-sm btn-danger" href="/"><span class="glyphicon glyphicon-flag"></span> Ban Management</a>
                </div>
                <div class="btn-group pull-right">
                    <a class="btn btn-sm btn-default" href="/"><span class="glyphicon glyphicon-time"></span> History</a>
                    <a class="btn btn-primary btn-sm btn-default" href="/"><span class="glyphicon glyphicon-cog"></span> Settings</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Server Control</div>
                <div class="panel-body">

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Server Information</div>
                <br />
                <div class="row-fluid">
                    <div class="col-md-5"><strong>Name</strong></div>
                    <div class="col-md-7"><?php echo $serverInfo["serverName"];?></div>
                </div>
                <div class="row-fluid">
                    <div class="col-md-5"><strong>Port</strong></div>
                    <div class="col-md-7"><?php echo $serverInfo["port"];?></div>
                </div>
                <div class="row-fluid">
                    <div class="col-md-5"><strong>Max Players</strong></div>
                    <div class="col-md-7"><?php echo $serverInfo["maxPlayers"];?></div>
                </div>
                <div class="row-fluid">
                    <div class="col-md-5"><strong>Software</strong></div>
                    <div class="col-md-7"><?php echo $serverInfo["name"];?></div>
                </div>
                <div class="row-fluid">
                    <div class="col-md-5"><strong>Version</strong></div>
                    <div class="col-md-7"><?php echo $serverInfo["version"];?></div>
                </div>
                <div class="clearfix"></div><br />
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="col-md-8">
            <h3>Players Online Now</h3>
            <div class="list-group">
                <?php $counter1=-1; if( isset($serverPlayers) && is_array($serverPlayers) && sizeof($serverPlayers) ) foreach( $serverPlayers as $key1 => $value1 ){ $counter1++; ?>
                <div class="list-group-item">
                    <img class='mcUserPicSmall' src='//downwithdestruction.net/library/dwd/mcUserPic.php?s=32&u=<?php echo $value1;?>' title='<?php echo $value1;?>' width='32' height='32' />
                    <?php echo $value1;?>
                    <div class="btn-group pull-right">
                        <a href="/" class="btn btn-sm btn-danger">Ban</a>
                        <a href="/" class="btn btn-sm btn-warning">Kick</a>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="list-group-item">
                    <span class="label label-info">There are no operators on this server!</span>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Plugins<span class="label label-info pull-right"><?php echo count( $serverPlugins );?></span></div>
                <ul class="list-group">
                    <?php $counter1=-1; if( isset($serverPlugins) && is_array($serverPlugins) && sizeof($serverPlugins) ) foreach( $serverPlugins as $key1 => $value1 ){ $counter1++; ?>
                    <?php if( $value1["enabled"] ){ ?>
                    <li class="list-group-item list-group-item-success" data-toggle="popover" data-placement="left" data-title="<?php echo $value1["name"];?> Info" data-content="<strong>Version:</strong> <?php echo $value1["version"];?><br /><?php echo $value1["description"];?>"><?php echo $value1["name"];?></li>
                    <?php }else{ ?>
                    <li class="list-group-item list-group-item-danger" data-toggle="popover" data-placement="left" data-title="<?php echo $value1["name"];?> Info" data-content="<strong>Version:</strong> <?php echo $value1["version"];?><br /><?php echo $value1["description"];?>"><?php echo $value1["name"];?></li>
                    <?php } ?>
                    <?php }else{ ?><li class="list-group-item list-group-item-warning">No Plugins Loaded</li><?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<script src="/theme/js/highstock.js"></script>
<script src="/theme/js/themes/grid.js"></script>
<script type='text/javascript'>
    function getGraphData(options, url, type) {
        $.getJSON(url, function(json) {
            options.series = [];
            for (columnName in json.data) {
                options.series.push({name: columnName, data: json.data[columnName]});
            }

            if (type == null)
                type = true;
            if (type) {
                new Highcharts.StockChart(options);
            }
            else {
                new Highcharts.Chart(options);
            }

        });
    }
    function dwdHighchartsFormatter(tooltip) {
        var items = this.points || splat(this),
                series = items[0].series,
                s;
        // build the header
        s = [series.tooltipHeaderFormatter(items[0])];
        // sort the values
        items.sort(function(a, b) {
            return ((a.y < b.y) ? -1 : ((a.y > b.y) ? 1 : 0));
        });
        items.reverse();
        // build the values
        $.each(items, function(i, item) {
            series = item.series;
            s.push((series.tooltipFormatter && series.tooltipFormatter(item)) ||
                    item.point.tooltipFormatter(series.tooltipOptions.pointFormat));
        });
        // footer
        s.push(tooltip.options.footerFormat || '');
        return s.join('');
    }

    $(document).ready(function() {
        $("[data-dwd-graph-type]").each(function() {
            id = $(this).attr("id");
            graphOpt = {chart: {renderTo: id, type: $("#" + id).attr("data-dwd-graph-type").length > 0 ? $("#" + id).attr("data-dwd-graph-type") : "spline", zoomType: "x"}, series: [{name: null, data: []}], feedurl: "/api/chart.php?param=" + $("#" + id).attr("data-dwd-graph-param") + "&server=" + $("#" + id).attr("data-dwd-graph-server"), title: {text: $("#" + id).attr("data-dwd-graph-title").length > 0 ? $("#" + id).attr("data-dwd-graph-title") : "Graph"}, subtitle: {text: $("#" + id).attr("data-dwd-graph-subtitle").length > 0 ? $("#" + id).attr("data-dwd-graph-subtitle") : "This is a graph!"}, legend: {enabled: "false" === $("#" + id).attr("data-dwd-graph-legend") || "false" === $("#" + id).attr("data-dwd-graph-extras") ? !1 : !0}, credits: {enabled: !1}, scrollbar: {enabled: "false" === $("#" + id).attr("data-dwd-graph-scrollbar") || "false" === $("#" + id).attr("data-dwd-graph-extras") ? !1 : !0}, exporting: {enabled: !1}, rangeSelector: {selected: 3, enabled: "false" === $("#" + id).attr("data-dwd-graph-range") || "false" === $("#" + id).attr("data-dwd-graph-extras") ? !1 : !0, buttons: [{type: "hour", count: 2, text: "2h"}, {type: "hour", count: 12, text: "12h"}, {type: "day", count: 1, text: "1d"}, {type: "week", count: 1, text: "1w"}, {type: "week", count: 2, text: "2w"}, {type: "month", count: 1, text: "1m"}]}, xAxis: {type: "datetime", maxZoom: 120, dateTimeLabelFormats: {month: "%e. %b", year: "%b"}, gridLineWidth: 0}, yAxis: {min: 0, title: {text: ""}, labels: {align: "left", x: 3, y: 16}, showFirstLabel: !1}, tooltip: {enabled: "false" === $("#" + id).attr("data-dwd-graph-tooltip") || "false" === $("#" + id).attr("data-dwd-graph-extras") ? !1 : !0, shared: !0, crosshairs: !0}, plotOptions: {series: {marker: {enabled: "false" === $("#" + id).attr("data-dwd-graph-markers") ? !1 : !0}}}};
            graphObj = (($("#" + id).attr("data-dwd-graph-extras") === "false") ? new Highcharts.Chart(graphOpt) : new Highcharts.StockChart(graphOpt));
            getGraphData(graphOpt, "/api/chart.php?param=" + $("#" + id).attr("data-dwd-graph-param") + "&server=" + $("#" + id).attr("data-dwd-graph-server") + "&l=" + ($("#" + id).attr("data-dwd-graph-limit").length > 0 ? $("#" + id).attr("data-dwd-graph-limit") : 500), (($("#" + id).attr("data-dwd-graph-extras") === "false") ? false : true));
        });
    });
</script>
<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_footer" );?>