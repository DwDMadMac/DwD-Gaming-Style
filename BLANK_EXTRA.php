<html id="XenForo" dir="LTR" class="Public LoggedIn NoSidebar RunDeferred Responsive hasJs NoTouch HasDragDrop" xmlns:fb="https://www.facebook.com/2008/fbml" lang="en-US"><head>

        <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
		<base href="https://forums.downwithdestruction.net/">
		<script>
			var _b = document.getElementsByTagName('base')[0], _bH = "https://forums.downwithdestruction.net/";
			if (_b && _b.href != _bH) _b.href = _bH;
		</script>
	
        <link rel="stylesheet" href="css.php?css=xenforo,form,public&amp;style=16&amp;dir=LTR&amp;d=1398348854">
	

	<title>Draco25240</title>
	
	

	
	<link rel="next" href="members/draco25240.15/?page=2">
	<link rel="canonical" href="https://forums.downwithdestruction.net/members/draco25240.15/">
	<meta name="description" content="Draco25240 is a Active Member at DwD Gaming Community">
	<meta property="og:site_name" content="DwD Gaming Community">
	<meta property="og:image" content="https://forums.downwithdestruction.net/data/avatars/m/0/15.jpg?1376737952">
	<meta property="og:image" content="https://forums.downwithdestruction.net/styles/default/xenforo/logo.og.png">
	<meta property="og:type" content="profile">
	<meta property="og:url" content="https://forums.downwithdestruction.net/members/draco25240.15/">
	<meta property="og:title" content="Draco25240">
	<meta property="og:description" content="Draco25240 is a Active Member at DwD Gaming Community">
	
		<meta property="profile:username" content="Draco25240">
		<meta property="profile:gender" content="male">
	
	<meta property="fb:app_id" content="282540271877164">
	




</head>

<body>
	
        <link rel="stylesheet" href="css.php?css=Gritter,GritterEXTRA,bb_code,bbm_buttons,footer_dev,inline_mod,likes_summary,member_view,message_simple,moderator_bar,mood_display,search_results,waindigo_loginasuser,xfr_useralbums_search_result&amp;style=16&amp;dir=LTR&amp;d=1398348854">


<span id="bookmarks"></span>


<fieldset style="position: fixed; top: 0px; left: 0px; width: 1583px;" id="moderatorBar">
	<div class="pageWidth">
		<div class="pageContent">
			

	<a href="login-as-user/choice" class="OverlayTrigger">
		<span class="itemLabel">Login as User</span>
	</a>

			
			<span class="helper"></span>
		</div>
	</div>
</fieldset>

        	<script src="js/jquery/jquery-1.11.0.min.js"></script>	
		
	<script src="js/xenforo/xenforo.js?_v=b2838f31"></script>
            <!-- Profile Page image reload -->
            
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
            <script async="" type="text/javascript" src="https://downwithdestruction.net/theme/js/colour.jquery.min.js"></script>
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

            
            

	<script src="js/xenforo/quick_reply_profile.js?_v=b2838f31"></script>
	<script src="js/xenforo/comments_simple.js?_v=b2838f31"></script>
	<script src="js/xenforo/inline_mod.js?_v=b2838f31"></script>
	<script src="js/NProgress/script.js?_v=b2838f31"></script>
	<script src="js/gritter/jquery.gritter.js?_v=b2838f31"></script>
	<script src="js/gritter/notifications.js?_v=b2838f31"></script>
	<script src="js/bdTagMe/frontend.js?_v=b2838f31"></script>





	



<fieldset id="moderatorBar">
	<div class="pageWidth">
		<div class="pageContent">
                    <div style="float: left">	
                            <a href="admin.php" class="acp adminLink"><span class="itemLabel">Admin</span></a>
                            <a href="notification-center/">Notification Center</a>
                    </div>
                        <ul class="modBarRight pull-right">
                        
                            <!-- Conversations -->
                                <a href="conversations/" class="OverlayTrigger pull-right">
                                    <span id="convoIconWhite"></span>
                                    <span class="itemLabel">
                                            <strong class="itemCount Zero" id="VisitorExtraMenu_ConversationsCounter">
                                                <span class="Total">0</span>
                                            </strong>
                                    </span>
                                </a>
                            <!-- Alerts -->
                                <a href="account/alerts" class="OverlayTrigger pull-right">
                                    <span id="alertsIconWhite"></span>
                                    <span class="itemLabel>" <strong="" id="VisitorExtraMenu_AlertsCounter">
                                                <span class="Total">0</span>
                                            
                                    </span>
                                </a>
                        
                        
                            <!-- account -->
                            <li class="Popup PopupControl PopupClosed pull-right PopupContainerControl">
                                <a href="members/draco25240.15/" onclick="this.removeAttribute('href');this.className='disableAccountNavi'" class="dropdown-toggle usernameProfileLink disableAccountNavi pull-right" title="View your profile" data-toggle="dropdown" rel="Menu">
                                    <span class="itemLabel">Draco25240</span>
                                <span class="arrowWidget"></span></a>
                                    <div class="forumsTabLinks">
                                        <ul class="dropdown-menu secondaryContent blockLinksList">
                                            	
                                        </ul>
                                    </div>
                            </li>
                            <span class="helper"></span>
                    </ul>
		</div>
	</div>
</fieldset>



<div id="headerMover">
	<div id="headerProxy"></div>
            <div class="pageWidth">
<div id="GritterContainer">
		
</div>
            </div>
<div id="content" class="member_view">
	<div class="pageWidth">
		<div class="pageContent">
			<!-- main content area -->
						
						<div class="breadBoxTop ">
							
							

<nav>
	

	<fieldset style="" class="breadcrumb">
		<a href="misc/quick-navigation-menu" class="OverlayTrigger jumpMenuTrigger" data-cacheoverlay="true" title="Open quick navigation"><!--Jump to...--></a>
			
		<div class="boardTitle"><strong>DwD Gaming Community</strong></div>
		
		<span class="crumbs">
                    
			
			
				<span class="crust selectedTabCrumb" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="https://forums.downwithdestruction.net/members/" class="crumb" rel="up" itemprop="url"><span itemprop="title">Members</span></a>
					<span class="arrow"><span>&gt;</span></span>
				</span>
			
			
			
		</span>
	</fieldset>
</nav>
						</div>
						
						
						
					
						<!--[if lt IE 8]>
							<p class="importantMessage">You are using an out of date browser. It  may not display this or other websites correctly.<br />You should upgrade or use an <a href="https://www.google.com/chrome" target="_blank">alternative browser</a>.</p>
						<![endif]-->
						
						
						
						
                                                
						
						
						<!-- main template -->
						
 




	







