<xen:title>{xen:phrase contact_details}</xen:title>

<xen:require css="account.css" />

<form method="post" class="xenForm formOverlay NoFixedOverlay AutoValidator"
	action="{xen:link 'account/contact-details-save'}"
	data-fieldValidatorUrl="{xen:link 'account/validate-field.json'}" data-redirect="yes">
	
	<xen:hook name="account_contact_details_email_password">

	<xen:if is="{$hasPassword}">
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_email">{xen:phrase email_address}:</label></dt>
				<dd>
					<input type="email" name="email" value="{$visitor.email}" dir="ltr" class="textCtrl ConfirmValue" id="ctrl_email" autofocus="autofocus" />
					<p class="explain">{xen:phrase if_you_change_your_email_you_may_need_to_reconfirm_your_account}</p>
				</dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_password">{xen:phrase current_password}:</label></dt>
				<dd>
					<input type="password" name="password" value="" class="textCtrl OptOut" id="ctrl_password" />
					<p class="explain">{xen:phrase this_is_only_needed_when_changing_your_email_address}</p>
				</dd>
			</dl>
		</fieldset>
	<xen:else />
		<dl class="ctrlUnit">
			<dt>{xen:phrase email_address}:</dt>
			<dd>
				{$visitor.email}
				<p class="explain">{xen:phrase your_email_cannot_be_changed_while_your_account_does_not_have_password} <a href="{xen:link account/request-password}" class="OverlayTrigger">{xen:phrase request_password_be_emailed_to_you}</a></p>
			</dd>
		</dl>
	</xen:if>
	
	</xen:hook>

	<h3 class="sectionHeader">{xen:phrase messaging_preferences}</h3>

	<dl class="ctrlUnit sectionLink">
		<dt></dt>
		<dd>
			<ul>
				<xen:hook name="account_contact_details_messaging">
				<li><label for="ctrl_receive_admin_email"><input type="checkbox" name="receive_admin_email" value="1" id="ctrl_receive_admin_email" {xen:checked '{$visitor.receive_admin_email}'} />
					{xen:phrase receive_site_mailings}</label>
					<p class="hint">{xen:phrase you_will_receive_emails_sent_by_administrator_to_all_members}</p>
				</li>
				<li><label for="ctrl_allow_send_personal_conversation_enable"><input type="checkbox" name="allow_send_personal_conversation_enable" value="1" id="ctrl_allow_send_personal_conversation_enable" class="Disabler OptOut" {xen:checked "{$visitor.allow_send_personal_conversation} != 'none' "} />
					{xen:phrase accept_conversations_from}...</label>
					<ul id="ctrl_allow_send_personal_conversation_enable_Disabler">
						<li>
							<select name="allow_send_personal_conversation" class="textCtrl autoSize" id="ctrl_allow_send_personal_conversation">
								<xen:comment><option value="everyone" {xen:selected "{$visitor.allow_send_personal_conversation} == 'everyone' "} disabled="disabled">{xen:phrase all_visitors}</option></xen:comment>
								<option value="members"  {xen:selected "{$visitor.allow_send_personal_conversation} == 'members'  "}>{xen:phrase members_only}</option>
								<option value="followed" {xen:selected "{$visitor.allow_send_personal_conversation} == 'followed' "}>{xen:phrase people_you_follow_only}</option>
							</select>
						</li>
					</ul>
				</li>				
				<li>
					<label for="ctrl_email_on_conversation"><input type="checkbox" name="email_on_conversation" value="1" id="ctrl_email_on_conversation" {xen:checked '{$visitor.email_on_conversation}'} />
					{xen:phrase receive_email_when_new_conversation_message_is_received}</label>
					<p class="hint">{xen:phrase email_notifications_for_new_conversations_replies_to_existing}</p>
				</li>
				</xen:hook>
			</ul>
		</dd>
	</dl>
	
        <xen:if is="{$canEditProfile}">
	<xen:hook name="account_contact_details_identities">
		<h3 class="sectionHeader">{xen:phrase identities}</h3>
		<xen:include template="custom_fields_edit" />
	<h3 class="sectionHeader">{xen:phrase identities}</h3>
	
	<xen:include template="custom_fields_edit" />
	
	</xen:hook>
	</xen:if>
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="{xen:phrase save_changes}" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
</form>