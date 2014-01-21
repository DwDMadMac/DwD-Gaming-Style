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
                    <ul id="nav">
                        <xen:if is="{$showHomeLink}">
                            <li class="navi"><a href="http://dwdg.net/home"><span class='l'>Home</span></a></li>
                        </xen:if>
                        <!-- forums -->
                        <xen:if is="{$tabs.forums}">
                            <li class="navi forums {xen:if $tabs.forums.selected, 'selected active', 'Popup PopupControl PopupClosed'}" data-nav-colour='1494c5'>
                                <a href="/board" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class='l'>
                                        Forums
                                        <xen:comment><span class="SplitCtrl caret" rel="Menu"></span></xen:comment>
                                    </span>
                                </a>
                                <div class=" forumsTabLinks">
                                    <ul class="dropdown-menu secondaryContent blockLinksList">
                                        <xen:hook name="navigation_tabs_forums">
                                            <li><a href="{xen:link 'board/dwd-network/'}">Minecraft Network</a></li>
                                            <li><a href="{xen:link 'league-of-leagends'}">League Of Legends</a></li>
                                            <li><a href="{xen:link 'board/gta-online/'}">GTA Online</a></li>
                                            <li><a href="{xen:link 'board/call-of-duty'} ">Call of Duty</a></li>
                                            <li><a href="{xen:link ''}">Counter Strike</a></li>
                                        </xen:hook>
                                    </ul>
                                </div>
                            </li>
                        </xen:if>
                        <li class="navi" data-nav-colour="2d46b2"><a href="http://dwdg.net/servers"><span class='l'>Servers</span></a></li>
                        <li class="navi" data-nav-colour="c329be"><a href="home"><span class='l'>Wiki</span></a></li>
                        <li class="navi" data-nav-colour="d39b38"><a href="home"><span class='l'>Staff</span></a></li>
                        <li class="navi" data-nav-colour="15a3a5"><a href="home"><span class='l'>Support</span></a></li>
                    </ul>
                    <xen:if is="{$visitor.user_id}">
                        <xen:include template="navigation_visitor_tab" />
                    </xen:if>
                </div>
            </div>
    </div>
</div>