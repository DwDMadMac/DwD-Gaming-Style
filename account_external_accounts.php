<xen:title>{xen:phrase external_accounts}</xen:title>

<xen:if is="{$xenOptions.facebookAppId}">
	<xen:container var="$facebookSdk">1</xen:container>
	
	<form action="{xen:link account/external-accounts/disassociate}" method="post" class="xenForm formOverlay NoFixedOverlay AutoValidator">
		<h3 class="textHeading">{xen:phrase facebook_integration}</h3>
		<xen:if is="{$external.facebook}">
			
			<xen:hook name="account_facebook_associated">
			<dl class="ctrlUnit">
				<dt>{xen:phrase associated_facebook_account}:</dt>
				<dd>
					<a href="http://www.facebook.com/profile.php?id={$external.facebook.provider_key}" class="avatar NoOverlay"><img src="https://graph.facebook.com/{$external.facebook.provider_key}/picture" alt="" /></a>
					<div><a href="http://www.facebook.com/profile.php?id={$external.facebook.provider_key}"><xen:if is="{$fbUser.name}">{$fbUser.name}<xen:else />{xen:phrase unknown_account}</xen:if></a></div>
				</dd>
			</dl>
			</xen:hook>
			
			<dl class="ctrlUnit submitUnit">
				<dt></dt>
				<dd><ul>
					<li>
						<label><input type="checkbox" name="disassociate" value="1" id="ctrl_disassociate_fb" class="Disabler" /> {xen:phrase disassociate_facebook_account}</label>
						<ul id="ctrl_disassociate_fb_Disabler">
							<li><input type="submit" class="button" value="{xen:phrase confirm_disassociation}" /></li>
						</ul>
						<xen:if is="!{$hasPassword}">
							<p class="explain">{xen:phrase disassociating_with_all_accounts_cause_password_emailed_x, 'email={$visitor.email}'}</p>
						</xen:if>
					</li>
				</ul></dd>
			</dl>
		<xen:else />
			<xen:hook name="account_facebook_not_associated">
			<dl class="ctrlUnit">
				<dt></dt>
				<dd>{xen:string nl2br, {xen:phrase your_account_is_not_currently_associated_with_facebook_account}}</dd>
			</dl>
			</xen:hook>
			
			<dl class="ctrlUnit submitUnit">
				<dt></dt>
				<dd><a href="{xen:link register/facebook, '', 'reg=1', 'assoc={$visitor.user_id}'}" class="button primary">{xen:phrase associate_with_facebook}</a></dd>
			</dl>
		</xen:if>

		<xen:if is="{$xenOptions.facebookFacepile}">
			<dl class="ctrlUnit">
				<dt></dt>
				<dd><fb:facepile width="300" max_rows="5" colorscheme="@fbColorScheme"></fb:facepile></dd>
			</dl>
		</xen:if>

		<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
		<input type="hidden" name="_xfConfirm" value="1" />
		<input type="hidden" name="account" value="facebook" />
	</form>
</xen:if>
<br />
<xen:if is="{$xenOptions.twitterAppKey}">
	<form action="{xen:link account/external-accounts/disassociate}" method="post" class="xenForm formOverlay NoFixedOverlay AutoValidator">
		<h3 class="textHeading">{xen:phrase twitter_integration}</h3>
		<xen:if is="{$external.twitter}">
			
			<dl class="ctrlUnit">
				<dt>{xen:phrase associated_twitter_account}:</dt>
				<dd>
				<xen:if is="{$twitterUser}">
					<a href="https://twitter.com/{$twitterUser.screen_name}" class="avatar NoOverlay"><img src="{$twitterUser.profile_image_url}" alt="" /></a>
					<div><a href="https://twitter.com/{$twitterUser.screen_name}">@{$twitterUser.screen_name} ({$twitterUser.name})</a></div>
				<xen:else />
					{xen:phrase unknown_account}
				</xen:if>
				</dd>
			</dl>
			
			<dl class="ctrlUnit submitUnit">
				<dt></dt>
				<dd><ul>
					<li>
						<label><input type="checkbox" name="disassociate" value="1" id="ctrl_disassociate_twitter" class="Disabler" /> {xen:phrase disassociate_twitter_account}</label>
						<ul id="ctrl_disassociate_twitter_Disabler">
							<li><input type="submit" class="button" value="{xen:phrase confirm_disassociation}" /></li>
						</ul>
						<xen:if is="!{$hasPassword}">
							<p class="explain">{xen:phrase disassociating_with_all_accounts_cause_password_emailed_x, 'email={$visitor.email}'}</p>
						</xen:if>
					</li>
				</ul></dd>
			</dl>
		<xen:else />
			<dl class="ctrlUnit">
				<dt></dt>
				<dd>{xen:string nl2br, {xen:phrase your_account_is_not_currently_associated_with_twitter_account}}</dd>
			</dl>
			
			<dl class="ctrlUnit submitUnit">
				<dt></dt>
				<dd><a href="{xen:link register/twitter, '', 'reg=1', 'assoc={$visitor.user_id}'}" class="button primary">{xen:phrase associate_with_twitter}</a></dd>
			</dl>
		</xen:if>

		<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
		<input type="hidden" name="_xfConfirm" value="1" />
		<input type="hidden" name="account" value="twitter" />
	</form>
</xen:if>
<br />
<xen:if is="{$xenOptions.googleClientId}">
	<form action="{xen:link account/external-accounts/disassociate}" method="post" class="xenForm formOverlay NoFixedOverlay AutoValidator">
		<h3 class="textHeading">{xen:phrase google_integration}</h3>
		<xen:if is="{$external.google}">
			
			<dl class="ctrlUnit">
				<dt>{xen:phrase associated_google_account}:</dt>
				<dd>
					<a href="https://plus.google.com/u/0/{$external.google.provider_key}">{xen:phrase view_account}</a>
				</dd>
			</dl>
			
			<dl class="ctrlUnit submitUnit">
				<dt></dt>
				<dd><ul>
					<li>
						<label><input type="checkbox" name="disassociate" value="1" id="ctrl_disassociate_google" class="Disabler" /> {xen:phrase disassociate_google_account}</label>
						<ul id="ctrl_disassociate_google_Disabler">
							<li><input type="submit" class="button" value="{xen:phrase confirm_disassociation}" /></li>
						</ul>
						<xen:if is="!{$hasPassword}">
							<p class="explain">{xen:phrase disassociating_with_all_accounts_cause_password_emailed_x, 'email={$visitor.email}'}</p>
						</xen:if>
					</li>
				</ul></dd>
			</dl>
		<xen:else />
			<dl class="ctrlUnit">
				<dt></dt>
				<dd>{xen:string nl2br, {xen:phrase your_account_is_not_currently_associated_with_google_account}}</dd>
			</dl>
			
			<dl class="ctrlUnit submitUnit">
				<dt></dt>
				<dd>
					<span class="button primary GoogleLogin" data-client-id="{$xenOptions.googleClientId}" data-redirect-url="{xen:link register/google, '', 'code=__CODE__', 'csrf={$session.sessionCsrf}'}"><span>{xen:phrase associate_with_google}</span></span>
				</dd>
			</dl>
		</xen:if>

		<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
		<input type="hidden" name="_xfConfirm" value="1" />
		<input type="hidden" name="account" value="google" />
	</form>
</xen:if>