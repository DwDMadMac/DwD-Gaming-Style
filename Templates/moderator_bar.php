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
			
			<span class="helper"></span>
		</div>
	</div>
</fieldset>
</xen:if>