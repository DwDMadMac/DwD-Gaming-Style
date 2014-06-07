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
                var nav = $('#moderatorBar').is(':visible') > 0 ? $('#moderatorBar') : $('#loginBar');
                var nav2 = $('#AddClassHereNav');
                var navHomeY = nav.offset().top;
                var isFixed = false;
                var $w = $(window);
                $w.scroll(function() {
                    var scrollTop = $w.scrollTop();
                    var shouldBeFixed = scrollTop > navHomeY;
                    if (shouldBeFixed && !isFixed) {
                        nav.css({
                            position: 'fixed',
                            left: nav.offset().left,
                            width: nav.width()
                        });
                        nav2.css({
                            position: 'fixed',
                            left: nav2.offset().left,
                            width: nav2.width()
                        });
                        <xen:if is="!{$visitor.user_id}">
                            nav2.css({
                                top: '0px'
                            });
                        <xen:elseif is="{$visitor.user_id}" />
                            nav2.css({
                                top: '40px'
                            });
                        <xen:else />
                            nav2.css({
                                top: 'inherit'
                            });
                        </xen:if>
                        $('#moderatorBar').addClass('customModBarCSS');
                        $('#AddClassHereNav').addClass('customNavBarCSS');
                        isFixed = true;
                    } else if (!shouldBeFixed && isFixed) {
                        nav.css({
                            position: 'relative',
                            left: '',
                            wdith: ''
                        });
                        nav2.css({
                            position: 'relative',
                            top: 0,
                            left: '',
                            wdith: ''
                        });
                        $('#moderatorBar').removeClass('customModBar<xen:edithint template="navigation.css" />

<div id="navigation" class="pageWidth {xen:if $canSearch, withSearch}">
    <div class="pageContent">
        <div class="header styled">
            <div onload="startTimer()" id="headerslider" class="inner">
                <xen:comment> Slider with buttons </xen:comment>
                        <img id="img" src="https://downwithdestruction.net/img/mc/mc-category-icon.png">
                        <button onclick="displayPreviousImage()">Previous</button>
                        <button onclick="displayNextImage()">Next</button>
                <!-- 
                    <div onload="startTimer()" id="headerslider" class="inner">
                <xen:comment> Standard Community Images </xen:comment>
                    <img alt="Minecraft Network" src="https://downwithdestruction.net/img/mc/mc-category-icon.png" />
                    <img alt="Modded Minecraft" src="https://downwithdestruction.net/img/mc/modded-mc.png" />
                    <img alt="GTA Online" src="https://downwithdestruction.net/img/gta/GTA-Online.jpg" />
                    <img alt="League Of Legends" src="https://downwithdestruction.net/img/lol/league_of_legends.jpg" />
                    <img alt="Call Of Duty" src="https://downwithdestruction.net/img/cod/cod_view.jpg" />
                -->
                <span class="pull-left logoImage"></span>
                <div class='SearchBarBox pull-right'>
                    <xen:if is="{$canSearch}"><xen:include template="search_bar" /></xen:if>
                </div>
                <!-- 
                <div class='status pull-right'>
                    <span class="tsStatus" data-placement="left" title="Online" > TeamSpeak: ts.dwdg.net</span><br />
                    <span class="mcStatus" data-placement="left" title="Events is Offline" > Minecraft: hub.dwdg.net</span><br />
                </div>
                -->
            </div>
            <div id="AddClassHereNav" class="nav">
                <ul id="nav" class="visitorTabs">
                    <xen:if is="{$showHomeLink}">
                        <li class="navi"><a href="https://downwithdestruction.net/home"><span class='l'>Home</span></a></li>
                    </xen:if>
                    <!-- forums -->
                        <li class="navi {xen:if $tabs.selected, 'selected active', 'Popup PopupControl PopupClosed'}" data-nav-colour='1494c5'>
                            <a href="{xen:link /board}" class="dropdown-toggle" data-toggle="dropdown" rel="Menu">
                                <span class='l'>
                                    Forums
                                    <xen:comment><span class="SplitCtrl caret" rel="Menu"></span></xen:comment>
                                </span>
                            </a>
                            <div class="forumsTabLinks">
                                    <div class="Menu JsOnly" id="AccountMenu">
                                        <div class="primaryContent menuHeader">
                                <ul class="blockLinksList">
                                            <li><a href="{xen:link 'categories/minecraft-network.94/'}">Minecraft Network</a></li>
                                            <li><a href="{xen:link 'categories/modded-minecraft.137/'}">Modded Minecraft</a></li>
                                            <li><a href="{xen:link 'categories/league-of-legends.96/'}">League Of Legends</a></li>
                                            <li><a href="{xen:link 'categories/gta-online.95/'}">GTA Online</a></li>
                                            <li><a href="{xen:link 'categories/call-of-duty.97/'} ">Call of Duty</a></li>
                                            <xen:comment><li><a href="{xen:link ''}">Counter Strike</a></li></xen:comment>
                                            <li><a href="{xen:link 'categories/miscellaneous.98/'} ">Miscellaneous</a></li>
                                            <xen:if is="{xen:helper ismemberof, $visitor, 16}">
                                                <li><a href="{xen:link 'categories/staff-headquarters.99/'} ">Staff Headquarters</a></li>
                                            </xen:if>
                                </ul>
                                        </div>
                                    </div>
                            </div>
                        </li>
                    <li class="navi" data-nav-colour="2d46b2"><a href="https://downwithdestruction.net/servers"><span class='l'>Servers</span></a></li>
                    <li class="navi {xen:if $tabs.selected, 'selected active'}" data-nav-colour="c329be">
                        <a href="{xen:link wiki}">
                            <span class='l'>Wiki</span>
                        </a>
                    </li>
                    <li class="navi" data-nav-colour="d39b38"><a href="{xen:link staff}"><span class='l'>Staff</span></a></li>
                    <li class="navi {xen:if $tabs.selected, 'selected active'}" data-nav-colour="15a3a5"><a href="{xen:link misc/contact}"><span class='l'>Support</span></a></li>
                </ul>
                <ul id="nav" class="visitorTabs pull-right">
                    <xen:if is="!{$visitor.user_id}">
                        <!-- Show Nothing To Guest -->
                    <xen:else />
                        <li class="navi" data-nav-colour="9d46b2"><a href="{xen:link 'arcade'}" >Arcade</a></li>
                        <li class="navi" data-nav-colour="4d46b2"><a href="{xen:link 'gallery'}">Gallery</a></li>
                        <xen:if is="!{xen:helper ismemberof, $visitor, 16}">
                            <!-- If not Staff Only Usergroup then show nothing -->
                        <xen:else />
                            <li class="navi" data-nav-colour="2d46b2"><a href="{xen:link 'resources'}">Resources</a></li>
                        </xen:if>
                        <li class="navi" data-nav-colour="2d46b2"><a href="{xen:link 'members'}">Members</a></li>
                    </xen:if>
                </ul>
            </div>
            <div class="nav-subNavi">
                <ul class="subNavi pull-left">
                    <xen:if is="!{$visitor.user_id}">
                        <!-- Do nothing for Guest -->
                    <xen:elseif is="{$contentTemplate} == 'category_view' OR 
                            {$contentTemplate} == 'forum_view' OR 
                            {$contentTemplate} == 'thread_view' OR 
                            {$contentTemplate} == 'watch_threads' OR 
                            {$contentTemplate} == 'watch_forums' OR 
                            {$contentTemplate} == 'waindigo_watch_social_forums_socialgroups' OR 
                            {$contentTemplate} == 'waindigo_social_category_view_socialgroups' OR 
                            {$contentTemplate} == 'find_new_posts_none' OR
                            {$contentTemplate} == 'forum_list'" />
                        <a href="{xen:link 'forums/-/mark-read', $forum, 'date={$serverTime}'}" class="OverlayTrigger"><li>{xen:phrase mark_forums_read}</li></a>
                        <xen:if is="{$canSearch}">
                            <a href="{xen:link search, '', 'type=post'}"><li>{xen:phrase search_forums}</li></a>
                        </xen:if>
                        <a href="{xen:link 'watched/forums'}"><li>{xen:phrase watched_forums}</li></a>
                        <a href="{xen:link 'watched/social-forums'}"><li>Watched Kingdom Forums</li></a>
                        <a href="{xen:link 'watched/threads'}"><li>{xen:phrase watched_threads}</li></a>
                        <a href="{xen:link 'find-new/posts'}" rel="nofollow"><li>{xen:if $visitor.user_id, {xen:phrase new_posts}, {xen:phrase recent_posts}}</li></a>
                    <xen:elseif is="{$contentTemplate} == 'member_notable' OR
                                {$contentTemplate} == 'member_view' OR
                                {$contentTemplate} == 'news_feed_page_global' OR
                                {$contentTemplate} == 'online_list' OR
                                {$contentTemplate} == 'member_list'" />
                        <a href="{xen:link 'members'}"><li>Notable Members</li></a>
                        <a href="{xen:link 'members/list'}"><li>Registered Members</li></a>
                        <a href="{xen:link 'online'}"><li>Current Visitors</li></a>
                        <a href="{xen:link 'recent-activity'}"><li>Recent Activity</li></a>
                    <xen:elseif is="{$contentTemplate} == 'EWRcarta_PageView' OR
                                {$contentTemplate} == 'EWRcarta_Pages' OR
                                {$contentTemplate} == 'EWRcarta_PageView_NoSide' OR
                                {$contentTemplate} == 'EWRcarta_Recent' OR
                                {$contentTemplate} == 'EWRcarta_PageCreate' OR
                                {$contentTemplate} == 'EWRcarta_Administrate' OR
                                {$contentTemplate} == 'EWRcarta_TemplateCreate' OR
                                {$contentTemplate} == 'EWRcarta_PageEdit'" />
                        <a href="{xen:link 'wiki'}"><li>Wiki Home</li></a>
                        <a href="{xen:link 'wiki/special/pages'}"><li>Page List</li></a>
                        <a href="{xen:link 'wiki/special/recent'}"><li>Recent Activity</li></a>
                        <xen:if is="{xen:helper ismemberof, $visitor, 15}">
                            <a href="{xen:link 'wiki/special/create-page'}"><li>Create New Page</li></a>
                            <a href="{xen:link 'wiki/special/administrate'}"><li>Administrate Wiki</li></a>
                        </xen:if>
                    <xen:elseif is="{$contentTemplate} == 'resource_index' OR
                                {$contentTemplate} == 'resource_description' OR
                                {$contentTemplate} == 'resource_field' OR
                                {$contentTemplate} == 'resource_add' OR
                                {$contentTemplate} == 'resource_version_add' OR
                                {$contentTemplate} == 'resource_author_view' OR
                                {$contentTemplate} == 'resource_author_list' OR
                                {$contentTemplate} == 'resource_category' OR
                                {$contentTemplate} == 'resource_featured'" />
                        <a href="{xen:link 'resources/?type=resource_update'}"><li>Search Resources</li></a>
                        <a href="{xen:link 'resources/authors'}"><li>Active Authors</li></a>
                        <a href="{xen:link 'resources/authors/{$visitor.user_id}'}"><li>Your Resources</li></a>
                        <a href="{xen:link 'resources/watched-categories'}"><li>Watched Categories</li></a>
                        <a href="{xen:link 'resources/watched'}"><li>Watched Resources</li></a>
                        <xen:if is="{xen:helper ismemberof, $visitor, 16}">
                            <a href="{xen:link 'resources/add'}" class="OverlayTrigger"><li>Add Resource</li></a>
                        </xen:if>
                    <xen:elseif is="{$contentTemplate} == 'xfr_useralbums_albums_list_grid' OR
                                {$contentTemplate} == 'xfr_useralbums_create_album' OR
                                {$contentTemplate} == 'xfr_useralbums_member_albums_list_grig' OR
                                {$contentTemplate} == 'xfr_useralbums_album_view' OR 
                                {$contentTemplate} == 'xfr_useralbums_edit_album' OR 
                                {$contentTemplate} == 'xfr_useralbums_image_view'" />
                        <a href="{xen:link 'gallery/create'}"><li>Create a Album</li></a>
                        <a href="{xen:link 'gallery/own'}"><li>View Your Albums</li></a>
                    <xen:elseif is="{$contentTemplate} == 'account_alerts' OR
                                {$contentTemplate} == 'account_personal_details' OR
                                {$contentTemplate} == 'news_feed_page' OR
                                {$contentTemplate} == 'dark_postrating_account_ratings_received' OR
                                {$contentTemplate} == 'dark_postrating_account_ratings_given' OR
                                {$contentTemplate} == 'bookmarks_account_list' OR
                                {$contentTemplate} == 'account_signature' OR
                                {$contentTemplate} == 'account_contact_details' OR
                                {$contentTemplate} == 'waindigo_account_trophies_trophies' OR
                                {$contentTemplate} == 'account_privacy' OR
                                {$contentTemplate} == 'account_preferences' OR
                                {$contentTemplate} == 'account_alert_preferences' OR
                                {$contentTemplate} == 'waindigo_account_email_preferences_emailalerts' OR
                                {$contentTemplate} == 'account_following' OR
                                {$contentTemplate} == 'account_ignored' OR
                                {$contentTemplate} == 'account_external_accounts' OR
                                {$contentTemplate} == 'account_security' OR
                                {$contentTemplate} == 'account_teamspeak_index' OR
                                {$contentTemplate} == 'account_twofactor'" />
                        <a href="{xen:link 'account/personal-details'}"><li>Personal Details</li></a>
                        <a href="{xen:link 'account/news-feed'}"><li>Your News Feed</li></a>
                        <a href="{xen:link 'account/ratings-received'}"><li>Ratings Received</li></a>
                        <a href="{xen:link 'account/ratings-given'}"><li>Ratings Given</li></a>
                        <a href="{xen:link 'account/bookmarks'}"><li>Bookmarks</li></a>
                    <xen:else />
                        <!-- Global Left Sub Navi -->
                    </xen:if>
                </ul>
            </div>
        </div>
    </div>
</div>CSS');
                        $('#AddClassHereNav').removeClass('customNavBarCSS');
                        isFixed = false;
                    }
                });
            });