<div class="profilePage" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">

            <div class="CoverPhotoBelowBlock">
		
			
				<div class="section leftblock">
					<h3 class="subHeading textWithCount" title="Draco25240 is following 5 members.">
						<span class="text">Following</span>
						<a href="members/draco25240.15/following" class="count OverlayTrigger">5</a>
					</h3>
					<div class="primaryContent avatarHeap">
						<ol>
						
							<li>
								<a href="members/dwd_madmac.1/" class="avatar Av1s Tooltip" itemprop="contact" data-avatarhtml="true"><span class="img s" style="background-image: url('https://forums.downwithdestruction.net/data/avatars/s/0/1.jpg?1376880709')">DwD_MadMac</span></a>
							</li>
						
							<li>
								<a href="members/trudan.3/" class="avatar Av3s Tooltip" itemprop="contact" data-avatarhtml="true"><span class="img s" style="background-image: url('https://secure.gravatar.com/avatar/0ddef39e6c51cfdb85db95a6afbb0514?s=48&amp;d=https%3A%2F%2Fforums.downwithdestruction.net%2Fstyles%2Fdefault%2Fxenforo%2Favatars%2Favatar_male_s.png')">TruDan</span></a>
							</li>
						
							<li>
								<a href="members/maximumride.30/" class="avatar Av30s Tooltip" itemprop="contact" data-avatarhtml="true"><span class="img s" style="background-image: url('https://forums.downwithdestruction.net/data/avatars/s/0/30.jpg?1376852450')">MaximumRide</span></a>
							</li>
						
							<li>
								<a href="members/lordnavarre.41/" class="avatar Av41s Tooltip" itemprop="contact" data-avatarhtml="true"><span class="img s" style="background-image: url('https://forums.downwithdestruction.net/data/avatars/s/0/41.jpg?1377214875')">LordNavarre</span></a>
							</li>
						
							<li>
								<a href="members/flashaface.223/" class="avatar Av223s Tooltip" itemprop="contact" data-avatarhtml="true"><span class="img s" style="background-image: url('https://forums.downwithdestruction.net/data/avatars/s/0/223.jpg?1392559196')">FlashaFace</span></a>
							</li>
						
						</ol>
					</div>
					
				</div>
			

			
				<div class="section rightblock">
					<h3 class="subHeading textWithCount" title="Draco25240 is being followed by 8 members.">
						<span class="text">Followers</span>
						<a href="members/draco25240.15/followers" class="count OverlayTrigger">8</a>
					</h3>
					<div class="primaryContent avatarHeap">
						<ol>
						
							<li>
								<a href="members/trudan.3/" class="avatar Av3s Tooltip" itemprop="contact" data-avatarhtml="true"><span class="img s" style="background-image: url('https://secure.gravatar.com/avatar/0ddef39e6c51cfdb85db95a6afbb0514?s=48&amp;d=https%3A%2F%2Fforums.downwithdestruction.net%2Fstyles%2Fdefault%2Fxenforo%2Favatars%2Favatar_male_s.png')">TruDan</span></a>
							</li>
						
							<li>
								<a href="members/dwd_madmac.1/" class="avatar Av1s Tooltip" itemprop="contact" data-avatarhtml="true"><span class="img s" style="background-image: url('https://forums.downwithdestruction.net/data/avatars/s/0/1.jpg?1376880709')">DwD_MadMac</span></a>
							</li>
						
							<li>
								<a href="members/kevinprime.37/" class="avatar Av37s Tooltip" itemprop="contact" data-avatarhtml="true"><span class="img s" style="background-image: url('https://forums.downwithdestruction.net/data/avatars/s/0/37.jpg?1378926272')">kevinprime</span></a>
							</li>
						
							<li>
								<a href="members/sam9801.17/" class="avatar Av17s Tooltip" itemprop="contact" data-avatarhtml="true"><span class="img s" style="background-image: url('https://secure.gravatar.com/avatar/6e5a571e8553ec684f50488e805fcadb?s=48&amp;d=https%3A%2F%2Fforums.downwithdestruction.net%2Fstyles%2Fdefault%2Fxenforo%2Favatars%2Favatar_male_s.png')">Sam9801</span></a>
							</li>
						
							<li>
								<a href="members/maximumride.30/" class="avatar Av30s Tooltip" itemprop="contact" data-avatarhtml="true"><span class="img s" style="background-image: url('https://forums.downwithdestruction.net/data/avatars/s/0/30.jpg?1376852450')">MaximumRide</span></a>
							</li>
						
							<li>
								<a href="members/flashaface.223/" class="avatar Av223s Tooltip" itemprop="contact" data-avatarhtml="true"><span class="img s" style="background-image: url('https://forums.downwithdestruction.net/data/avatars/s/0/223.jpg?1392559196')">FlashaFace</span></a>
							</li>
						
						</ol>
					</div>
					
						<div class="sectionFooter"><a href="members/draco25240.15/followers" class="OverlayTrigger">Show All</a></div>
					
				</div>
			
		
            </div>
	<div class="profilePageTopBlock">
            <div class="profileInfoWrapper">
                <div class="avatarBlockWrapper">
                    <div class="avatarScaler">
                        
                            <a class="Av15l OverlayTrigger" href="account/avatar">
                                <img src="https://forums.downwithdestruction.net/data/avatars/l/0/15.jpg?1376737952" alt="Draco25240" style="left: -10px; top: 0px; " itemprop="photo">
                                    <h1 itemprop="name" class="username">Draco25240</h1>
                                
                            </a>
                        
                    </div>
                </div>
                <div class="profileInfoBlockwrapper">
                    
                    
                        <div class="userBanners">
                            <em class="rank-container community-admin " itemprop="title"><span class="before"></span><strong>Community Admin</strong><span class="after"></span></em>
<em class="rank-container wiki-developer " itemprop="title"><span class="before"></span><strong>Wiki Developer</strong><span class="after"></span></em>
<em class="rank-container mc-network-admin " itemprop="title"><span class="before"></span><strong>MC Network Admin</strong><span class="after"></span></em>
<em class="rank-container mc-network-elite " itemprop="title"><span class="before"></span><strong>MC Network Elite</strong><span class="after"></span></em>
<em class="rank-container community-member " itemprop="title"><span class="before"></span><strong>Community Member</strong><span class="after"></span></em>
                        </div>
                    
                    <div class="userLinks">
                        
	

	

	<div class="userMood">
		
			<a href="moods/mood-chooser?redirect=%2Fmembers%2Fdraco25240.15%2F" class="OverlayTrigger Tooltip" data-cacheoverlay="false" data-offsety="-8">
				<img src="styles/default/xenmoods/Depressed.png" alt="Depressed">
			</a>
		
	</div>

                            
                        
                    </div>
                    
                        <dl class="pairsInline lastActivity">
                            <dt>Draco25240 was last seen:</dt>
                            <dd>
                                
                                    
                                        Viewing category,
                                    
                                    <abbr title="Apr 24, 2014 at 4:47 PM" class="DateTime muted" data-time="1398350833" data-diff="788" data-datestring="Apr 24, 2014" data-timestring="4:47 PM">13 minutes ago</abbr>
                                
                            </dd>
                        </dl>
                    
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="profileCoverPhoto">
                
                    
                        <div class="changeCoverPhoto button">
                            <a href="account/alert-preferences" class="button">Change Cover Photo</a>
                        </div>
                        <img src="http://i.imgur.com/DqEf9pZ.jpg" style="max-width: 100%;min-width: 100%;max-height: 450px;min-height: 450px;">
                    
                
            </div>
        </div>
    
        <div class="belowCoverPhotoBlock">
            <div class="overviewTopBlocks">
                
                    <div class="section profileAboutContent">
                        <h3 class="textHeading">General</h3>
                        <div class="primaryContent">
                            
                                
                                    <div class="pairsColumns aboutPairs">
                                    
                                        
                                        
                                            <dl><dt>Gender:</dt>
                                                <dd itemprop="gender">Male</dd></dl>
                                        
                                        
                                            <dl><dt>Birthday:</dt>
                                                <dd><span class="dob" itemprop="dob">Jun 25, 1997</span> <span class="age">(Age: 16)</span></dd></dl>
                                        
                                        
                                            <dl><dt>Home page:</dt>
                                                <dd><a href="https://www.youtube.com/user/Draco25240" rel="nofollow" target="_blank" itemprop="url">https://www.youtube.com/user/Draco25240</a></dd></dl>
                                        
                                        
                                            <dl><dt>Location:</dt>
                                                <dd><a href="misc/location-info?location=Norway" rel="nofollow" target="_blank" itemprop="address">Norway</a></dd></dl>
                                        
                                        
                                            <dl><dt>Occupation:</dt>
                                                <dd itemprop="role">Student (studying to become an Engineer)</dd></dl>
                                        
                                        <dl><dt>Joined:</dt>
                                                <dd>Aug 17, 2013</dd></dl>

                                        <dl><dt>Messages:</dt>
                                                <dd>139</dd></dl>

                                        <dl><dt>Trophy Points:</dt>
                                                <dd><a href="members/draco25240.15/trophies" class="OverlayTrigger">34</a></dd></dl>

                                        
                                                <dl><dt>Warning Points:</dt><dd>0</dd></dl>
                                        

                                        
                                                <dl><dt>Last Activity:</dt>
                                                        <dd><abbr title="Apr 24, 2014 at 4:47 PM" class="DateTime" data-time="1398350833" data-diff="788" data-datestring="Apr 24, 2014" data-timestring="4:47 PM">13 minutes ago</abbr></dd></dl>
                                        
                                    
                                    </div>
                                
                                <div class="baseHtml ugc">Joined first time: 1st August 2011 <br>
