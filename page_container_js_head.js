	<script src="{$jQuerySource}"></script>	
	<xen:if is="{$jQuerySource} != {$jQuerySourceLocal}">
		<script>if (!window.jQuery) { document.write('<scr'+'ipt type="text/javascript" src="{$jQuerySourceLocal}"><\/scr'+'ipt>'); }</script>
	</xen:if><xen:if is="{$xenOptions.uncompressedJs} == 1 OR {$xenOptions.uncompressedJs} == 3">
	<script src="{$javaScriptSource}/jquery/jquery.xenforo.rollup.js?_v={$xenOptions.jsVersion}"></script></xen:if>	
	<script src="{xen:helper javaScriptUrl, '{$javaScriptSource}/xenforo/xenforo.js?_v={$xenOptions.jsVersion}'}"></script>
            <!-- Profile Page image reload -->
            <xen:if is="{$contentTemplate} == 'member_view'">
                <script>
                var random_images_array = ["profileOne.jpg", "profileTwo.jpg", "profileThree.jpg"];
                function getRandomImage(imgAr, path) {
                    path = 'https://downwithdestruction.net/img/forums/profile/';
                    var num = Math.floor( Math.random() * imgAr.length );
                    var img = imgAr[ num ];
                    var imgStr = '<img src="' + path + img + '" alt = "" style="max-width: 100%;min-width: 100%;max-height: 450px;min-height: 450px;" >';
                    document.write(imgStr); document.close();
                }
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
            <script async type="text/javascript" src="https://downwithdestruction.net/theme/js/colour.jquery.min.js"></script>
            <!-- Floating Navigation jQuery feature -->
            <!-- NEW FLOAT JS -->
            <script>
            $(function() {
                // Stick the #nav to the top of the window
                var nav = $('#moderatorBar');
                var navHomeY = nav.offset().top;
                var isFixed = false;
                var $w = $(window);
                $w.scroll(function() {
                    var scrollTop = $w.scrollTop();
                    var shouldBeFixed = scrollTop > navHomeY;
                    if (shouldBeFixed && !isFixed) {
                        nav.css({
                            position: 'fixed',
                            top: 0,
                            left: nav.offset().left,
                            width: nav.width()
                        });
                        isFixed = true;
                    }
                    else if (!shouldBeFixed && isFixed) {
                        nav.css({
                            position: 'static'
                        });
                        isFixed = false;
                    }
                });
            });
            </script>
<xen:comment>
            <!-- OLD FLOAT JS -->
            <script>
                $(function() {

                    // get initial top offset of navigation 
                    var floating_navigation_offset_top = $('#moderatorBar').offset().top;

                    // define the floating navigation function
                    var floating_navigation = function(){
                                // current vertical position from the top
                        var scroll_top = $(window).scrollTop(); 

                        // if scrolled more than the navigation, change its 
                                // position to fixed to float to top, otherwise change 
                                // it back to relative
                        if (scroll_top > floating_navigation_offset_top) { 
                            $('#moderatorBar').css({ 'position': 'fixed', 'width': '100%', 'top':0});
                        } else {
                            $('#moderatorBar').css({ 'position': 'relative' }); 
                        }   
                    };

                    // run function on load
                    floating_navigation();

                    // run function every time you scroll
                    $(window).scroll(function() {
                         floating_navigation();
                    });

                });
            </script>
</xen:comment>
            <xen:comment><script async type="text/javascript" src="https://static.downwithdestruction.net/theme/js/bootstrap.min.js"></script></xen:comment>
            <!--XenForo_Require:JS-->