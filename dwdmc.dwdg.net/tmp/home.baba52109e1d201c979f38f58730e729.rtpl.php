<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_header" );?>


<div class="body styled">
    <ol class="breadcrumb1">
        <li><a href="/home">Home</a></li>
        <li><a href="/servers">Server Management</a></li>
    </ol>
    <div class="row">
        <div class="content col-md-12">
            <div class="page-header serverManagment"><h1>Server Management <small>Control the MC servers</small></h1></div>
        </div>
        <div class="clearfix"></div>
    </div>

    <?php $counter1=-1; if( isset($serverList) && is_array($serverList) && sizeof($serverList) ) foreach( $serverList as $key1 => $value1 ){ $counter1++; ?>
    <div class="col-md-6">
        <div class="panel <?php if( $value1["cacheStatus"] == '1' ){ ?>panel-success<?php }else{ ?>panel-danger<?php } ?>">
             <div class="panel-heading">
                       <?php echo $value1["name"];?>
                       <span class="pull-right">
                           <a href='servers/manage/<?php echo $value1["id"];?>' class='btn btn-xs btn-default'><span class="glyphicon glyphicon-cog"></span> Manage</a>
                           <a href='logs/list/<?php echo $value1["id"];?>' class='btn btn-xs btn-info'><span class="glyphicon glyphicon-list-alt"></span> Logs</a>
                       </span>
                   </div>
                   <div class="panel-body">
                       <div style="height: 200px;" id="<?php echo $value1["id"];?><?php echo ( str_replace( $value1["name"], " ","-" ) );?>PlayersGraph" data-dwd-graph-limit="96" data-dwd-graph-extras="false" data-dwd-graph-markers="false" data-dwd-graph-type="spline" data-dwd-graph-server="<?php echo $value1["id"];?>" data-dwd-graph-param="playersOnline" data-dwd-graph-title="Player Comparison" data-dwd-graph-subtitle="Comparison in players in the <?php echo $value1["name"];?> server."></div>
                   </div>
               </div>
        </div>
        <?php } ?>
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
        /*        var id = "hubPlayersGraph";
         var graphOpt1 = {chart: {renderTo: id, type: "spline", zoomType: "x"}, series: [{name: null, data: []}], feedurl: "/api/chart.php?param=" + $("#" + id).attr("data-dwd-graph-param") + "&server=" + $("#" + id).attr("data-dwd-graph-server"), title: {text: $("#" + id).attr("data-dwd-graph-title")}, subtitle: {text: $("#" + id).attr("data-dwd-graph-subtitle")}, legend: {enabled: false}, credits: {enabled: false}, scrollbar: {enabled: false}, exporting: {enabled: false}, rangeSelector: {selected: 3, enabled: false, buttons: [{type: "hour", count: 2, text: "2h"}, {type: "hour", count: 12, text: "12h"}, {type: "day", count: 1, text: "1d"}, {type: "week", count: 1, text: "1w"}, {type: "week", count: 2, text: "2w"}, {type: "month", count: 1, text: "1m"}]}, xAxis: {type: "datetime", maxZoom: 120, dateTimeLabelFormats: {month: "%e. %b", year: "%b"}, gridLineWidth: 0}, yAxis: {min: 0, title: {text: ""}, labels: {align: "left", x: 3, y: 16}, showFirstLabel: false}, tooltip: {shared: true, crosshairs: true}};
         
         var graphObj1 = (($("#"+id).attr("data-dwd-graph-extras") === "false") ? new Highcharts.Chart(graphOpt1) : new Highcharts.StockChart(graphOpt1));
         getGraphData(graphObj1, "/api/chart.php?param=" + $("#"+id).attr("data-dwd-graph-param") + "&server=" + $("#"+id).attr("data-dwd-graph-server"), (($("#"+id).attr("data-dwd-graph-extras") === "false") ? false : true));
         
         id = "lobbyPlayersGraph";
         var graphOpt2 = {chart: {renderTo: id, type: "spline", zoomType: "x"}, series: [{name: null, data: []}], feedurl: "/api/chart.php?param=" + $("#" + id).attr("data-dwd-graph-param") + "&server=" + $("#" + id).attr("data-dwd-graph-server"), title: {text: $("#" + id).attr("data-dwd-graph-title")}, subtitle: {text: $("#" + id).attr("data-dwd-graph-subtitle")}, legend: {enabled: false}, credits: {enabled: false}, scrollbar: {enabled: false}, exporting: {enabled: false}, rangeSelector: {selected: 3, enabled: false, buttons: [{type: "hour", count: 2, text: "2h"}, {type: "hour", count: 12, text: "12h"}, {type: "day", count: 1, text: "1d"}, {type: "week", count: 1, text: "1w"}, {type: "week", count: 2, text: "2w"}, {type: "month", count: 1, text: "1m"}]}, xAxis: {type: "datetime", maxZoom: 120, dateTimeLabelFormats: {month: "%e. %b", year: "%b"}, gridLineWidth: 0}, yAxis: {min: 0, title: {text: ""}, labels: {align: "left", x: 3, y: 16}, showFirstLabel: false}, tooltip: {shared: true, crosshairs: true}};
         
         var graphObj2 = (($("#"+id).attr("data-dwd-graph-extras") === "false") ? new Highcharts.Chart(graphOpt2) : new Highcharts.StockChart(graphOpt2));
         getGraphData(graphObj2, "/api/chart.php?param=" + $("#"+id).attr("data-dwd-graph-param") + "&server=" + $("#"+id).attr("data-dwd-graph-server"), (($("#"+id).attr("data-dwd-graph-extras") === "false") ? false : true));
         */

        //var graphOpt3 = {chart:{renderTo:id,type:"spline",zoomType:"x"},series:[{name:null,data:[]}],feedurl:"/api/chart.php?param="+$("#"+id).attr("data-dwd-graph-param")+"&server="+$("#"+id).attr("data-dwd-graph-server"),title:{text:$("#"+id).attr("data-dwd-graph-title")},subtitle:{text:$("#"+id).attr("data-dwd-graph-subtitle")},legend:{enabled:false},credits:{enabled:false},scrollbar:{enabled:false},exporting:{enabled:false},rangeSelector:{selected:3,enabled:false,buttons:[{type:"hour",count:2,text:"2h"},{type:"hour",count:12,text:"12h"},{type:"day",count:1,text:"1d"},{type:"week",count:1,text:"1w"},{type:"week",count:2,text:"2w"},{type:"month",count:1,text:"1m"}]},xAxis:{type:"datetime",maxZoom:120,dateTimeLabelFormats:{month:"%e. %b",year:"%b"},gridLineWidth:0},yAxis:{min:0,title:{text:""},labels:{align:"left",x:3,y:16},showFirstLabel:false},tooltip:{shared:true,crosshairs:true}};

        //var graphObj3 = (($("#"+id).attr("data-dwd-graph-extras") === "false") ? new Highcharts.Chart(graphOpt3) : new Highcharts.StockChart(graphOpt3));
        //getGraphData(graphObj3, "/api/chart.php?param=" + $("#"+id).attr("data-dwd-graph-param") + "&server=" + $("#"+id).attr("data-dwd-graph-server"), (($("#"+id).attr("data-dwd-graph-extras") === "false") ? false : true));

        $("[data-dwd-graph-type]").each(function() {
            id = $(this).attr("id");
            //graphOpt = {chart: {renderTo: id, type: "spline", zoomType: "x"}, series: [{name: null, data: []}], feedurl: "/api/chart.php?param=" + $("#" + id).attr("data-dwd-graph-param") + "&server=" + $("#" + id).attr("data-dwd-graph-server"), title: {text: $("#" + id).attr("data-dwd-graph-title")}, subtitle: {text: $("#" + id).attr("data-dwd-graph-subtitle")}, legend: {enabled: false}, credits: {enabled: false}, scrollbar: {enabled: false}, exporting: {enabled: false}, rangeSelector: {selected: 3, enabled: false, buttons: [{type: "hour", count: 2, text: "2h"}, {type: "hour", count: 12, text: "12h"}, {type: "day", count: 1, text: "1d"}, {type: "week", count: 1, text: "1w"}, {type: "week", count: 2, text: "2w"}, {type: "month", count: 1, text: "1m"}]}, xAxis: {type: "datetime", maxZoom: 120, dateTimeLabelFormats: {month: "%e. %b", year: "%b"}, gridLineWidth: 0}, yAxis: {min: 0, title: {text: ""}, labels: {align: "left", x: 3, y: 16}, showFirstLabel: false}, tooltip: {shared: true, crosshairs: true}};


            graphOpt = {chart: {renderTo: id, type: $("#" + id).attr("data-dwd-graph-type").length > 0 ? $("#" + id).attr("data-dwd-graph-type") : "spline", zoomType: "x"}, series: [{name: null, data: []}], feedurl: "/api/chart.php?param=" + $("#" + id).attr("data-dwd-graph-param") + "&server=" + $("#" + id).attr("data-dwd-graph-server"), title: {text: $("#" + id).attr("data-dwd-graph-title").length > 0 ? $("#" + id).attr("data-dwd-graph-title") : "Graph"}, subtitle: {text: $("#" + id).attr("data-dwd-graph-subtitle").length > 0 ? $("#" + id).attr("data-dwd-graph-subtitle") : "This is a graph!"}, legend: {enabled: "false" === $("#" + id).attr("data-dwd-graph-legend") || "false" === $("#" + id).attr("data-dwd-graph-extras") ? !1 : !0}, credits: {enabled: !1}, scrollbar: {enabled: "false" === $("#" + id).attr("data-dwd-graph-scrollbar") || "false" === $("#" + id).attr("data-dwd-graph-extras") ? !1 : !0}, exporting: {enabled: !1}, rangeSelector: {selected: 3, enabled: "false" === $("#" + id).attr("data-dwd-graph-range") || "false" === $("#" + id).attr("data-dwd-graph-extras") ? !1 : !0, buttons: [{type: "hour", count: 2, text: "2h"}, {type: "hour", count: 12, text: "12h"}, {type: "day", count: 1, text: "1d"}, {type: "week", count: 1, text: "1w"}, {type: "week", count: 2, text: "2w"}, {type: "month", count: 1, text: "1m"}]}, xAxis: {type: "datetime", maxZoom: 120, dateTimeLabelFormats: {month: "%e. %b", year: "%b"}, gridLineWidth: 0}, yAxis: {min: 0, title: {text: ""}, labels: {align: "left", x: 3, y: 16}, showFirstLabel: !1}, tooltip: {enabled: "false" === $("#" + id).attr("data-dwd-graph-tooltip") || "false" === $("#" + id).attr("data-dwd-graph-extras") ? !1 : !0, shared: !0, crosshairs: !0}, plotOptions: {series: {marker: {enabled: "false" === $("#" + id).attr("data-dwd-graph-markers") ? !1 : !0}}}};
            graphObj = (($("#" + id).attr("data-dwd-graph-extras") === "false") ? new Highcharts.Chart(graphOpt) : new Highcharts.StockChart(graphOpt));
            getGraphData(graphOpt, "/api/chart.php?param=" + $("#" + id).attr("data-dwd-graph-param") + "&server=" + $("#" + id).attr("data-dwd-graph-server") + "&l=" + ($("#" + id).attr("data-dwd-graph-limit").length > 0 ? $("#" + id).attr("data-dwd-graph-limit") : 500), (($("#" + id).attr("data-dwd-graph-extras") === "false") ? false : true));
        });
    });
</script>
<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_footer" );?>