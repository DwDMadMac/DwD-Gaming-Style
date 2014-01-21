<div id="navigation" class="pageWidth {xen:if $canSearch, withSearch}">
    <div class="pageContent">
            <div class="header styled">
                <div class="inner">
                    <img src="http://static.downwithdestruction.net/theme/img/BioHazard.png" class="pull-left" />
                    <div class='SearchBarBox pull-right'>
                        <xen:if is="{$canSearch}"><xen:include template="search_bar" /></xen:if>
                    </div>
                    <div class='status pull-right'>
                        <img src='http://static.downwithdestruction.net/theme/img/online.png' data-placement="left" title="Online" /> TeamSpeak: ts.dwdg.net<br />
                        <img src='http://static.downwithdestruction.net/theme/img/semioffline.png' data-placement="left" title="Events is Offline" /> Minecraft: hub.dwdg.net<br />
                    </div>
                </div>
                <div class="nav">
                    <ul id="nav" class="visitorTabs">
                        <xen:if is="{$showHomeLink}">
                            <li class="navi"><a href="http://dwdg.net/home"><span class='l'>Home</span></a></li>
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
                                    <ul class="dropdown-menu secondaryContent blockLinksList">
                                        <div class="Menu JsOnly" id="AccountMenu">
                                            <div class="primaryContent menuHeader">
                                                <li><a href="{xen:link 'board/dwd-network/'}">Minecraft Network</a></li>
                                                <li><a href="{xen:link 'board/league-of-leagends'}">League Of Legends</a></li>
                                                <li><a href="{xen:link 'board/gta-online/'}">GTA Online</a></li>
                                                <li><a href="{xen:link 'board/call-of-duty'} ">Call of Duty</a></li>
                                                <li><a href="{xen:link ''}">Counter Strike</a></li>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </li>
                        <li class="navi" data-nav-colour="2d46b2"><a href="http://dwdg.net/servers"><span class='l'>Servers</span></a></li>
                        <li class="navi" data-nav-colour="c329be"><a href="home"><span class='l'>Wiki</span></a></li>
                        <li class="navi" data-nav-colour="d39b38"><a href="home"><span class='l'>Staff</span></a></li>
                        <li class="navi {xen:if $tabs.selected, 'selected active', 'Popup PopupControl PopupClosed'}" data-nav-colour="15a3a5"><a href="{xen:link misc/contact}"><span class='l'>Support</span></a></li>
                    </ul>
                    <ul id="nav" class="visitorTabs pull-right">
                        <!-- account -->
                        <li class="navi {xen:if $tabs.selected, 'selected active', 'Popup PopupControl PopupClosed'}" data-nav-colour="2d46b2">
                            <a href="{xen:link account}" class="dropdown-toggle" data-toggle="dropdown" rel="Menu">
                                <span class="l">Account</span>
                            </a>
                                <div class="forumsTabLinks">
                                    <ul class="dropdown-menu secondaryContent blockLinksList">
                                        <div class="Menu JsOnly" id="AccountMenu">
                                            <div class="primaryContent menuHeader">
                                                <xen:avatar user="$visitor" size="m" class="NoOverlay plainImage" title="{xen:phrase view_your_profile}" />

                                                <h3><a href="{xen:link members, $visitor}" class="concealed" title="{xen:phrase view_your_profile}">{$visitor.username}</a></h3>

                                                <xen:if hascontent="true"><div class="muted"><xen:contentcheck>{xen:helper usertitle, $visitor}</xen:contentcheck></div></xen:if>

                                                <ul class="links">
                                                    <li class="fl"><a href="{xen:link members, $visitor}">{xen:phrase your_profile_page}</a></li>
                                                </ul>
                                            </div>
                                            <div class="menuColumns secondaryContent">
                                                <ul class="col1 blockLinksList">
                                                <xen:hook name="navigation_visitor_tab_links1">
                                                    <xen:if is="{$canEditProfile}"><li><a href="{xen:link account/personal-details}">{xen:phrase personal_details}</a></li></xen:if>
                                                    <xen:if is="{$canEditSignature}"><li><a href="{xen:link account/signature}">{xen:phrase signature}</a></li></xen:if>
                                                    <xen:if is="{$canEditProfile}"><li><a href="{xen:link account/contact-details}">{xen:phrase contact_details}</a></li></xen:if>
                                                    <li><a href="{xen:link account/privacy}">{xen:phrase privacy}</a></li>
                                                    <li><a href="{xen:link account/preferences}" class="OverlayTrigger">{xen:phrase preferences}</a></li>
                                                    <li><a href="{xen:link account/alert-preferences}">{xen:phrase alert_preferences}</a></li>
                                                    <xen:if is="{$canUploadAvatar}"><li><a href="{xen:link account/avatar}" class="OverlayTrigger" data-cacheOverlay="true">{xen:phrase avatar}</a></li></xen:if>
                                                    <xen:if is="{$xenOptions.facebookAppId}"><li><a href="{xen:link account/facebook}">{xen:phrase facebook_integration}</a></li></xen:if>
                                                    <li><a href="{xen:link account/security}">{xen:phrase password}</a></li>
                                                </xen:hook>
                                                </ul>
                                                <ul class="col2 blockLinksList">
                                                <xen:hook name="navigation_visitor_tab_links2">
                                                    <xen:if is="{$xenOptions.enableNewsFeed}"><li><a href="{xen:link account/news-feed}">{xen:phrase your_news_feed}</a></li></xen:if>
                                                    <li><a href="{xen:link conversations}">{xen:phrase conversations}
                                                        <strong class="itemCount {xen:if $visitor.conversations_unread, '', 'Zero'}"
                                                            id="VisitorExtraMenu_ConversationsCounter">
                                                            <span class="Total">{xen:number $visitor.conversations_unread}</span>
                                                        </strong></a></li>
                                                    <li><a href="{xen:link account/alerts}">{xen:phrase alerts}
                                                        <strong class="itemCount {xen:if $visitor.alerts_unread, '', 'Zero'}"
                                                            id="VisitorExtraMenu_AlertsCounter">
                                                            <span class="Total">{xen:number $visitor.alerts_unread}</span>
                                                        </strong></a></li>
                                                    <li><a href="{xen:link account/likes}">{xen:phrase likes_youve_received}</a></li>
                                                    <li><a href="{xen:link search/member, '', 'user_id={$visitor.user_id}'}">{xen:phrase your_content}</a></li>
                                                    <li><a href="{xen:link account/following}">{xen:phrase people_you_follow}</a></li>
                                                    <li><a href="{xen:link account/ignored}">{xen:phrase people_you_ignore}</a></li>
                                                    <xen:if is="{$xenCache.userUpgradeCount}"><li><a href="{xen:link account/upgrades}">{xen:phrase account_upgrades}</a></li></xen:if>
                                                </xen:hook>
                                                </ul>
                                            </div>
                                            <div class="menuColumns secondaryContent">
                                                <ul class="col1 blockLinksList">
                                                    <li>				
                                                        <form action="{xen:link account/toggle-visibility}" method="post" class="AutoValidator visibilityForm">
                                                            <label><input type="checkbox" name="visible" value="1" class="SubmitOnChange" {xen:checked $visitor.visible} />
                                                                {xen:phrase show_online_status}</label>
                                                            <input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
                                                        </form>
                                                    </li>
                                                </ul>
                                                <ul class="col2 blockLinksList">
                                                    <li><a href="{xen:link logout, '', '_xfToken={$visitor.csrf_token_page}'}" class="LogOut">{xen:phrase log_out}</a></li>
                                                </ul>
                                            </div>
                                            <xen:if is="{$canUpdateStatus}">
                                                <form action="{xen:link members/post, $visitor}" method="post" class="sectionFooter statusPoster AutoValidator" data-optInOut="OptIn">
                                                    <textarea name="message" class="textCtrl StatusEditor Elastic" placeholder="{xen:phrase update_your_status}..." rows="1" cols="40" style="height:18px" data-statusEditorCounter="#visMenuSEdCount" data-nofocus="true"></textarea>
                                                    <div class="submitUnit">
                                                        <span id="visMenuSEdCount" title="{xen:phrase characters_remaining}"></span>
                                                        <input type="submit" class="button primary MenuCloser" value="{xen:phrase post_verb}" />
                                                        <input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
                                                        <input type="hidden" name="return" value="1" /> 
                                                    </div>
                                                </form>
                                            </xen:if>
                                        </div>	
                                    </ul>
                                </div>
                    </ul>
                </div>
            </div>
    </div>
</div>