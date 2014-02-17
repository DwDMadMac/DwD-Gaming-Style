<xen:edithint template="navigation.css" />

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
                    <xen:elseif is="{$contentTemplate} == 'conversation_list' OR
                                {$contentTemplate} == 'conversation_list_yours' OR
                                {$contentTemplate} == 'conversation_list_starred' OR
                                {$contentTemplate} == 'conversation_add' OR
                                {$contentTemplate} == 'conversation_view'" />
                        <a href="{xen:link 'inbox'}"><li>Inbox</li></a>
                        <a href="{xen:link 'inbox/starred'}"><li>Starred</li></a>
                        <a href="{xen:link 'inbox/yours'}"><li>Sent</li></a>
                    <xen:else />
                        <!-- Global Left Sub Navi -->
                    </xen:if>
                </ul>
                <ul class="subNavi pull-right">
                    <xen:if is="!{$visitor.user_id}">
                        <!-- Show Nothing To Guest -->
                    <xen:else />
                        <a href="{xen:link 'arcade'}">
                            <li>Arcade</li>
                        </a>
                        <a href="{xen:link 'gallery'}">
                            <li>Gallery</li>
                        </a>
                        <a href="{xen:link 'resources'}">
                            <li>Resources</li>
                        </a>
                        <a href="{xen:link 'members'}">
                            <li>Members</li>
                        </a>
                    </xen:if>
                </ul>
            </div>
        </div>
    </div>
</div>