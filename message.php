<xen:require css="message.css" />
<xen:require css="bb_code.css" />

<li id="{$messageId}" class="message {xen:if $message.isDeleted, 'deleted'} {xen:if '{$message.is_staff}', 'staff'} {xen:if $message.isIgnored, ignored}" data-author="{$message.username}">

	<xen:include template="message_user_info">
		<xen:map from="$message" to="$user" />
	</xen:include>

	<div class="messageInfo">
		<xen:if is="{$message.isNew}"><strong class="newIndicator"><span></span>{xen:phrase new}</strong></xen:if>
		
		<xen:if hascontent="true">
			<ul class="messageNotices">
				<xen:contentcheck>
					<xen:hook name="message_notices" params="{xen:array 'message={$message}'}">
						<xen:if is="{$message.warning_message}">
							<li class="warningNotice"><span class="icon Tooltip" title="{xen:phrase warning}" data-tipclass="iconTip flipped"></span>{$message.warning_message}</li>
						</xen:if>
						<xen:if is="{$message.isDeleted}">
							<li class="deletedNotice"><span class="icon Tooltip" title="{xen:phrase deleted}" data-tipclass="iconTip flipped"></span>{xen:phrase this_message_has_been_removed_from_public_view}</li>
						<xen:elseif is="{$message.isModerated}" />
							<li class="moderatedNotice"><span class="icon Tooltip" title="{xen:phrase awaiting_moderation}" data-tipclass="iconTip flipped"></span>{xen:phrase this_message_is_awaiting_moderator_approval_and_is_invisible_to_normal}</li>
						</xen:if>
						<xen:if is="{$message.isIgnored}">
							<li>{xen:phrase you_are_ignoring_content_by_this_member} <a href="javascript:" class="jsOnly DisplayIgnoredContent">{xen:phrase show_ignored_content}</a></li>
						</xen:if>
					</xen:hook>
				</xen:contentcheck>
			</ul>
		</xen:if>
		
		<xen:hook name="message_content" params="{xen:array 'message={$message}'}">
		<div class="messageContent">		
			<article>
				<blockquote class="messageText ugc baseHtml{xen:if $message.isIgnored, ' ignored'}" style="background-color: rgba(255, 255, 255, 0.5);border-top: 1px solid rgb(139, 0, 0);border-right: 1px solid rgb(139, 0, 0);border-bottom: 1px solid rgb(139, 0, 0);border-radius: 5px;">
					<xen:include template="ad_message_body" />
					{xen:raw $message.messageHtml}
				</blockquote>
			</article>
			
			{xen:raw $messageContentAfterTemplate}
		</div>
		</xen:hook>
		
		<xen:if is="{$message.last_edit_date}">
			<div class="editDate">
			<xen:if is="{$message.user_id} == {$message.last_edit_user_id}">
				{xen:phrase last_edited}: <xen:datetime time="{$message.last_edit_date}" />
			<xen:else />
				{xen:phrase last_edited_by_moderator}: <xen:datetime time="{$message.last_edit_date}" />
			</xen:if>
			</div>
		</xen:if>
		
		<xen:if is="{$visitor.content_show_signature} && {$message.signature}">
			<div class="baseHtml signature messageText ugc{xen:if $message.isIgnored, ' ignored'}"><aside>{xen:raw $message.signatureHtml}</aside></div>
		</xen:if>
		
		{xen:raw $messageAfterTemplate}
		
		<div id="likes-{$messageId}"><xen:if is="{$message.likes}"><xen:include template="likes_summary" /></xen:if></div>
	</div>

	<xen:hook name="message_below" params="{xen:array 'post={$message}','message_id={$messageId}'}" />
	
	<xen:include template="ad_message_below" />
	
</li>