<b><span style="color: #00b300">[</span><span style="color: #404040">Member</span><span style="color: #00b300">]</span></b> achieved: 2nd August 2011 (Member Application accepted by <a href="https://forums.downwithdestruction.net/members/5/" class="username" data-user="5, Hollow/H0II0W">Hollow/H0II0W</a>)<br>
<b><span style="color: #00b300"><span style="color: #808080"><span style="color: #00b300">[</span><span style="color: #404040">Regular</span></span>]</span></b> achieved: 28th December 2011 (promoted by <a href="https://forums.downwithdestruction.net/members/6/" class="username" data-user="6, ArisHC">ArisHC</a>)<br>
<b><span style="color: #00b300">[</span><span style="color: #404040">Trustie</span><span style="color: #00b300">]</span></b> achieved: ~19th July 2013 (promoted by <a href="https://forums.downwithdestruction.net/members/1/" class="username" data-user="1, DwD_MadMac">DwD_MadMac</a>)<br>
<b><span style="color: #404040">[</span><span style="color: #00b300">Elite</span><span style="color: #404040">]</span></b> achieved: ~22th August 2013 (promoted by <a href="https://forums.downwithdestruction.net/members/3/" class="username" data-user="3, TruDan">TruDan</a>)<br>
<b><span style="color: #404040">[</span><span style="color: #ff4d4d">Mod</span><span style="color: #404040">]</span></b> achieved: 22nd September 2013 (promotion suggested by <a href="https://forums.downwithdestruction.net/members/41/" class="username" data-user="41, LordNavarre">LordNavarre</a>)<br>
<b><span style="color: #404040">[</span><span style="color: #ff0000">Admin</span><span style="color: #404040">]</span> </b>achieved: 1st March 2014 (promoted by <a href="https://forums.downwithdestruction.net/members/3/" class="username" data-user="3, TruDan">TruDan</a>)</div>
                            
                        </div>
                    </div>
                
                <div class="section profileInteractContent">
                        <h3 class="textHeading">Social</h3>

                        <div class="primaryContent">
                                <div class="pairsColumns contactInfo">
                                        <dl>
                                                <dt>Content:</dt>
                                                <dd><ul>
                                                        
                                                        <li><a href="search/member?user_id=15" rel="nofollow">Find all content by Draco25240</a></li>
                                                        <li><a href="search/member?user_id=15&amp;content=thread" rel="nofollow">Find all threads by Draco25240</a></li>
                                                        
                                                </ul></dd>
                                        </dl>
                                        
                                        
                                </div>
                        </div>
                </div>
            </div>
        </div>
	<div class="mainProfileColumn">
		<div class="section primaryUserBlock">
			<ul class="tabs mainTabs Tabs" data-panes="#ProfilePanes > li" data-history="on">
				<li class="active"><a class="active" href="/members/draco25240.15/#profilePosts">Profile Posts</a></li>
				
                                    <li><a href="/members/draco25240.15/#recentActivity">Recent Activity</a></li>
                                
				<li><a href="/members/draco25240.15/#postings">Postings</a></li>
				<li><a href="/members/draco25240.15/#info">Signature</a></li>
				
				
<li><a href="/members/draco25240.15/#resources">Resources</a></li>

<li><a href="members/draco25240.15/#useralbums">Albums</a></li>

	<li><a href="/members/draco25240.15/#social-forums">Kingdom Forums</a></li>

			</ul>
		</div>

		<ul id="ProfilePanes">
			<li style="display: list-item;" id="profilePosts" class="profileContent">
			
				

				
					<form action="members/draco25240.15/post" method="post" class="messageSimple profilePoster AutoValidator primaryContent" id="ProfilePoster" data-optinout="optIn">
						<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
						<div class="messageInfo">
							
								<textarea autocomplete="off" name="message" class="textCtrl StatusEditor UserTagger Elastic" placeholder="Update your status..." rows="3" cols="50" data-statuseditorcounter="#statusEditorCounter"></textarea>
							
							<div class="submitUnit">
								<span class="statusEditorCounter" id="statusEditorCounter" title="Characters remaining">140</span>
								<input class="button primary" value="Post" accesskey="s" type="submit">
								<input name="_xfToken" value="15,1398351621,7c86231a4d0853d4b538ab5866818b93293fb0f7" type="hidden">
							</div>
						</div>
					</form>
				
				
				

				<form action="inline-mod/profile-post/switch" method="post" class="InlineModForm section" data-cookiename="profilePosts" data-controls="#InlineModControls" data-imodoptions="#ModerationSelect option">

					<ol class="messageSimpleList" id="ProfilePostList">
						
							
								
									




<li id="profile-post-674" class="primaryContent messageSimple" data-author="FlashaFace">

	<a href="members/flashaface.223/" class="avatar Av223s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/223.jpg?1392559196" alt="FlashaFace" height="48" width="48"></a>
	
	<div class="messageInfo">
		
		

		<div class="messageContent">
			<a title="" href="members/flashaface.223/" class="username poster PreviewTooltip" data-previewurl="members/flashaface.223/preview">FlashaFace</a>
			<article><blockquote class="ugc baseHtml">Dont be sad, being sad is bad, and being bad not rad. Be happy, and dream of rainbows, unicorns, butterflies, flying butter, koalas, narwals, dolphins and FOOD! Food is good, and good puts you in a good mood, and stuff...</blockquote></article>
		</div>

		

		<div class="messageMeta">
				<div class="privateControls">
					<input name="profilePosts[]" value="674" class="InlineModCheck item" data-target="#profile-post-674" type="checkbox">
					<a href="profile-posts/674/" title="Permalink" class="item muted"><span class="DateTime" title="Mar 9, 2014 at 5:27 PM">Mar 9, 2014</span></a>
					
					
						<a href="profile-posts/674/edit" class="OverlayTrigger item control edit"><span></span>Edit</a>
					
					
						<a href="profile-posts/674/delete" class="item OverlayTrigger control delete"><span></span>Delete</a>
					
					
					
						<a href="profile-posts/674/ip" class="item control ip OverlayTrigger"><span></span>IP</a>
					
					
					
						<a href="members/flashaface.223/warn?content_type=profile_post&amp;content_id=674" class="item control warn"><span></span>Warn</a>
					
					
						<a href="profile-posts/674/report" class="OverlayTrigger item control report" data-cacheoverlay="false"><span></span>Report</a>
					
					
					<a href="bookmarks/?type=profile_post&amp;id=674" class="OverlayTrigger item control bookmarks"><span></span>Bookmark</a>
				</div>
			
				<div class="publicControls">
				
					
					
						<a href="profile-posts/674/like" class="LikeLink item control like" data-container="#likes-wp-674"><span></span><span class="LikeLabel">Unlike</span></a>
					
					
						<a href="profile-posts/674/comment" class="CommentPoster item control postComment" data-commentarea="#commentSubmit-674"><span></span>Comment</a>
					
					
				
				</div>
			
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-674">
				
					
	
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			You like this.
		</span>
	</div>

				
			</li>

			

			
				<li id="commentSubmit-674" class="comment secondaryContent" style="display:none">
					<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
					<div class="elements">
						<textarea autocomplete="off" name="message" rows="2" class="textCtrl UserTagger Elastic"></textarea>
						<div class="submit"><input class="button primary" value="Post Comment" type="submit"></div>
					</div>
				</li>
			

		</ol>

	
	</div>
</li>


								
							
								
									




<li id="profile-post-673" class="primaryContent messageSimple  staff" data-author="LordNavarre">

	<a href="members/lordnavarre.41/" class="avatar Av41s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/41.jpg?1377214875" alt="LordNavarre" height="48" width="48"></a>
	
	<div class="messageInfo">
		
		

		<div class="messageContent">
			<a title="" href="members/lordnavarre.41/" class="username poster PreviewTooltip" data-previewurl="members/lordnavarre.41/preview">LordNavarre</a>
			<article><blockquote class="ugc baseHtml">Also when she is talking make sure that you are a good listener, not one to offer advice but a real listener. Best to you my friend!</blockquote></article>
		</div>

		

		<div class="messageMeta">
				<div class="privateControls">
					<input name="profilePosts[]" value="673" class="InlineModCheck item" data-target="#profile-post-673" type="checkbox">
					<a href="profile-posts/673/" title="Permalink" class="item muted"><span class="DateTime" title="Mar 9, 2014 at 4:50 PM">Mar 9, 2014</span></a>
					
					
						<a href="profile-posts/673/edit" class="OverlayTrigger item control edit"><span></span>Edit</a>
					
					
						<a href="profile-posts/673/delete" class="item OverlayTrigger control delete"><span></span>Delete</a>
					
					
					
						<a href="profile-posts/673/ip" class="item control ip OverlayTrigger"><span></span>IP</a>
					
					
					
						<a href="members/lordnavarre.41/warn?content_type=profile_post&amp;content_id=673" class="item control warn"><span></span>Warn</a>
					
					
						<a href="profile-posts/673/report" class="OverlayTrigger item control report" data-cacheoverlay="false"><span></span>Report</a>
					
					
					<a href="bookmarks/?type=profile_post&amp;id=673" class="OverlayTrigger item control bookmarks"><span></span>Bookmark</a>
				</div>
			
				<div class="publicControls">
				
					
					
						<a href="profile-posts/673/like" class="LikeLink item control like" data-container="#likes-wp-673"><span></span><span class="LikeLabel">Like</span></a>
					
					
						<a href="profile-posts/673/comment" class="CommentPoster item control postComment" data-commentarea="#commentSubmit-673"><span></span>Comment</a>
					
					
				
				</div>
			
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-673">
				
			</li>

			

			
				<li id="commentSubmit-673" class="comment secondaryContent" style="display:none">
					<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
					<div class="elements">
						<textarea autocomplete="off" name="message" rows="2" class="textCtrl UserTagger Elastic"></textarea>
						<div class="submit"><input class="button primary" value="Post Comment" type="submit"></div>
					</div>
				</li>
			

		</ol>

	
	</div>
