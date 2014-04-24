<xen:require css="moderator_bar.css" />


<xen:if hascontent="true">
<fieldset id="moderatorBar">
	<div class="pageWidth">
		<div class="pageContent">
                    <div style="float: left">
                        <xen:contentcheck>
                            <xen:if is="{xen:helper ismemberof, $visitor, 16}">			
                                    <a href="admin.php" class="acp adminLink"><span class="itemLabel">{xen:phrase admin_control_panel_short}</span></a>

                                    <xen:if is="{$session.permissionTest}">
                                            <a href="{xen:link misc/reset-permissions}" class="permissionTest adminLink OverlayTrigger">
                                                    <span class="itemLabel">{xen:phrase permissions_from_x, 'name={$session.permissionTest.username}'}</span>
                                            </a>                     <ul style="display: inline-block">
                                    </xen:if>
                            </xen:if>
                            </li>

                            <xen:if is="{xen:helper ismemberof, $visitor, 16} AND {$session.moderationCounts.total}">
                                    <a href="{xen:link moderation-queue}" class="moderationQueue modLink">
                                            <span class="itemLabel">{xen:phrase moderation_queue_short}:</span>
                                            <span class="itemCount {xen:if {$session.moderationCounts.total}, 'alert'}">{$session.moderationCounts.total}</span>
                                    </a>
                            </xen:if>

                            <xen:if is="{xen:helper ismemberof, $visitor, 16} && !{$xenOptions.reportIntoForumId}">
                                    <a href="{xen:link reports}" class="reportedItems modLink">
                                            <span class="itemLabel">{xen:phrase reported_items_short}:</span>
                                            <span class="itemCount {xen:if '({$session.reportCounts.total} AND {$session.reportCounts.lastUpdate} > {$session.reportLastRead}) OR {$session.reportCounts.assigned}', 'alert'}" title="{xen:if $session.reportCounts.lastUpdate, '{xen:phrase last_report_update}: {xen:datetime $session.reportCounts.lastUpdate}'}"><xen:if is="{$session.reportCounts.assigned}">{$session.reportCounts.assigned} / {$session.reportCounts.total}<xen:else />{$session.reportCounts.total}</xen:if></span>
                                    </a>
                            </xen:if>

                            <xen:if is="{xen:helper ismemberof, $visitor, 16} AND {$session.canAdminUsers} AND {$session.userModerationCounts.total}">
                                    <a href="admin.php?users/moderated" class="userModerationQueue modLink">
                                            <span class="itemLabel">{xen:phrase users_awaiting_approval_short}:</span>
                                            <span class="itemCount {xen:if {$session.userModerationCounts.total}, 'alert'}">{$session.userModerationCounts.total}</span>
                                    </a>
                            </xen:if>

                            <xen:hook name="moderator_bar" />
                        </xen:contentcheck>
                    </div>
                        <ul class="modBarRight pull-right">
                        <xen:if is="!{$visitor.user_id}">
                            <xen:comment>Do Nothing Here</xen:comment>
                        <xen:else />
                            <!-- Conversations -->
                                <a href="{xen:link conversations}" class="OverlayTrigger pull-right">
                                    <span id="convoIconWhite"></span>
                                    <span class="itemLabel">
                                            <strong class="itemCount {xen:if $visitor.conversations_unread, '', 'Zero'}" id="VisitorExtraMenu_ConversationsCounter">
                                                <span class="Total">{xen:number $visitor.conversations_unread}</span>
                                            </strong>
                                    </span>
                                </a>
                            <!-- Alerts -->
                                <a href="{xen:link account/alerts}" class="OverlayTrigger pull-right">
                                    <span id="alertsIconWhite"></span>
                                    <span class="itemLabel>"
                                            <strong class="itemCount {xen:if $visitor.alerts_unread, '', 'Zero'}" id="VisitorExtraMenu_AlertsCounter">
                                                <span class="Total">{xen:number $visitor.alerts_unread}</span>
                                            </strong>
                                    </span>
                                </a>
                        </xen:if>
                        <xen:comment>
                            <a href="{xen:link members, $visitor}" onclick="this.removeAttribute('href');this.className='disableAccountNavi'" class="dropdown-toggle usernameProfileLink disableAccountNavi pull-right" title="{xen:phrase view_your_profile}" data-toggle="dropdown" rel="Menu">
                                <span class="itemLabel">
                                    {$visitor.username}
                                </span>
                            </a>
                        </xen:comment>
                            <!-- account -->
                            <li class="{xen:if $tabs.selected, 'selected', 'Popup PopupClosed'} pull-right">
                                <a href="{xen:link members, $visitor}" onclick="this.removeAttribute('href');this.className='disableAccountNavi'" class="dropdown-toggle usernameProfileLink disableAccountNavi pull-right" title="{xen:phrase view_your_profile}" data-toggle="dropdown" rel="Menu">
                                    <span class="itemLabel">{$visitor.username}</span>
                                </a>
                                    <div class="forumsTabLinks">
                                        <ul class="dropdown-menu secondaryContent blockLinksList">
                                            <div class="Menu JsOnly" id="AccountMenu">
                                                    <div class="primaryContent menuHeader">
                                                        <b class="menuFloatLeft">
                                                            <li>
                                                                <xen:avatar user="$visitor" size="s" img="true" />
                                                            </li>
                                                        </b>
                                                        <b class="menuFloatRight">
                                                            <h3><a href="{xen:link members, $visitor}" class="concealed" title="{xen:phrase view_your_profile}">{$visitor.username}</a></h3>
<xen:comment>
                                                            <xen:if hascontent="true"><div class="muted"><xen:contentcheck>{xen:helper usertitle, $visitor}</xen:contentcheck></div></xen:if>
</xen:comment>
                                                            <ul class="links">
                                                                <li class="fl"><a href="{xen:link members, $visitor}">{xen:phrase your_profile_page}</a></li>
                                                            </ul>
                                                        </b>
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
                                                        <b class="menuUserStatus">
                                                            <xen:if is="{$canUpdateStatus}">
                                                                <form action="{xen:link members/post, $visitor}" method="post" class="sectionFooter statusPoster AutoValidator" data-optInOut="OptIn">
                                                                    <textarea name="message" class="textCtrl StatusEditor Elastic" placeholder="{xen:phrase update_your_status}..." rows="1" cols="" style="height:18px" data-statusEditorCounter="#visMenuSEdCount" data-nofocus="true"></textarea>
                                                                    <div class="submitUnit">
                                                                        <span id="visMenuSEdCount" title="{xen:phrase characters_remaining}"></span>
                                                                        <input type="submit" class="button primary MenuCloser" value="{xen:phrase post_verb}" />
                                                                        <input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
                                                                        <input type="hidden" name="return" value="1" /> 
                                                                    </div>
                                                                </form>
                                                            </xen:if>
                                                        </b>
                                            </div>	
                                        </ul>
                                    </div>
                            </li>
                            <span class="helper"></span>
                    </ul>
		</div>
	</div>
</fieldset>
</xen:if>