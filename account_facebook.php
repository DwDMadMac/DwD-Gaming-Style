<xen:title>{xen:phrase facebook_integration}</xen:title>

<xen:if is="{$visitor.facebook_auth_id}">
	<form action="{xen:link account/facebook}" method="post" class="xenForm">
		
		<xen:hook name="account_facebook_associated">
		<dl class="ctrlUnit">
			<dt>{xen:phrase associated_facebook_account}:</dt>
			<dd>
				<a href="http://www.facebook.com/profile.php?id={$visitor.facebook_auth_id}" class="avatar NoOverlay"><img src="https://graph.facebook.com/{$visitor.facebook_auth_id}/picture" alt="" /></a>
				<a href="http://www.facebook.com/profile.php?id={$visitor.facebook_auth_id}"><xen:if is="{$fbUser.name}">{$fbUser.name}<xen:else />{xen:phrase unknown_account}</xen:if></a>
			</dd>
		</dl>
		</xen:hook>
		
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd><ul>
				<li>
					<label><input type="checkbox" name="disassociate" value="1" id="ctrl_disassociate" class="Disabler" /> {xen:phrase disassociate_facebook_account}</label>
					<ul id="ctrl_disassociate_Disabler">
						<li><input type="submit" class="button" name="disassociate_confirm" value="{xen:phrase confirm_disassociation}" /></li>
					</ul>
					<xen:if is="!{$hasPassword}">
						<p class="explain">{xen:phrase disassociating_with_facebook_will_cause_password_generated_emailed_x, 'email={$visitor.email}'}</p>
					</xen:if>
				</li>
			</ul></dd>
		</dl>
		
		<xen:if is="{$xenOptions.facebookAppId} AND {$xenOptions.facebookFacepile}">
			<xen:container var="$facebookSdk">1</xen:container>
			<dl class="ctrlUnit">
				<dt></dt>
				<dd><fb:facepile width="300" max_rows="5" colorscheme="@fbColorScheme"></fb:facepile></dd>
			</dl>
		</xen:if>
	
		<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
		<input type="hidden" name="_xfConfirm" value="1" />
	</form>
<xen:else />
	<form action="{xen:link account}" method="post" class="xenForm">
	
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
		
		<xen:if is="{$xenOptions.facebookAppId} AND {$xenOptions.facebookFacepile}">
			<xen:container var="$facebookSdk">1</xen:container>
			<dl class="ctrlUnit">
				<dt></dt>
				<dd><fb:facepile width="{xen:calc '@formWidth - @ctrlUnitLabelWidth'}" max_rows="5" colorscheme="@fbColorScheme"></fb:facepile></dd>
			</dl>
		</xen:if>
	</form>
</xen:if>