</li>


								
							
								
									




<li id="profile-post-672" class="primaryContent messageSimple  staff" data-author="LordNavarre">

	<a href="members/lordnavarre.41/" class="avatar Av41s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/41.jpg?1377214875" alt="LordNavarre" height="48" width="48"></a>
	
	<div class="messageInfo">
		
		

		<div class="messageContent">
			<a title="" href="members/lordnavarre.41/" class="username poster PreviewTooltip" data-previewurl="members/lordnavarre.41/preview">LordNavarre</a>
			<article><blockquote class="ugc baseHtml">So.. Cheer up! be confident, be just you in all your glory, happy confident, outgoing, POSITIVE and it will be a lot easier! When meeting a new girl always have an ice breaker, something to open and start the conversation. As early as possible get the woman talking about herself and what she likes, she will see you as easy to talk to and she will go for that.</blockquote></article>
		</div>

		

		<div class="messageMeta">
				<div class="privateControls">
					<input name="profilePosts[]" value="672" class="InlineModCheck item" data-target="#profile-post-672" type="checkbox">
					<a href="profile-posts/672/" title="Permalink" class="item muted"><span class="DateTime" title="Mar 9, 2014 at 4:50 PM">Mar 9, 2014</span></a>
					
					
						<a href="profile-posts/672/edit" class="OverlayTrigger item control edit"><span></span>Edit</a>
					
					
						<a href="profile-posts/672/delete" class="item OverlayTrigger control delete"><span></span>Delete</a>
					
					
					
						<a href="profile-posts/672/ip" class="item control ip OverlayTrigger"><span></span>IP</a>
					
					
					
						<a href="members/lordnavarre.41/warn?content_type=profile_post&amp;content_id=672" class="item control warn"><span></span>Warn</a>
					
					
						<a href="profile-posts/672/report" class="OverlayTrigger item control report" data-cacheoverlay="false"><span></span>Report</a>
					
					
					<a href="bookmarks/?type=profile_post&amp;id=672" class="OverlayTrigger item control bookmarks"><span></span>Bookmark</a>
				</div>
			
				<div class="publicControls">
				
					
					
						<a href="profile-posts/672/like" class="LikeLink item control like" data-container="#likes-wp-672"><span></span><span class="LikeLabel">Like</span></a>
					
					
						<a href="profile-posts/672/comment" class="CommentPoster item control postComment" data-commentarea="#commentSubmit-672"><span></span>Comment</a>
					
					
				
				</div>
			
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-672">
				
			</li>

			

			
				<li id="commentSubmit-672" class="comment secondaryContent" style="display:none">
					<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
					<div class="elements">
						<textarea autocomplete="off" name="message" rows="2" class="textCtrl UserTagger Elastic"></textarea>
						<div class="submit"><input class="button primary" value="Post Comment" type="submit"></div>
					</div>
				</li>
			

		</ol>

	
	</div>
</li>


								
							
								
									




<li id="profile-post-671" class="primaryContent messageSimple  staff" data-author="LordNavarre">

	<a href="members/lordnavarre.41/" class="avatar Av41s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/41.jpg?1377214875" alt="LordNavarre" height="48" width="48"></a>
	
	<div class="messageInfo">
		
		

		<div class="messageContent">
			<a title="" href="members/lordnavarre.41/" class="username poster PreviewTooltip" data-previewurl="members/lordnavarre.41/preview">LordNavarre</a>
			<article><blockquote class="ugc baseHtml">Don't give up, just realize that when ever a guy is looking for a girlfriend he will never get one. Women are attracted to confident guys, who are outgoing and appear like<br>
the Alpha Male. When a guy is down and appears out of control women can sense that a billion miles away and guess what, you are never going to get a girlfriend that way.</blockquote></article>
		</div>

		

		<div class="messageMeta">
				<div class="privateControls">
					<input name="profilePosts[]" value="671" class="InlineModCheck item" data-target="#profile-post-671" type="checkbox">
					<a href="profile-posts/671/" title="Permalink" class="item muted"><span class="DateTime" title="Mar 9, 2014 at 4:49 PM">Mar 9, 2014</span></a>
					
					
						<a href="profile-posts/671/edit" class="OverlayTrigger item control edit"><span></span>Edit</a>
					
					
						<a href="profile-posts/671/delete" class="item OverlayTrigger control delete"><span></span>Delete</a>
					
					
					
						<a href="profile-posts/671/ip" class="item control ip OverlayTrigger"><span></span>IP</a>
					
					
					
						<a href="members/lordnavarre.41/warn?content_type=profile_post&amp;content_id=671" class="item control warn"><span></span>Warn</a>
					
					
						<a href="profile-posts/671/report" class="OverlayTrigger item control report" data-cacheoverlay="false"><span></span>Report</a>
					
					
					<a href="bookmarks/?type=profile_post&amp;id=671" class="OverlayTrigger item control bookmarks"><span></span>Bookmark</a>
				</div>
			
				<div class="publicControls">
				
					
					
						<a href="profile-posts/671/like" class="LikeLink item control like" data-container="#likes-wp-671"><span></span><span class="LikeLabel">Like</span></a>
					
					
						<a href="profile-posts/671/comment" class="CommentPoster item control postComment" data-commentarea="#commentSubmit-671"><span></span>Comment</a>
					
					
				
				</div>
			
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-671">
				
			</li>

			

				

				
					

<li class="comment secondaryContent ">
	<a href="members/flashaface.223/" class="avatar Av223s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/223.jpg?1392559196" alt="FlashaFace" height="48" width="48"></a>

	<div class="commentInfo">
		<div class="commentContent">
			<a title="" href="members/flashaface.223/" class="username poster PreviewTooltip" data-previewurl="members/flashaface.223/preview">FlashaFace</a>
			<article><blockquote>sweet advice bro</blockquote></article>
		</div>
		<div class="commentControls">
			<span class="DateTime muted" title="Mar 9, 2014 at 5:27 PM">Mar 9, 2014</span>
			<a href="profile-posts/671/comment-delete?comment=395" class="OverlayTrigger item control delete"><span></span>Delete</a>
		</div>
	</div>
</li>
				
					

<li class="comment secondaryContent ">
	<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>

	<div class="commentInfo">
		<div class="commentContent">
			<a title="" href="members/draco25240.15/" class="username poster PreviewTooltip" data-previewurl="members/draco25240.15/preview">Draco25240</a>
			<article><blockquote>Thanks, only problem is that I've tried that already, many times, and nothing ever changes. I'm always ignored by them, I always have been, no matter what I try :/</blockquote></article>
		</div>
		<div class="commentControls">
			<span class="DateTime muted" title="Mar 10, 2014 at 8:58 AM">Mar 10, 2014</span>
			<a href="profile-posts/671/comment-delete?comment=396" class="OverlayTrigger item control delete"><span></span>Delete</a>
		</div>
	</div>
</li>
				
					

<li class="comment secondaryContent ">
	<a href="members/lordnavarre.41/" class="avatar Av41s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/41.jpg?1377214875" alt="LordNavarre" height="48" width="48"></a>

	<div class="commentInfo">
		<div class="commentContent">
			<a title="" href="members/lordnavarre.41/" class="username poster PreviewTooltip" data-previewurl="members/lordnavarre.41/preview">LordNavarre</a>
			<article><blockquote>Gotta make some noise! then :P Stand in the halls and make your love known! Scream and shout it to the world!!!<br>
