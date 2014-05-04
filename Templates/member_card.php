<xen:edithint template="xenforo_overlay.css" />
<xen:require css="member_card.css" />

<div id="memberCard{$user.user_id}" data-overlayClass="memberCard">
	<div class="avatarCropper">
		<a class="avatar NoOverlay Av{$user.user_id}l" href="{xen:link members, $user}">
			<img src="{xen:helper avatar, {$user}, l}" alt="" style="{xen:helper avatarCropCss, $user}" />
		</a>
		<xen:if hascontent="true">
			<div class="modControls" style="position:absolute; bottom:0px; right:0px">
				<xen:contentcheck>
					<xen:if is="{$canEditUser}"><a href="{xen:link members/edit, $user}">{xen:phrase edit}</a></xen:if>
					<xen:if is="{$canCleanSpam}"><a href="{xen:link spam-cleaner, $user}" class="OverlayTrigger">{xen:phrase spam}</a></xen:if>
					<xen:if is="{$canWarn}"><a href="{xen:link members/warn, $user}">{xen:phrase warn}</a></xen:if>
					<xen:if is="{$canBanUsers}">
						<xen:if is="{$user.is_banned}">
							<a href="{xen:adminlink banning/users/lift, $user}">{xen:phrase lift_ban}</a>
						<xen:else />
							<a href="{xen:adminlink banning/users/add, $user}">{xen:phrase ban}</a></xen:if>
						</xen:if>
				</xen:contentcheck>
			</div>
		</xen:if>
	</div>
	
	<div class="userInfo">
		<h3 class="username"><xen:username user="$user" class="NoOverlay" /></h3>
		
		<div class="userTitleBlurb">
			<h4 class="userTitle">{xen:helper userTitle, $user}</h4>
			<div class="userBlurb">{xen:helper userBlurb, $user, 0}</div>
		</div>
		
		<blockquote class="status">{xen:helper bodytext, $user.status}</blockquote>

		<div class="userLinks">
		<xen:hook name="member_card_links">
			<a href="{xen:link members, $user}">{xen:phrase profile_page}</a>
			<xen:if is="{$visitor.user_id} AND {$user.user_id} != {$visitor.user_id}">
				<xen:if is="{$canStartConversation}"><a href="{xen:link conversations/add, '', 'to={$user.username}'}">{xen:phrase start_conversation}</a></xen:if>
				<xen:follow user="$user" class="Tooltip" />
				<xen:if is="{xen:helper isIgnored, $user.user_id}"><a href="{xen:link members/unignore, $user}" class="FollowLink">{xen:phrase unignore}</a><xen:elseif is="{$canIgnore}" /><a href="{xen:link members/ignore, $user}" class="FollowLink">{xen:phrase ignore}</a></xen:if>
			</xen:if>
		</xen:hook>
		</div>
		
		<dl class="userStats pairsInline">
		<xen:hook name="member_card_stats">
			<dt>{xen:phrase member_since}:</dt> <dd>{xen:date $user.register_date}</dd>
			<!-- slot: pre_messages -->
			<dt>{xen:phrase messages}:</dt> <dd><a href="{xen:link search/member, '', 'user_id={$user.user_id}'}" class="concealed" rel="nofollow">{xen:number $user.message_count}</a></dd>
			<!-- slot: pre_likes -->
			<dt>{xen:phrase likes_received}:</dt> <dd>{xen:number $user.like_count}</dd>
			<!-- slot: pre_trophies -->
			<dt>{xen:phrase trophy_points}:</dt> <dd><a href="{xen:link members/trophies, $user}" class="concealed OverlayTrigger">{xen:number $user.trophy_points}</a></dd>
			<xen:if is="{$canViewWarnings}">
				<dt>{xen:phrase warning_points}:</dt> <dd><a href="{xen:link members, $user}#warnings" class="concealed">{xen:number $user.warning_points}</a></dd>
			</xen:if>
		</xen:hook>
		</dl>
	
		<xen:if is="{$canViewOnlineStatus}">
			<dl class="pairsInline lastActivity">
				<dt>{xen:phrase x_was_last_seen, 'username={$user.username}'}:</dt>
				<dd>
					<xen:if is="{$user.activity}">
						<xen:if is="{$user.activity.description}">
							{$user.activity.description}<xen:if is="{$user.activity.itemTitle}"> <em><a href="{$user.activity.itemUrl}" class="concealed">{$user.activity.itemTitle}</a></em></xen:if>,
						<xen:else />
							{xen:phrase viewing_unknown_page},
						</xen:if>
						<xen:datetime time="{$user.effective_last_activity}" class="muted" />
					<xen:else />
						<xen:datetime time="{$user.effective_last_activity}" />
					</xen:if>
				</dd>
			</dl>
		</xen:if>
	</div>
	
	<a class="close OverlayCloser"></a>
</div>