<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_header" );?>


<div class="body styled">
    <ol class="breadcrumb1">
        <li><a href="/#">Home</a></li>
        <li><a href="/#">Dashboard</a></li>
    </ol>
    <div class="row">
        <div class="content col-md-12">
            <div class="page-header dashboard"><h1>Dashboard <small>What would you like to do?</small></h1></div>

            <div class="row-fluid clearfix">
                <div class="col-md-8">
                    <div style="height:250px;" id="cpuUsageContainer"></div>
                </div>
                <div class="col-md-4">
                    <h5>Staff Online Now</h5>
                    <?php $counter1=-1; if( isset($staffOnline) && is_array($staffOnline) && sizeof($staffOnline) ) foreach( $staffOnline as $key1 => $value1 ){ $counter1++; ?>
                    <img src="https://www.gravatar.com/avatar/<?php echo emailHash( $value1["email"] );?>" width='28' height='28' style='margin-top:-3px;' title="<?php echo $value1["username"];?>" />&nbsp;
                    <?php }else{ ?>Error!<?php } ?>
                </div>
            </div>


            <div class="row-fluid">
                <div class="inner">
                    <div class='panel panel-default'><div id="container" class='panel-body'></div></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
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

    var ServerCPUChartObj;
    var ServerRAMChartObj;

    $(document).ready(function() {
        ServerPingChartOpt = {"chart": {"renderTo": "container", "type": "areaspline", "zoomType": "x"}, "title": {"text": " "}, "series": [{"name": null, "data": []}], "feedurl": "/api/chart.php?param=internalPing", "title":{"text": "Minecraft Summary"}, "subtitle": {"text": "Comparison in Internal Ping for all Minecraft Servers"}, "credits": {"enabled": false}, "scrollbar": {"enabled": false}, "exporting": {"enabled": false}, "rangeSelector": {"selected": 3, "buttons": [{"type": "hour", "count": 2, "text": "2h"}, {"type": "hour", "count": 12, "text": "12h"}, {"type": "day", "count": 1, "text": "1d"}, {"type": "week", "count": 1, "text": "1w"}, {"type": "week", "count": 2, "text": "2w"}, {"type": "month", "count": 1, "text": "1m"}]}, "xAxis": {"type": "datetime", "maxZoom": 120, "dateTimeLabelFormats": {"month": "%e. %b", "year": "%b"}, "gridLineWidth": 0}, "yAxis": {"min": 0, "title": {"text": ""}, "labels": {"align": "left", "x": 3, "y": 16}, "showFirstLabel": false}, "tooltip": {"shared": true, "crosshairs": true}};
        ServerPingChartObj = new Highcharts.StockChart(ServerPingChartOpt);
        getGraphData(ServerPingChartOpt, "/api/chart.php?param=internalPing");

        ServerCPUChartOpt = {
            "chart": {"renderTo": "cpuUsageContainer", "type": "spline"
                , events: {
                    load: function() {
                        // set up the updating of the chart each second
                        var chart = this;
                        
                        setInterval(function() {

                            shift = chart.series[0].data.length > 20;

                            $.getJSON('/api/cpuUsage.php', function(data) {
                                var x = (new Date()).getTime();
                                console.log(data);
                                $.each(data, function(id, y) {
                                    chart.series[id].addPoint([x, y], true, shift);
                                });
                            });
                        }, 1000);
                    }
                }
            },
            plotOptions: {
                spline: {
                    marker: {
                        enabled: false
                    }
                }
            },
            xAxis: {
                type: 'datetime',
            },
            credits: {
                enabled: false
            },
            yAxis: {
                title: {
                    text: 'CPU %'
                },
                min: 0
            },
            tooltip: {
                crosshairs: true,
                shared: true,
            },
            "title": {"text": "Minecraft CPU Usage"},
            "series": [{"name": "Lobby", "data": []}, {"name": "RPG", "data": []}, {"name": "Creative", "data": []}, {"name": "Test", "data": []}, {"name": "Events", "data": []}, {"name": "Heroes", "data": []}, {"name": "Survival", "data": []}]
        };
        ServerCPUChartObj = new Highcharts.Chart(ServerCPUChartOpt);

    });
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
<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->assign( "key", $key1 ); $tpl->assign( "value", $value1 );$tpl->draw( "tpl/global_footer" );?>