or ask her out.. whatever works :)</blockquote></article>
		</div>
		<div class="commentControls">
			<span class="DateTime muted" title="Mar 12, 2014 at 5:14 PM">Mar 12, 2014</span>
			<a href="profile-posts/671/comment-delete?comment=397" class="OverlayTrigger item control delete"><span></span>Delete</a>
		</div>
	</div>
</li>
				

			

			
				<li id="commentSubmit-671" class="comment secondaryContent" style="display:none">
					<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
					<div class="elements">
						<textarea autocomplete="off" name="message" rows="2" class="textCtrl UserTagger Elastic"></textarea>
						<div class="submit"><input class="button primary" value="Post Comment" type="submit"></div>
					</div>
				</li>
			

		</ol>

	
	</div>
</li>


								
							
								
									




<li id="profile-post-663" class="primaryContent messageSimple  staff" data-author="Draco25240">

	<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
	
	<div class="messageInfo">
		
		

		<div class="messageContent">
			<a title="" href="members/draco25240.15/" class="username poster PreviewTooltip" data-previewurl="members/draco25240.15/preview">Draco25240</a>
			<article><blockquote class="ugc baseHtml">Okay, that's it, it's official, I give up, I've lost all hope there is of ever getting a girlfriend :'/</blockquote></article>
		</div>

		

		<div class="messageMeta">
				<div class="privateControls">
					<input name="profilePosts[]" value="663" class="InlineModCheck item" data-target="#profile-post-663" type="checkbox">
					<a href="profile-posts/663/" title="Permalink" class="item muted"><span class="DateTime" title="Mar 5, 2014 at 9:28 AM">Mar 5, 2014</span></a>
					
					
						<a href="profile-posts/663/edit" class="OverlayTrigger item control edit"><span></span>Edit</a>
					
					
						<a href="profile-posts/663/delete" class="item OverlayTrigger control delete"><span></span>Delete</a>
					
					
					
						<a href="profile-posts/663/ip" class="item control ip OverlayTrigger"><span></span>IP</a>
					
					
					
						<a href="members/draco25240.15/warn?content_type=profile_post&amp;content_id=663" class="item control warn"><span></span>Warn</a>
					
					
						<a href="profile-posts/663/report" class="OverlayTrigger item control report" data-cacheoverlay="false"><span></span>Report</a>
					
					
					<a href="bookmarks/?type=profile_post&amp;id=663" class="OverlayTrigger item control bookmarks"><span></span>Bookmark</a>
				</div>
			
				<div class="publicControls">
				
					
					
					
						<a href="profile-posts/663/comment" class="CommentPoster item control postComment" data-commentarea="#commentSubmit-663"><span></span>Comment</a>
					
					
				
				</div>
			
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-663">
				
			</li>

			

			
				<li id="commentSubmit-663" class="comment secondaryContent" style="display:none">
					<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
					<div class="elements">
						<textarea autocomplete="off" name="message" rows="2" class="textCtrl UserTagger Elastic"></textarea>
						<div class="submit"><input class="button primary" value="Post Comment" type="submit"></div>
					</div>
				</li>
			

		</ol>

	
	</div>
</li>


								
							
								
									




<li id="profile-post-638" class="primaryContent messageSimple  staff" data-author="Draco25240">

	<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
	
	<div class="messageInfo">
		
		

		<div class="messageContent">
			<a title="" href="members/draco25240.15/" class="username poster PreviewTooltip" data-previewurl="members/draco25240.15/preview">Draco25240</a>
			<article><blockquote class="ugc baseHtml">New milestone reached, I just hit 100 posts \o/</blockquote></article>
		</div>

		

		<div class="messageMeta">
				<div class="privateControls">
					<input name="profilePosts[]" value="638" class="InlineModCheck item" data-target="#profile-post-638" type="checkbox">
					<a href="profile-posts/638/" title="Permalink" class="item muted"><span class="DateTime" title="Feb 14, 2014 at 12:41 PM">Feb 14, 2014</span></a>
					
					
						<a href="profile-posts/638/edit" class="OverlayTrigger item control edit"><span></span>Edit</a>
					
					
						<a href="profile-posts/638/delete" class="item OverlayTrigger control delete"><span></span>Delete</a>
					
					
					
						<a href="profile-posts/638/ip" class="item control ip OverlayTrigger"><span></span>IP</a>
					
					
					
						<a href="members/draco25240.15/warn?content_type=profile_post&amp;content_id=638" class="item control warn"><span></span>Warn</a>
					
					
						<a href="profile-posts/638/report" class="OverlayTrigger item control report" data-cacheoverlay="false"><span></span>Report</a>
					
					
					<a href="bookmarks/?type=profile_post&amp;id=638" class="OverlayTrigger item control bookmarks"><span></span>Bookmark</a>
				</div>
			
				<div class="publicControls">
				
					
					
					
						<a href="profile-posts/638/comment" class="CommentPoster item control postComment" data-commentarea="#commentSubmit-638"><span></span>Comment</a>
					
					
				
				</div>
			
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-638">
				
			</li>

			

			
				<li id="commentSubmit-638" class="comment secondaryContent" style="display:none">
					<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
					<div class="elements">
						<textarea autocomplete="off" name="message" rows="2" class="textCtrl UserTagger Elastic"></textarea>
						<div class="submit"><input class="button primary" value="Post Comment" type="submit"></div>
					</div>
				</li>
			

		</ol>

	
	</div>
</li>


								
							
								
									




<li id="profile-post-636" class="primaryContent messageSimple  staff" data-author="Draco25240">

	<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
	
	<div class="messageInfo">
		
		

		<div class="messageContent">
			<a title="" href="members/draco25240.15/" class="username poster PreviewTooltip" data-previewurl="members/draco25240.15/preview">Draco25240</a>
			<article><blockquote class="ugc baseHtml">Read ---&gt; <a href="http://forums.downwithdestruction.net/threads/creative-world.292/" rel="nofollow" class="internalLink">http://forums.downwithdestruction.net/threads/creative-world.292/</a></blockquote></article>
		</div>

		

		<div class="messageMeta">
				<div class="privateControls">
					<input name="profilePosts[]" value="636" class="InlineModCheck item" data-target="#profile-post-636" type="checkbox">
					<a href="profile-posts/636/" title="Permalink" class="item muted"><span class="DateTime" title="Feb 11, 2014 at 11:31 PM">Feb 11, 2014</span></a>
					
					
						<a href="profile-posts/636/edit" class="OverlayTrigger item control edit"><span></span>Edit</a>
					
					
						<a href="profile-posts/636/delete" class="item OverlayTrigger control delete"><span></span>Delete</a>
					
					
					
						<a href="profile-posts/636/ip" class="item control ip OverlayTrigger"><span></span>IP</a>
					
					
					
						<a href="members/draco25240.15/warn?content_type=profile_post&amp;content_id=636" class="item control warn"><span></span>Warn</a>
					
					
						<a href="profile-posts/636/report" class="OverlayTrigger item control report" data-cacheoverlay="false"><span></span>Report</a>
					
					
					<a href="bookmarks/?type=profile_post&amp;id=636" class="OverlayTrigger item control bookmarks"><span></span>Bookmark</a>
				</div>
			
				<div class="publicControls">
				
					
					
					
						<a href="profile-posts/636/comment" class="CommentPoster item control postComment" data-commentarea="#commentSubmit-636"><span></span>Comment</a>
					
					
				
				</div>
			
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-636">
				
			</li>

			

			
				<li id="commentSubmit-636" class="comment secondaryContent" style="display:none">
					<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
					<div class="elements">
						<textarea autocomplete="off" name="message" rows="2" class="textCtrl UserTagger Elastic"></textarea>
						<div class="submit"><input class="button primary" value="Post Comment" type="submit"></div>
					</div>
				</li>
			

		</ol>

	
	</div>
</li>


								
							
								
									




