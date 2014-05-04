$(function() {
    $("[title]").tooltip();
    $("[data-toggle=\"popover\"]").popover({trigger:"hover",title:$(this).attr('data-title'),html:true,delay:{hide:100}});

    if ($('#nav').length) {
        var $el, leftPos, newWidth, newColour,
                $mainNav = $("#nav");
        $mainNav.append("<li id='nav-line'></li>");

        if (!$mainNav.find(".active:first").length) {
            $mainNav.find("li:first").addClass("active");
        }

        $("#nav>li").each(function() {

            if ((window.location.href.indexOf($(this).find("a:first").attr("href"))) > 0) {
                $mainNav.find("li").removeClass('active');
                $(this).addClass('active');
            }
        });
        
        var $magicLine = $("#nav-line");
        $magicLine
                .width($("#nav .active").width())
                .css("left", $("#nav .active").position().left)
                .data("origLeft", $("#nav .active").position().left)
                .data("origWidth", $("#nav .active").width())
                .data("bgColour", ($("#nav .active").attr("data-nav-colour")) ? $("#nav .active").data("nav-colour") : '78250e');
        $magicLine.css('background-color', "#" + $magicLine.data('bgColour'));


        $("#nav>li.navi>a").hover(function() {
            $el = $(this);
            leftPos = $el.offset().left - $mainNav.offset().left;
            newWidth = $el.parent().width();
            newColour = ($el.parent().attr("data-nav-colour")) ? $el.parent().data("nav-colour") : '78250e';
            $magicLine.stop().animate({
                left: leftPos,
                width: newWidth,
                backgroundColor: "#" + newColour
            }, 800, "easeOutBack");
        }, function() {
            $magicLine
                    .data("origLeft", $("#nav .active").position().left)
                    .data("origWidth", $("#nav .active").width())
                    .data("bgColour", ($("#nav .active").attr("data-nav-colour")) ? $("#nav .active").data("nav-colour") : '78250e');
            $magicLine.stop().animate({
                left: $magicLine.data("origLeft"),
                width: $magicLine.data("origWidth"),
                backgroundColor: "#" + $magicLine.data("bgColour")
            }, 800, "easeOutBack");
        });
    }
});


function doPing() {
    $("[data-dwd-ping]").each(function() {
        var obj = $(this);
        var ping = $(obj).attr("data-dwd-ping");
        $.ajax({
            url: "/library/dwd/pingStatus.php?q=" + ping,
            success: function(msg) {
                result = $.parseJSON(msg);
                if (result != null) {
                    if (result == "1" || result.serverStatus == "1") {
                        $(obj).addClass("panel-success");
                        console.log(result);
                        $.each(result,function(key,value) {
                            $(obj).find("[data-dwd-param='"+key+"']").html(value);
                        });
                    }
                    else if (result == "0" || result.serverStatus == "0") {
                        $(obj).addClass("panel-danger");
                        $(obj).find("span.serverMotd").html("Server Offline");
                        $(obj).find("span.playerNum").html("0");
                        $(obj).find("span.playerTot").html("0");
                    }
                } else {
                    if (result == "1" || result.serverStatus == "1") {
                        $(obj).addClass("panel-success");
                    }
                    else if (result == "0" || result.serverStatus == "0") {
                        $(obj).addClass("panel-danger");
                    }
                }

            }
        });
    });
}
