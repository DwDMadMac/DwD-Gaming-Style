$(document).ready(function() {
    $(".hide-server").hide();
    setInterval(function() {
        $.get('/graph-generator.php', function(data) {
            var graphPercent = parseInt(data);
            if (graphPercent == 0) {
                $("#graph-generator").hide();
            }
            else {
                $("#graph-generator-progress-bar").width(graphPercent + "%");
                $("#graph-generator").show();
            }
        });
    }, 10000);
});
$(document).ready(function() {
    $("#goto").typeahead({name: 'Plugin', remote: 'http://api.mcstats.org/1.0/typeahead/?q=%QUERY'});
    $("#goto").bind("typeahead:selected", function(obj, datum) {
        window.location = "/plugin/" + datum.value;
    });
    $(".sparkline_line_good span").sparkline("html", {type: "line", fillColor: "#B1FFA9", lineColor: "#459D1C", width: "50", height: "24"});
    $(".sparkline_line_bad span").sparkline("html", {type: "line", fillColor: "#FFC4C7", lineColor: "#BA1E20", width: "50", height: "24"});
    $(".sparkline_line_neutral span").sparkline("html", {type: "line", fillColor: "#CCCCCC", lineColor: "#757575", width: "50", height: "24"});
    $(".sparkline_bar_good span").sparkline('html', {type: "bar", barColor: "#459D1C", barWidth: "5", height: "24"});
    $(".sparkline_bar_bad span").sparkline('html', {type: "bar", barColor: "#BA1E20", barWidth: "5", height: "24"});
    $(".sparkline_bar_neutral span").sparkline('html', {type: "bar", barColor: "#757575", barWidth: "5", height: "24"});
});
var pluginListPage = 1;
var pluginListMaxPages = 1;
function loadPluginListPage(page) {
    if (page < 1) {
        return;
    }
    loadMaxPagesFromHTML();
    if (page > pluginListMaxPages) {
        page = pluginListMaxPages;
    }
    $("#plugin-list-back").addClass("disabled");
    $("#plugin-list-forward").addClass("disabled");
    $("#plugin-list-go").addClass("disabled");
    $.getJSON("http://api.mcstats.org/1.0/list/" + page, function(data) {
        var html = "";
        for (i = 0; i < data.plugins.length; i++) {
            var plugin = data.plugins[i];
            var rank = plugin.rank;
            var linkName = plugin.name;
            if (rank <= 10) {
                rank = "<b>" + rank + "</b>";
                plugin.name = "<b>" + plugin.name + "</b>";
                plugin.servers24 = "<b>" + plugin.servers24 + "</b>";
            }
            if (plugin.rank < plugin.lastrank) {
                rank += ' <i class="fam-arrow-up" title="Increased from ' + plugin.lastrank + ' (+' + (plugin.lastrank - plugin.rank) + ')"></i>';
            }
            else if (plugin.rank > plugin.lastrank) {
                rank += ' <i class="fam-arrow-down" title="Decreased from ' + plugin.lastrank + ' (-' + (plugin.rank - plugin.lastrank) + ')"></i>';
            }
            else {
                rank += ' <i class="fam-bullet-blue" title="No change"></i>';
            }
            html += '<tr id="plugin-list-item"> <td style="text-align: center;">' + rank + ' </td> <td> <a href="/plugin/' + linkName + '" target="_blank">' + plugin.name + '</a> </td> <td style="text-align: center;"> ' + plugin.servers24 + ' </td> </tr>';
        }
        clearPluginList();
        $("#plugin-list tr:first").after(html);
        pluginListPage = page;
        $("#plugin-list-current-page").html(page);
        $("#plugin-list-max-pages").html(data.maxPages);
        $("#plugin-list-goto-page").val(page);
        $("#plugin-list-go").removeClass("disabled");
        if (pluginListPage == 1) {
            $("#plugin-list-back").addClass("disabled");
        } else {
            $("#plugin-list-back").removeClass("disabled");
        }
        if (pluginListPage == pluginListMaxPages) {
            $("#plugin-list-back").addClass("disabled");
        } else {
            $("#plugin-list-forward").removeClass("disabled");
        }
        history.pushState(null, "Plugin Metrics :: Page " + page, "/plugin-list/" + page + "/");
    });
}
function clearPluginList() {
    $("#plugin-list #plugin-list-item").remove();
}
function movePluginListBack() {
    loadCurrentPageFromHTML();
    if (pluginListPage == 1) {
        return;
    }
    loadPluginListPage(pluginListPage - 1);
}
function movePluginListForward() {
    loadCurrentPageFromHTML();
    loadPluginListPage(pluginListPage + 1);
}
function loadMaxPagesFromHTML() {
    var maxPageHTML = parseInt($("#plugin-list-max-pages").html());
    if (maxPageHTML > 0) {
        pluginListMaxPages = maxPageHTML;
    }
}
function loadCurrentPageFromHTML() {
    var currentPageHTML = parseInt($("#plugin-list-current-page").html());
    if (currentPageHTML > 0) {
        pluginListPage = currentPageHTML;
    }
}
function showMoreServers() {
    $(".more-servers").hide();
    $(".hide-server").show();
}
var HIGHCHARTS = "highcharts";
var HIGHSTOCKS = "highstocks";
function retrieveGraphData(options, framework, feedurl) {
    $.getJSON(feedurl, function(json) {
        if (json.type == "Pie") {
            options.series = [{name: "", data: json.data}];
        }
        else if (json.type == "Map") {
            var renderTo = options.chart.renderTo;
            var googOptions = {backgroundColor: {fill: 'transparent'}};
            var chart = new google.visualization.GeoChart(document.getElementById(renderTo));
            chart.draw(google.visualization.arrayToDataTable(json.data), googOptions);
        }
        else if (json.type == "Donut") {
            var colors = ["#4572A7", "#AA4643", "#89A54E", "#80699B", "#3D96AE", "#DB843D", "#92A8CD", "#A47D7C", "#B5CA92"];
            var inner = [];
            var outer = [];
            var colorIndex = 0;
            for (outName in json.data) {
                var sum = 0;
                var length = 0;
                for (oin in json.data[outName]) {
                    length++;
                }
                var j = 0;
                for (oin in json.data[outName]) {
                    var inobject = json.data[outName][oin];
                    var brightness = 0.2 - (j / length) / 5;
                    sum += inobject.y;
                    outer.push({name: inobject.name, y: inobject.y, color: Highcharts.Color(colors[colorIndex]).brighten(brightness).get()});
                    j++;
                }
                inner.push({name: outName, y: sum, color: colors[colorIndex]});
                colorIndex++;
            }
            options.series = [{name: '', data: inner, size: '60%', dataLabels: {formatter: function() {
                            return this.y > 5 ? this.point.name : null;
                        }, color: 'white', distance: -30}}, {name: '', data: outer, innerSize: '60%', dataLabels: {formatter: function() {
                            return this.y > 1 ? '<b>' + this.point.name + ':</b> ' + this.y + '%' : null;
                        }}}];
        }
        else {
            options.series = [];
            for (columnName in json.data) {
                options.series.push({name: columnName, data: json.data[columnName]});
            }
        }
        if (options.chart.type != "map") {
            if (framework == HIGHSTOCKS) {
                new Highcharts.StockChart(options);
            } else {
                new Highcharts.Chart(options);
            }
        }
    });
}