<li id="profile-post-536" class="primaryContent messageSimple  staff" data-author="Draco25240">

	<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
	
	<div class="messageInfo">
		
		

		<div class="messageContent">
			<a title="" href="members/draco25240.15/" class="username poster PreviewTooltip" data-previewurl="members/draco25240.15/preview">Draco25240</a>
			<article><blockquote class="ugc baseHtml">Merry Christmas Everyone! :)</blockquote></article>
		</div>

		

		<div class="messageMeta">
				<div class="privateControls">
					<input name="profilePosts[]" value="536" class="InlineModCheck item" data-target="#profile-post-536" type="checkbox">
					<a href="profile-posts/536/" title="Permalink" class="item muted"><span class="DateTime" title="Dec 24, 2013 at 10:25 AM">Dec 24, 2013</span></a>
					
					
						<a href="profile-posts/536/edit" class="OverlayTrigger item control edit"><span></span>Edit</a>
					
					
						<a href="profile-posts/536/delete" class="item OverlayTrigger control delete"><span></span>Delete</a>
					
					
					
						<a href="profile-posts/536/ip" class="item control ip OverlayTrigger"><span></span>IP</a>
					
					
					
						<a href="members/draco25240.15/warn?content_type=profile_post&amp;content_id=536" class="item control warn"><span></span>Warn</a>
					
					
						<a href="profile-posts/536/report" class="OverlayTrigger item control report" data-cacheoverlay="false"><span></span>Report</a>
					
					
					<a href="bookmarks/?type=profile_post&amp;id=536" class="OverlayTrigger item control bookmarks"><span></span>Bookmark</a>
				</div>
			
				<div class="publicControls">
				
					
					
					
						<a href="profile-posts/536/comment" class="CommentPoster item control postComment" data-commentarea="#commentSubmit-536"><span></span>Comment</a>
					
					
				
				</div>
			
		</div>

		<ol class="messageResponse">

			<li id="likes-wp-536">
				
			</li>

			

			
				<li id="commentSubmit-536" class="comment secondaryContent" style="display:none">
					<a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
					<div class="elements">
						<textarea autocomplete="off" name="message" rows="2" class="textCtrl UserTagger Elastic"></textarea>
						<div class="submit"><input class="button primary" value="Post Comment" type="submit"></div>
					</div>
				</li>
			

		</ol>

	
	</div>
</li>


								
							
						
					</ol>

					
						
					

					<div class="pageNavLinkGroup">
						<div class="linkGroup SelectionCountContainer"><a href="#" class="SelectionCount cloned">Selected Posts: <em class="InlineModCheckedTotal">0</em></a></div>
						<div class="linkGroup" style="display: none"><a href="javascript:" class="muted JsOnly DisplayIgnoredContent Tooltip">Show Ignored Content</a></div>
						


<div class="PageNav" data-page="1" data-range="2" data-start="2" data-end="2" data-last="3" data-sentinel="{{sentinel}}" data-baseurl="members/draco25240.15/?page=%7B%7Bsentinel%7D%7D">
	
	<span class="pageNavHeader">Page 1 of 3</span>
	
	<nav>
		
		
		<a href="members/draco25240.15/" class="currentPage " rel="start">1</a>
		
		
		
		
			<a href="members/draco25240.15/?page=2" class="">2</a>
		
		
		
		
		<a href="members/draco25240.15/?page=3" class="">3</a>
		
		
			<a href="members/draco25240.15/?page=2" class="text">Next &gt;</a>
			
		
	</nav>	
	
	
</div>

					</div>

					<input name="_xfToken" value="15,1398351621,7c86231a4d0853d4b538ab5866818b93293fb0f7" type="hidden">
				</form>

			

			</li>

			
			<li style="display: none;" id="recentActivity" class="profileContent" data-loadurl="members/draco25240.15/recent-activity">
				<span class="JsOnly">Loading...</span>
				
			</li>
			

			<li style="display: none;" id="postings" class="profileContent" data-loadurl="members/draco25240.15/recent-content">
				<span class="JsOnly">Loading...</span>
				
			</li>

			<li style="display: none;" id="info" class="profileContent">
                            
                                    <div class="section">
                                            <h3 class="textHeading">Signature</h3>
                                            <div class="primaryContent">
                                                    <div class="baseHtml signature ugc"><div style="text-align: center"><img style="" src="https://forums.downwithdestruction.net/data/MetaMirrorCache/c39bde0d9b6601d7084c25bf5928db69.png" class="bbCodeImage" alt="[​IMG]" data-url="https://forums.downwithdestruction.net/data/MetaMirrorCache/c39bde0d9b6601d7084c25bf5928db69.png"> <img style="" src="https://forums.downwithdestruction.net/data/MetaMirrorCache/548fbf9360d347c1f05781ed333860a4.png" class="bbCodeImage" alt="[​IMG]" data-url="https://forums.downwithdestruction.net/data/MetaMirrorCache/548fbf9360d347c1f05781ed333860a4.png"><br>
<img style="" src="https://forums.downwithdestruction.net/data/MetaMirrorCache/a6079b147f1029c6772f10f817e98cf7.png" class="bbCodeImage" alt="[​IMG]" data-url="https://forums.downwithdestruction.net/data/MetaMirrorCache/a6079b147f1029c6772f10f817e98cf7.png"><br>
(just testing with signatures <img src="styles/default/xenforo/clear.png" class="mceSmilieSprite mceSmilie7" alt=":p" title="Stick Out Tongue    :p"> )​</div></div>
                                            </div>
                                    </div>
                            
			</li>
			
			
			
			
			
<li style="display: none;" id="resources" class="profileContent" data-loadurl="resources/authors/draco25240.15/?profile=1">
	<span class="jsOnly">Loading...</span>
	
</li>

<li style="display: none;" id="useralbums" class="profileContent">
	<div class="section">
	
		
		<ol>
		
			
<li id="useralbum-5" class="searchResult thread primaryContent" data-author="Draco25240">

	<div class="listBlock posterAvatar">
		<div class="thumbnail">
			
				<img src="styles/default/xfr/useralbums/album-no-cover.png" alt="">
			
		</div>
	</div>

	<div class="listBlock main">
		<div class="titleText">
			<h3 class="title"> <a href="gallery/dracos-album-of-memories.5/view">Dracos Album of Memories</a></h3>
		</div>

		<div class="meta">
			Album by: <a title="" href="members/draco25240.15/" class="username  PreviewTooltip" data-previewurl="members/draco25240.15/preview">Draco25240</a>, <span class="DateTime" title="Sep 17, 2013 at 9:45 AM">Sep 17, 2013</span> (images in album: 47)
		</div>

		<blockquote class="snippet"><a href="gallery/dracos-album-of-memories.5/view">Just an album with some of my memorable screenshots from DwD :p</a></blockquote>
	</div>

</li>
		
		</ol>
		
		<div class="sectionFooter">
			<ul class="listInline bulletImplode">
				<li><a href="gallery/draco25240.15/list">Show all albums by Draco25240</a></li>
			</ul>
		</div>
		
	
	</div>
</li>

	<li style="display: none;" id="socialForums" class="profileContent" data-loadurl="members/draco25240.15/social-forums">
		<span class="jsOnly">Loading...</span>
		
	</li>

<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">Loading...</span>
		</div>
	</div>
</div>
		</ul>
	</div>

</div>
						
						
						
						
						
					
						
			
						
		</div>
	</div>
</div>

<header>
	

<div id="header">
        
	

<div id="navigation" class="pageWidth withSearch">
    <div class="pageContent">
        <div class="header styled">
            <div class="inner">
                <a href="https://downwithdestruction.net/"><img src="https://downwithdestruction.net/theme/img/BioHazard.png" class="pull-left"></a>
                <div class="SearchBarBox pull-right">
                    

