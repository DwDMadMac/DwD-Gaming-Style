	<script src="{$jQuerySource}"></script>	
	<xen:if is="{$jQuerySource} != {$jQuerySourceLocal}">
		<script>if (!window.jQuery) { document.write('<scr'+'ipt type="text/javascript" src="{$jQuerySourceLocal}"><\/scr'+'ipt>'); }</script>
	</xen:if>
        <xen:if is="{$xenOptions.uncompressedJs} == 1 OR {$xenOptions.uncompressedJs} == 3">
            <script src="{$javaScriptSource}/jquery/jquery.xenforo.rollup.js?_v={$xenOptions.jsVersion}"></script>\n\
        </xen:if>	
	<script src="{xen:helper javaScriptUrl, '{$javaScriptSource}/xenforo/xenforo.js?_v={$xenOptions.jsVersion}'}"></script>
        <!-- Profile Page image reload -->
        <xen:if is="{$contentTemplate} == 'member_view'">
            <script type="text/javascript" src="jquery-source"></script>
            <script>$(document).load( ... )</script>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
            <script>
                (function($){
                    $.randomImage = {
                        defaults: {
                            path: 'http://dwdg.net/img/forums/profile/',
                            myImages: ['profileOne.jpg', 'profileTwo.jpg', 'profileThree.jpg' ]
                        }
                    };

                    $.fn.extend({
                        randomImage:function(config) {
                            var config = $.extend({}, $.randomImage.defaults, config);

                            return this.each(function() {
                                var imageNames = config.myImages,
                                //get size of array, randomize a number from this
                                // use this number as the array index
                                imageNamesSize = imageNames.length,
                                lotteryNumber = Math.floor(Math.random()*imageNamesSize),
                                winnerImage = imageNames[lotteryNumber],
                                fullPath = config.path + winnerImage;

                                //put this image into DOM at class of randomImage
                                // alt tag will be image filename.
                                $(this).attr({
                                    src: fullPath,
                                    alt: winnerImage
                                });
                            });
                        }
                    });
                }(jQuery));

                $(document).ready(function(){
                    $('img.JSimgRendering:first').randomImage();
                });
            </script>
        <xen:else/>
            <xen:comment> Do Nothing </xen:comment>
        </xen:if>
        <!-- Custom Navi JS -->
        <script type="text/javascript">
            function reInit() {
                $("[title]");
            }
            $(function() {
                reInit();

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
        </script>
        <script type="text/javascript" src="http://static.downwithdestruction.net/theme/js/colour.jquery.min.js"></script>
        <xen:comment><script type="text/javascript" src="http://static.downwithdestruction.net/theme/js/bootstrap.min.js"></script></xen:comment>
        <!--XenForo_Require:JS-->