<xen:require css="moderator_bar.css" />

<xen:if hascontent="true">
<fieldset id="moderatorBar">
	<div class="pageWidth">
		<div class="pageContent">
		<xen:contentcheck>
			<xen:if is="{$visitor.is_admin}">			
				<a href="admin.php" class="acp adminLink"><span class="itemLabel">{xen:phrase admin_control_panel_short}</span></a>
				
				<xen:if is="{$session.permissionTest}">
					<a href="{xen:link misc/reset-permissions}" class="permissionTest adminLink OverlayTrigger">
						<span class="itemLabel">{xen:phrase permissions_from_x, 'name={$session.permissionTest.username}'}</span>
					</a>
				</xen:if>
			</xen:if>
			
			<xen:if is="{$visitor.is_moderator} AND {$session.moderationCounts.total}">
				<a href="{xen:link moderation-queue}" class="moderationQueue modLink">
					<span class="itemLabel">{xen:phrase moderation_queue_short}:</span>
					<span class="itemCount {xen:if {$session.moderationCounts.total}, 'alert'}">{$session.moderationCounts.total}</span>
				</a>
			</xen:if>
			
			<xen:if is="{$visitor.is_moderator} && !{$xenOptions.reportIntoForumId}">
				<a href="{xen:link reports}" class="reportedItems modLink">
					<span class="itemLabel">{xen:phrase reported_items_short}:</span>
					<span class="itemCount {xen:if '({$session.reportCounts.total} AND {$session.reportCounts.lastUpdate} > {$session.reportLastRead}) OR {$session.reportCounts.assigned}', 'alert'}" title="{xen:if $session.reportCounts.lastUpdate, '{xen:phrase last_report_update}: {xen:datetime $session.reportCounts.lastUpdate}'}"><xen:if is="{$session.reportCounts.assigned}">{$session.reportCounts.assigned} / {$session.reportCounts.total}<xen:else />{$session.reportCounts.total}</xen:if></span>
				</a>
			</xen:if>
			
			<xen:if is="{$visitor.is_admin} AND {$session.canAdminUsers} AND {$session.userModerationCounts.total}">
				<a href="admin.php?users/moderated" class="userModerationQueue modLink">
					<span class="itemLabel">{xen:phrase users_awaiting_approval_short}:</span>
					<span class="itemCount {xen:if {$session.userModerationCounts.total}, 'alert'}">{$session.userModerationCounts.total}</span>
				</a>
			</xen:if>

			<xen:hook name="moderator_bar" />
		</xen:contentcheck>
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
                        <a href="{xen:link members, $visitor}" class="usernameProfileLink pull-right" title="{xen:phrase view_your_profile}">
                            <span class="itemLabel">
                                {$visitor.username}
                            </span>
                        </a>
			
			<span class="helper"></span>
		</div>
	</div>
</fieldset>
</xen:if>