<div id="searchBar" class="pageWidth">
	
	<span id="QuickSearchPlaceholder" title="Search">Search</span>
	<fieldset id="QuickSearch">
		<form action="search/search" method="post" class="formPopup">
			
			<div class="primaryControls">
				<!-- block: primaryControls -->
				<input name="keywords" value="" class="textCtrl" placeholder="Search..." results="0" title="Enter your search and hit enter" id="QuickSearchQuery" type="search">				
				<!-- end block: primaryControls -->
			</div>
			
			<div class="secondaryControls">
				<div class="controlsWrapper">
				
					<!-- block: secondaryControls -->
					<dl class="ctrlUnit">
						<dt></dt>
						<dd><ul>
							<li><label><input name="title_only" value="1" id="search_bar_title_only" class="AutoChecker" data-uncheck="#search_bar_thread" type="checkbox"> Search titles only</label></li>
						</ul></dd>
					</dl>
				
					<dl class="ctrlUnit">
						<dt><label for="searchBar_users">Posted by Member:</label></dt>
						<dd>
							<input autocomplete="off" name="users" value="" class="textCtrl AutoComplete" id="searchBar_users" type="text">
							<p class="explain">Separate names with a comma.</p>
						</dd>
					</dl>
				
					<dl class="ctrlUnit">
						<dt><label for="searchBar_date">Newer Than:</label></dt>
						<dd><input name="date" value="" class="textCtrl date" id="searchBar_date" data-orig-type="date" type="text"></dd>
					</dl>
					
					
				</div>
				<!-- end block: secondaryControls -->
				
				<dl class="ctrlUnit submitUnit">
					<dt></dt>
					<dd>
						<input value="Search" class="button primary Tooltip" type="submit">
						<div class="Popup" id="commonSearches">
							<a rel="Menu" class="button NoPopupGadget Tooltip PopupControl" data-tipclass="flipped"><span class="arrowWidget"></span></a>
							
						</div>
						<a href="search/" class="button moreOptions Tooltip">More...</a>
					</dd>
				</dl>
				
			</div>
			
			<input name="_xfToken" value="15,1398351621,7c86231a4d0853d4b538ab5866818b93293fb0f7" type="hidden">
		</form>		
	</fieldset>
	
</div>
                </div>
                <div class="status pull-right">
                    <img src="https://downwithdestruction.net/theme/img/online.png" data-placement="left" title="Online"> TeamSpeak: ts.dwdg.net<br>
                    <img src="https://downwithdestruction.net/theme/img/semioffline.png" data-placement="left" title="Events is Offline"> Minecraft: hub.dwdg.net<br>
                </div>
            </div>
            <div class="nav">
                <ul id="nav" class="visitorTabs">
                    
                        <li class="navi"><a href="https://downwithdestruction.net/home"><span class="l">Home</span></a></li>
                    
                    <!-- forums -->
                        <li class="navi Popup PopupControl PopupClosed PopupContainerControl" data-nav-colour="1494c5">
                            <a href="/board" class="dropdown-toggle" data-toggle="dropdown" rel="Menu">
                                <span class="l">
                                    Forums
                                    
                                </span>
                            <span class="arrowWidget"></span></a>
                            <div class="forumsTabLinks">
                                    
                            </div>
                        </li>
                    <li class="navi" data-nav-colour="2d46b2"><a href="https://downwithdestruction.net/servers"><span class="l">Servers</span></a></li>
                    <li class="navi" data-nav-colour="c329be">
                        <a href="wiki/">
                            <span class="l">Wiki</span>
                        </a>
                    </li>
                    <li class="navi" data-nav-colour="d39b38"><a href="staff/"><span class="l">Staff</span></a></li>
                    <li class="navi" data-nav-colour="15a3a5"><a href="misc/contact"><span class="l">Support</span></a></li>
                <li style="background-color: rgb(45, 70, 178); left: 1333.7px; width: 91px;" id="nav-line"></li></ul>
                <ul id="nav" class="visitorTabs pull-right">
                    
                        <li class="navi" data-nav-colour="9d46b2"><a href="arcade/">Arcade</a></li>
                        <li class="navi" data-nav-colour="4d46b2"><a href="gallery/">Gallery</a></li>
                        
                            <li class="navi" data-nav-colour="2d46b2"><a href="resources/">Resources</a></li>
                        
                        <li class="navi active" data-nav-colour="2d46b2"><a href="members/">Members</a></li>
                    
                </ul>
            </div>
            <div class="nav-subNavi">
                <ul class="subNavi pull-left">
                    
                        <a href="members/"><li>Notable Members</li></a>
                        <a href="members/list"><li>Registered Members</li></a>
                        <a href="online/"><li>Current Visitors</li></a>
                        <a href="recent-activity/"><li>Recent Activity</li></a>
                    
                </ul>
            </div>
        </div>
    </div>
</div>
        
</div>

	
	
</header>

</div>

<footer>
	

<div id="navigation" class="pageWidth withSearch">
    <div class="pageContent">
            <div class="footer">
                <div class="inner">
                    <div class="col-md-4">
                        <h4>Social</h4>
                        <ul class="tile">
                            <li><a href="https://www.facebook.com/DwDGamingCommunity" target="_blank"><img src="http://static.dwdg.net/theme/img/facebook.png"></a></li>
                            <li><a href="https://twitter.com/dwdgaming" target="_blank"><img src="http://static.dwdg.net/theme/img/twitter.png"></a></li>
                            <li><a href="http://www.youtube.com/user/TheDwDCommunity" target="_blank"><img src="http://static.dwdg.net/theme/img/youtube.png"></a></li>
                            <li><a href="https://plus.google.com/117841516016676816685" target="_blank"><img src="http://static.dwdg.net/theme/img/google.png"></a></li>
                            <li><a href="board/-/index.rss" rel="alternate" class="globalFeed" target="_blank" title="RSS feed for DwD Gaming Community"><img src="http://static.dwdg.net/theme/img/rss.png"></a></li>
                        </ul>                    
                    </div>
                    <div class="col-md-4">
                        <h4>Help &amp; Support</h4>
                        <ul>
                            <li><a href="wiki/">Wiki</a></li>
                            <li><a href="https://forums.downwithdestruction.net/staff/">Staff</a></li>
                            <li><a href="#">Forum Issues</a></li>
                            <li><a href="#">Game Server Issues</a></li>
                            <li><a href="applications/file-a-report.5/respond" class="OverlayTrigger">Report a member</a></li>
                        </ul>                    
                    </div>
                    <div class="col-md-4">
                        <h4>Legal</h4>
                        <ul>
                            <li><a href="doc/rules-and-regulations/">Rules &amp; Regulations</a></li>
                            <li><a href="doc/intelligence-clause/">Intelligence Clause</a></li>
                            <li><a href="doc/copyright/">Copyright</a></li>
                            <li><a href="doc/privacy-policy/">Privacy Policy</a></li>
                            <li><a href="doc/terms-of-service/">Terms &amp; Conditions</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="footerfooter">
                        © Down With Destruction 2014, All Rights Reserved.
                        <span class="pull-right">Site Created by DwD Dev Team</span>
                    </div>
                    <div class="printnotes">
                        
                            Forums powered by XenForo™ v1.3.0 ©2010-2014 XenForo Ltd.<br>
                            
                                
                                    <dl class="pairsInline debugInfo" title="XenForo_ControllerPublic_Member->Member (XenForo_ViewPublic_Member_View)">
                                        
                                            <dt>Memory:</dt> <dd>17.192 MB</dd>
                                            <dt>DB Queries:</dt> <dd>22</dd>
                                            <a href="/members/draco25240.15/?_debug=1" rel="nofollow"><dt>Timing:</dt> <dd>0.1064 seconds</dd></a>
                                        
                                    </dl>
                                
                            
                        
                    </div>
                </div>
            </div>
    </div>
</div>
</footer>

<script>


