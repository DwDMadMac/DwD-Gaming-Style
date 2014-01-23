<xen:title>{xen:phrase invite_your_contacts_to, 'boardTitle={$xenOptions.boardTitle}'}</xen:title>

<xen:require css="friend_inviter_index.css" />

<xen:if is="!{$xenOptions.inviterNavTab}">
	<xen:navigation>
		<xen:breadcrumb href="{xen:link full:friend-inviter}">{xen:phrase friend_inviter}</xen:breadcrumb>
	</xen:navigation>
</xen:if>

<div class="friendInviterServices">

	<xen:if is="{$googleEnabled}">
		<div class="friendInviterGoogle">
			<a href="{$googleLogin}" ><img src="styles/FriendInviter/google.png" /></a>
			<span class="serviceTitle">{xen:phrase google}</span>
			<xen:if is="{$googleHasToken}">
				<span class="userDetails">{xen:phrase you_are_signed_into_x_as, 'service={xen:phrase google}'}:</span>
				<span><a href="mailto:{$googleLoggedInAs}" target="_blank">{$googleLoggedInAs}</a></span>
				<span><a href="{xen:link friend-inviter/unlink/google}" class="OverlayTrigger">{xen:phrase unlink}</a></span>
			<xen:else />
				<span class="userDetails">{xen:phrase you_are_not_yet_signed_into_x, 'service={xen:phrase google}'}</span>
			</xen:if>
		</div>
	</xen:if>	

	<xen:if is="{$yahooEnabled}">
		<div class="friendInviterYahoo">
			<a href="{$yahooLogin}"><img src="styles/FriendInviter/yahoo.png" /></a>
			<span class="serviceTitle">{xen:phrase yahoo}</span>
			<xen:if is="{$yahooHasToken}">
				<span class="userDetails">{xen:phrase you_are_signed_into_x_as, 'service={xen:phrase yahoo}'}:</span>
				<span><a href="{$yahooProfileUrl}">{$yahooLoggedInAs}</a></span>
				<span><a href="{xen:link friend-inviter/unlink/yahoo}" class="OverlayTrigger">{xen:phrase unlink}</a></span>
			<xen:else />
				<span class="userDetails">{xen:phrase you_are_not_yet_signed_into_x, 'service={xen:phrase yahoo}'}</span>
			</xen:if>
		</div>
	</xen:if>

	<xen:if is="{$facebookEnabled}">
		<div class="friendInviterFacebook">
			<a href="{$facebookLogin}"><img src="styles/FriendInviter/facebook.png" /></a>
			<span class="serviceTitle">{xen:phrase facebook}</span>
			<xen:if is="{$facebookHasToken}">
				<span class="userDetails">{xen:phrase you_are_signed_into_x_as, 'service={xen:phrase facebook}'}:</span>
				<span><a href="{$facebookLoggedInAs.link}" target="_blank">{$facebookLoggedInAs.name}</a></span>
				<span><a href="{xen:link friend-inviter/unlink/facebook}" class="OverlayTrigger">{xen:phrase unlink}</a></span>
			<xen:else />
				<span class="userDetails">{xen:phrase you_are_not_yet_signed_into_x, 'service={xen:phrase facebook}'}</span>
			</xen:if>
		</div>
	</xen:if>

	<xen:if is="{$twitterEnabled}">		
		<div class="friendInviterTwitter">
			<a href="{$twitterLogin}"><img src="styles/FriendInviter/twitter.png" /></a>
			<span class="serviceTitle">{xen:phrase twitter}</span>
			<xen:if is="{$twitterHasToken}">
				<span class="userDetails">{xen:phrase you_are_signed_into_x_as, 'service={xen:phrase twitter}'}:</span>
				<span><a href="http://twitter.com/{$twitterLoggedInAs}" target="_blank">{$twitterLoggedInAs}</a></span>
				<span><a href="{xen:link friend-inviter/unlink/twitter}" class="OverlayTrigger">{xen:phrase unlink}</a></span>
			<xen:else />
				<span class="userDetails">{xen:phrase you_are_not_yet_signed_into_x, 'service={xen:phrase twitter}'}</span>
			</xen:if>
		</div>
	</xen:if>

	<xen:if is="{$emailEnabled}">		
		<div class="friendInviterEmail">
			<a href="{xen:link friend-inviter/email}"><img src="styles/FriendInviter/email.png" /></a>
			<span class="serviceTitle">{xen:phrase email}</span>
			<span class="userDetails">{xen:phrase dont_use_these_services_manual_email}</span>
			<span></span>
		</div>
	</xen:if>

</div>