<xen:comment>
            <!-- Image Slider with Buttons -->
            </script>
                <script type="text/javascript" language="javascript">
                        function displayImage(image) {
                            document.getElementById("img").src = image;
                        }
                        
                        function displayNextImage() {
                            x = (x == images.length - 1) ? 0 : x + 1;
                            displayImage(images[x]);
                        }
                        
                        function displayPreviousImage() {
                            x = (x <= 0) ? images.length - 1 : x - 1;
                            displayImage(images[x]);
                        }
                        
                        function startTimer() {
                            setInterval(displayNextImage, 1000);
                        }
                        
                        var images = [], x = -1;
                        images[0] = "https://downwithdestruction.net/img/mc/mc-category-icon.png";
                        images[1] = "https://downwithdestruction.net/img/mc/modded-mc.png";
                        images[2] = "https://downwithdestruction.net/img/gta/GTA-Online.jpg";
                        images[3] = "https://downwithdestruction.net/img/lol/league_of_legends.jpg";
                        images[4] = "https://downwithdestruction.net/img/cod/cod_view.jpg";
                </script>
            <!-- Header Slider -->
            <!-- Working Div Image Slider -->
                <script type="text/javascript" language="javascript">
                    window.onload = function () {
                        var headerslider = document.getElementById("headerslider");
                        var images = headerslider.getElementsByTagName("img");
                        for (var i = 1; i < images.length; i++) {
                            images[i].style.display = "none";
                        }
                        var counter = 1;
                        setInterval(function () {
                            for (var i = 0; i < images.length; i++) {
                                images[i].style.display = "none";
                            }
                            images[counter].style.display = "block";
                            counter++;
                            if (counter == images.length) {
                                counter = 0;
                            }
                        }, 5000);
                    };
                </script>
        
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
            <!-- Alerts Unread Fixed -->
            <script>
                function updateAlerts() 
                {
                    if ($("#hidealertsjs").val() > 0)
                        $("#hidealertsjs").show();
                    else
                        $("#hidealertsjs").hide();
                }
            </script>
            <script>
                $(function updateAlerts() {
 
                    if($('#VisitorExtraMenu_ConversationsCounter').find('span:first').html() == '0') {
                        $('#VisitorExtraMenu_ConversationsCounter').hide();
                    }
                    else {
                        $('#VisitorExtraMenu_ConversationsCounter').show();
                    }

                    if($('#VisitorExtraMenu_AlertsCounter').find('span:first').html() == '0') {
                        $('#VisitorExtraMenu_AlertsCounter').hide();
                    }
                    else {
                        $('#VisitorExtraMenu_AlertsCounter').show();
                    }
                });

                setInterval(updateAlerts(),1000);
            </script>
</xen:comment>
            <xen:comment><script async type="text/javascript" src="https://static.downwithdestruction.net/theme/js/bootstrap.min.js"></script></xen:comment>
            <!--XenForo_Require:JS-->