jQuery.extend(true, XenForo,
{
	visitor: { user_id: 15 },
	serverTimeInfo:
	{
		now: 1398351621,
		today: 1398290400,
		todayDow: 4
	},
	_lightBoxUniversal: "0",
	_enableOverlays: "1",
	_animationSpeedMultiplier: "1",
	_overlayConfig:
	{
		top: "10%",
		speed: 200,
		closeSpeed: 100,
		mask:
		{
			color: "rgb(255, 255, 255)",
			opacity: "0.6",
			loadSpeed: 200,
			closeSpeed: 100
		}
	},
	_ignoredUsers: [],
	_loadedScripts: {"member_view":true,"mood_display":true,"message_simple":true,"likes_summary":true,"bb_code":true,"inline_mod":true,"search_results":true,"xfr_useralbums_search_result":true,"bbm_buttons":true,"moderator_bar":true,"Gritter":true,"GritterEXTRA":true,"footer_dev":true,"waindigo_loginasuser":true,"js\/xenforo\/quick_reply_profile.js?_v=b2838f31":true,"js\/xenforo\/comments_simple.js?_v=b2838f31":true,"js\/xenforo\/inline_mod.js?_v=b2838f31":true,"js\/NProgress\/script.js?_v=b2838f31":true,"js\/gritter\/jquery.gritter.js?_v=b2838f31":true,"js\/gritter\/notifications.js?_v=b2838f31":true,"js\/bdTagMe\/frontend.js?_v=b2838f31":true},
	_cookieConfig: { path: "/", domain: "downwithdestruction.net", prefix: "DWDxf_"},
	_csrfToken: "15,1398351621,7c86231a4d0853d4b538ab5866818b93293fb0f7",
	_csrfRefreshUrl: "login/csrf-token-refresh",
	_jsVersion: "b2838f31"
});
jQuery.extend(XenForo.phrases,
{ 	fb_invite_message:	"Invite has been sent by Facebook",
	cancel: "Cancel",

	a_moment_ago:    "A moment ago",
	one_minute_ago:  "1 minute ago",
	x_minutes_ago:   "%minutes% minutes ago",
	today_at_x:      "Today at %time%",
	yesterday_at_x:  "Yesterday at %time%",
	day_x_at_time_y: "%day% at %time%",

	day0: "Sunday",
	day1: "Monday",
	day2: "Tuesday",
	day3: "Wednesday",
	day4: "Thursday",
	day5: "Friday",
	day6: "Saturday",

	_months: "January,February,March,April,May,June,July,August,September,October,November,December",
	_daysShort: "Sun,Mon,Tue,Wed,Thu,Fri,Sat",

	following_error_occurred: "The following error occurred",
	server_did_not_respond_in_time_try_again: "The server did not respond in time. Please try again.",
	logging_in: "Logging in",
	click_image_show_full_size_version: "Click this image to show the full-size version.",
	show_hidden_content_by_x: "Show hidden content by {names}"
});

// Facebook Javascript SDK
XenForo.Facebook.appId = "282540271877164";
XenForo.Facebook.forceInit = false;
jQuery.extend(XenForo.phrases,
				{
				dismiss_notification: "Dismiss Notification"
				});

</script>


	
        

<div id="calroot" style="display: none; position: absolute;"><div id="calhead"><a id="calprev">←</a><div id="caltitle"></div><a id="calnext">→</a></div><div id="calbody"><div id="caldays"><span>Sun</span><span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span></div><div id="calweeks"></div></div></div><form id="InlineModOverlay"><span style="display: inline;" id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			Select All <input id="ModerationCheck" title="Select / deselect all posts on this page" type="checkbox">
		</label>

		<input class="button ClickNext" value="↓" title="Move down" type="button">
		<input class="button ClickPrev" value="↑" title="Move up" type="button">
		<a class="SelectionCount">Selected Posts: <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			<input class="button" value="Delete..." name="delete" type="submit">
			<input class="button" value="Approve" name="approve" type="submit">
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">Other Action...</option>
				<optgroup label="Moderation Actions">
					
									<option value="delete">Delete Posts</option>
									<option value="undelete">Undelete Posts</option>
									<option value="approve">Approve Posts</option>
									<option value="unapprove">Unapprove Posts</option>
									<option value="deselect">Deselect Posts</option>
								
				</optgroup>
				<option value="closeOverlay">Close This Overlay</option>
			</select>

			<input class="button primary" value="Go" type="submit">
			<input class="button OverlayCloser overylayOnly" value="X" title="Cancel and close these controls" type="reset">
		</span>
	</span>
</span></form><div class="Menu JsOnly" id="AccountMenu">
                                                    <div class="primaryContent menuHeader">
                                                        <b class="menuFloatLeft">
                                                            <li>
                                                                <a href="members/draco25240.15/" class="avatar Av15s" data-avatarhtml="true"><img src="https://forums.downwithdestruction.net/data/avatars/s/0/15.jpg?1376737952" alt="Draco25240" height="48" width="48"></a>
                                                            </li>
                                                        </b>
                                                        <b class="menuFloatRight">
                                                            <h3><a href="members/draco25240.15/" class="concealed" title="View your profile">Draco25240</a></h3>

                                                            <ul class="links">
                                                                <li class="fl"><a href="members/draco25240.15/">Your Profile Page</a></li>
                                                            </ul>
                                                        </b>
                                                    </div>
                                                <div class="menuColumns secondaryContent">
                                                    <ul class="col1 blockLinksList">
                                                        <li>	
                                                            <form action="account/toggle-visibility" method="post" class="AutoValidator visibilityForm">
                                                                <label><input name="visible" value="1" class="SubmitOnChange" checked="checked" type="checkbox">
                                                                    Show Online Status</label>
                                                                <input name="_xfToken" value="15,1398351621,7c86231a4d0853d4b538ab5866818b93293fb0f7" type="hidden">
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <a href="account/privacy" class="OverlayTrigger">Privacy</a>
                                                        </li>
                                                        <li>
                                                            <a href="account/security" class="OverlayTrigger">Password</a>
                                                        </li>
                                                        <li>
                                                            <a href="account/preferences" class="OverlayTrigger">Preferences</a>
                                                        </li>
                                                        <li>
                                                            <a href="account/alert-preferences" class="OverlayTrigger">Alert Preferences</a>
                                                        </li>
                                                        
                                                            <li>
                                                                <a href="account/personal-details" class="OverlayTrigger">Personal Details</a>
                                                            </li>
                                                        
                                                        
                                                            <li>
                                                                <a href="account/contact-details" class="OverlayTrigger">Contact Details</a>
                                                            </li>
                                                        
                                                        <li>
                                                            <a href="friend-inviter/" class="OverlayTrigger">Send Invite</a>
                                                        </li>
                                                        <li>
                                                            <a href="account/bookmarks">Your Bookmarks</a>
                                                        </li>
                                                        <li>
                                                            <a href="account/">More...</a>
                                                        </li>
                                                    </ul>
                                                    <ul class="col2 blockLinksList">
                                                        
                                                        
                                                            <li>
                                                                <a href="account/external-accounts" class="OverlayTrigger">Social Integration</a>
                                                            </li>
                                                        
                                                            <li>
                                                                <a href="logout/?_xfToken=15%2C1398351621%2C7c86231a4d0853d4b538ab5866818b93293fb0f7" class="LogOut">Log Out</a>
                                                            </li>
                                                    </ul>
                                                </div>
                                                        <b class="menuUserStatus">
                                                            
                                                                <form action="members/draco25240.15/post" method="post" class="sectionFooter statusPoster AutoValidator" data-optinout="OptIn">
                                                                    <textarea autocomplete="off" name="message" class="textCtrl StatusEditor Elastic" placeholder="Update your status..." rows="1" cols="" style="height:18px" data-statuseditorcounter="#visMenuSEdCount" data-nofocus="true"></textarea>
                                                                    <div style="display: none;" class="submitUnit">
                                                                        <span class="statusEditorCounter" id="visMenuSEdCount" title="Characters remaining">140</span>
                                                                        <input class="button primary MenuCloser" value="Post" type="submit">
                                                                        <input name="_xfToken" value="15,1398351621,7c86231a4d0853d4b538ab5866818b93293fb0f7" type="hidden">
                                                                        <input name="return" value="1" type="hidden"> 
                                                                    </div>
                                                                </form>
                                                            
                                                        </b>
                                            </div><div id="XenForoUniq0" class="Menu">
								<div class="primaryContent menuHeader">
									<h3>Useful Searches</h3>
								</div>
								<ul class="secondaryContent blockLinksList">
									<!-- block: useful_searches -->
									<li><a href="find-new/posts?recent=1" rel="nofollow">Recent Posts</a></li>
									
									<li><a href="search/member?user_id=15&amp;content=thread">Your Threads</a></li>
									<li><a href="search/member?user_id=15&amp;content=post">Your Posts</a></li>
									<li><a href="search/member?user_id=15&amp;content=profile_post">Your Profile Posts</a></li>
									
									<!-- end block: useful_searches -->
								</ul>
							</div><div class="Menu JsOnly" id="AccountMenu">
                                        <div class="primaryContent menuHeader">
                                <ul class="blockLinksList">
                                            <li><a href="forums/minecraft-network.94/">Minecraft Network</a></li>
                                            <li><a href="forums/league-of-legends.96/">League Of Legends</a></li>
                                            <li><a href="forums/gta-online.95/">GTA Online</a></li>
                                            <li><a href="forums/call-of-duty.97/ ">Call of Duty</a></li>
                                            
                                            <li><a href="forums/miscellaneous.98/ ">Miscellaneous</a></li>
                                            
                                                <li><a href="forums/staff-headquarters.99/ ">Staff Headquarters</a></li>
                                            
                                </ul>
                                        </div>
                                    </div></body></html>