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
                                            <li><a href="{xen:link 'categories/minecraft-network.94/'}">Minecraft Network</a></li>
                                            <li><a href="{xen:link 'categories/league-of-legends.96/'}">League Of Legends</a></li>
                                            <li><a href="{xen:link 'categories/gta-online.95/'}">GTA Online</a></li>
                                            <li><a href="{xen:link 'categories/call-of-duty.97/'} ">Call of Duty</a></li>
                                            <xen:comment><li><a href="{xen:link ''}">Counter Strike</a></li></xen:comment>
                                            <li><a href="{xen:link 'categories/miscellaneous.98/'} ">Miscellaneous</a></li>
                                            <xen:if is="{xen:helper ismemberof, $visitor, 16}">
                                                <li><a href="{xen:link 'categories/staff-headquarters.99/'} ">Staff Headquarters</a></li>
                                            </xen:if>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </li>
                    <li class="navi" data-nav-colour="2d46b2"><a href="http://dwdg.net/servers"><span class='l'>Servers</span></a></li>
                    <li class="navi {xen:if $tabs.selected, 'selected active', 'Popup PopupControl PopupClosed'}" data-nav-colour="c329be">
                        <a href="{xen:link wiki}">
                            <span class='l'>Wiki</span>
                        </a>
                    </li>
                    <li class="navi" data-nav-colour="d39b38"><a href="{xen:link staff}"><span class='l'>Staff</span></a></li>
                    <li class="navi {xen:if $tabs.selected, 'selected active', 'Popup PopupControl PopupClosed'}" data-nav-colour="15a3a5"><a href="{xen:link misc/contact}"><span class='l'>Support</span></a></li>
                </ul>
                <ul id="nav" class="visitorTabs pull-right">
                    <li class="navi {xen:if $tabs.selected, 'selected active', 'Popup PopupControl PopupClosed'}" data-nav-colour="2d46b2">
                        <a href="{xen:link members, $visitor}" class="dropdown-toggle" data-toggle="dropdown" title="{xen:phrase view_your_profile}" rel="Menu">
                            <span class="l">
                                {$visitor.username}
                            </span>
                        </a>
                    </li>
                    <xen:if is="!{$visitor.user_id}">
                        <xen:comment>Do Nothing Here</xen:comment>
                    <xen:else />
                        <!-- Alerts -->
                        <li class="navi {xen:if $tabs.selected, 'selected active', 'Popup PopupControl PopupClosed'}" data-nav-colour="9d46b2">
                            <a href="{xen:link account}" onclick="this.removeAttribute('href');this.className='disableAccountNavi'" class="dropdown-toggle disableAccountNavi" data-toggle="dropdown" rel="Menu">
                                <span id="alertsIcon"></span>
                                <span class="l>"
                                        <strong class="itemCount {xen:if $visitor.alerts_unread, '', 'Zero'}" id="VisitorExtraMenu_AlertsCounter">
                                            <span class="Total">{xen:number $visitor.alerts_unread}</span>
                                        </strong>
                                </span>
                            </a>
                            
                            <div class="Menu JsOnly navPopup" id="AlertsMenu"
                                    data-contentSrc="{xen:link 'account/alerts-popup'}"
                                    data-contentDest="#AlertsMenu .listPlaceholder"
                                    data-removeCounter="#AlertsMenu_Counter">

                                    <div class="menuHeader primaryContent">
                                            <h3>
                                                    <span class="Progress InProgress"></span>
                                                    <a href="{xen:link account/alerts}" class="concealed">{xen:phrase alerts}</a>
                                            </h3>
                                    </div>

                                    <div class="listPlaceholder"></div>

                                    <div class="sectionFooter">
                                            <a href="{xen:link account/alert-preferences}" class="floatLink">{xen:phrase alert_preferences}</a>
                                            <a href="{xen:link account/alerts}">{xen:phrase show_all}...</a>
                                    </div>
                            </div>
                        </li>
                        <!-- Conversations -->
                        <li class="navi {xen:if $tabs.selected, 'selected active', 'Popup PopupControl PopupClosed'}" data-nav-colour="4d46b2">
                            <a href="{xen:link conversations}" onclick="this.removeAttribute('href');this.className='disableAccountNavi'" class="dropdown-toggle disableAccountNavi" data-toggle="dropdown" rel="Menu">
                                <span id="convoIcon"></span>
                                <span class="l">
                                        <strong class="itemCount {xen:if $visitor.conversations_unread, '', 'Zero'}" id="VisitorExtraMenu_ConversationsCounter">
                                            <span class="Total">{xen:number $visitor.conversations_unread}</span>
                                        </strong>
                                </span>
                            </a>

                            <div class="Menu JsOnly navPopup" id="ConversationsMenu"
                                    data-contentSrc="{xen:link 'conversations/popup'}"
                                    data-contentDest="#ConversationsMenu .listPlaceholder">

                                    <div class="menuHeader primaryContent">
                                            <h3>
                                                    <span class="Progress InProgress"></span>
                                                    <a href="{xen:link conversations}" class="concealed">{xen:phrase conversations}</a>
                                            </h3>						
                                    </div>

                                    <div class="listPlaceholder"></div>

                                    <div class="sectionFooter">
                                            <xen:if is="{$canStartConversation}"><a href="{xen:link conversations/add}" class="floatLink">{xen:phrase start_new_conversation}</a></xen:if>
                                            <a href="{xen:link conversations}">{xen:phrase show_all}...</a>
                                    </div>
                            </div>
                        </li>
                        <!-- account -->
                        <li class="navi {xen:if $tabs.selected, 'selected active', 'Popup PopupControl PopupClosed'}" data-nav-colour="2d46b2">
                            <a href="{xen:link account}" onclick="this.removeAttribute('href');this.className='disableAccountNavi'" class="dropdown-toggle disableAccountNavi" data-toggle="dropdown" rel="Menu">
                                <span class="l">Account</span>
                            </a>
                                <div class="forumsTabLinks">
                                    <ul class="dropdown-menu secondaryContent blockLinksList">
                                        <div class="Menu JsOnly" id="AccountMenu">
                                            <xen:comment>
                                                <div class="primaryContent menuHeader">
                                                    <xen:avatar user="$visitor" size="m" class="NoOverlay plainImage" title="{xen:phrase view_your_profile}" />

                                                    <h3><a href="{xen:link members, $visitor}" class="concealed" title="{xen:phrase view_your_profile}">{$visitor.username}</a></h3>

                                                    <xen:if hascontent="true"><div class="muted"><xen:contentcheck>{xen:helper usertitle, $visitor}</xen:contentcheck></div></xen:if>

                                                    <ul class="links">
                                                        <li class="fl"><a href="{xen:link members, $visitor}">{xen:phrase your_profile_page}</a></li>
                                                    </ul>
                                                </div>
                                            </xen:comment>
                                            <div class="menuColumns secondaryContent">
                                                <ul class="col1 blockLinksList">
                                                    <li>				
                                                        <form action="{xen:link account/toggle-visibility}" method="post" class="AutoValidator visibilityForm">
                                                            <label><input type="checkbox" name="visible" value="1" class="SubmitOnChange" {xen:checked $visitor.visible} />
                                                                {xen:phrase show_online_status}</label>
                                                            <input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
                                                        </form>
                                                    </li>
                                                    <xen:if is="{$canUploadAvatar}">
                                                        <li>
                                                            <a href="{xen:link account/avatar}" class="OverlayTrigger" data-cacheOverlay="true">{xen:phrase avatar}</a>
                                                        </li>
                                                    </xen:if>
                                                    <li>
                                                        <a href="{xen:link account/privacy}" class="OverlayTrigger">{xen:phrase privacy}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{xen:link account/security}" class="OverlayTrigger">{xen:phrase password}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{xen:link account/preferences}" class="OverlayTrigger">{xen:phrase preferences}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{xen:link account/alert-preferences}" class="OverlayTrigger">{xen:phrase alert_preferences}</a>
                                                    </li>
                                                    <xen:if is="{$canEditProfile}">
                                                        <li>
                                                            <a href="{xen:link account/personal-details}" class="OverlayTrigger">{xen:phrase personal_details}</a>
                                                        </li>
                                                    </xen:if>
                                                    <xen:if is="{$canEditProfile}">
                                                        <li>
                                                            <a href="{xen:link account/contact-details}" class="OverlayTrigger">{xen:phrase contact_details}</a>
                                                        </li>
                                                    </xen:if>
                                                    <li>
                                                        <a href="{xen:link friend-inviter}" class="OverlayTrigger">Send Invite</a>
                                                    </li>
                                                    <li>
                                                        <a href="{xen:link account/bookmarks}">Your Bookmarks</a>
                                                    </li>
                                                    <li>
                                                        <a href="{xen:link account}">More...</a>
                                                    </li>
                                                </ul>
                                                <ul class="col2 blockLinksList">
                                                    <xen:if is="{$xenCache.userUpgradeCount}">
                                                        <li>
                                                            <a href="{xen:link account/upgrades}">{xen:phrase account_upgrades}</a>
                                                        </li>
                                                    </xen:if>
                                                    <xen:if is="{$xenOptions.facebookAppId} OR {$xenOptions.twitterAppKey} OR {$xenOptions.googleClientId}">
                                                        <li>
                                                            <a href="{xen:link account/external-accounts}" class="OverlayTrigger">Social Integration</a>
                                                        </li>
                                                    </xen:if>
                                                        <li>
                                                            <a href="{xen:link logout, '', '_xfToken={$visitor.csrf_token_page}'}" class="LogOut">{xen:phrase log_out}</a>
                                                        </li>
                                                </ul>
                                            </div>
                                            <xen:comment>
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
                                            </xen:comment>
                                        </div>	
                                    </ul>
                                </div>
                    </xen:if>
                </ul>
            </div>
            <div class="nav">
                <ul id="nav" class="visitorTabs">
                    
                </ul>
            </div>
        </div>
    </div>
</div>