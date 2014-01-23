<xen:title>{xen:phrase privacy}</xen:title>

<xen:require css="account.css" />

<form method="post" class="xenForm privacyForm formOverlay NoFixedOverlay AutoValidator"
	action="{xen:link 'account/privacy-save'}"
	data-fieldValidatorUrl="{xen:link 'account/validate-field.json'}">
	
	<xen:hook name="account_privacy_top">

	<dl class="ctrlUnit surplusLabel">
		<dt><label>{xen:phrase activity_display}:</label></dt>
		<dd>
			<ul>
				<li><label for="ctrl_visible"><input type="checkbox" name="visible" value="1" id="ctrl_visible" class="OptOut" autofocus="autofocus" {xen:checked "{$visitor.visible}"} /> {xen:phrase show_your_online_status}</label> <p class="hint">{xen:phrase this_will_allow_other_people_to_see_what_page_you_currently_viewing}</p></li>
			</ul>
		</dd>
	</dl>

	<dl class="ctrlUnit surplusLabel">
		<dt><label>{xen:phrase administrator_email}:</label></dt>
		<dd>
			<ul>
				<li><label for="ctrl_receive_admin_email"><input type="checkbox" name="receive_admin_email" value="1" id="ctrl_receive_admin_email" class="OptOut" {xen:checked "{$visitor.receive_admin_email}"} /> {xen:phrase receive_site_mailings}</label> <p class="hint">{xen:phrase you_will_receive_emails_sent_by_administrator_to_all_members}</p></li>
			</ul>
		</dd>
	</dl>

	<xen:include template="account_privacy_dob" />
	
	</xen:hook>

	<h3 class="sectionHeader">{xen:phrase people_who_may}...</h3>

	<fieldset>
		<dl class="ctrlUnit sectionLink" id="personal_details">
			<dt><a href="{xen:link 'account/personal-details'}">{xen:phrase edit_your_personal_details}</a></dt>
			<dd>
				<ul>
					<xen:hook name="account_privacy_personal_details">
					<li><label for="ctrl_allow_view_profile_enable"><input type="checkbox" name="allow_view_profile_enable" value="1" id="ctrl_allow_view_profile_enable" class="Disabler OptOut" {xen:checked "{$visitor.allow_view_profile} != 'none' "} /> {xen:phrase view_your_details_on_your_profile_page}:</label>
						<ul id="ctrl_allow_view_profile_enable_Disabler">
							<li>
								<select name="allow_view_profile" class="textCtrl autoSize" id="ctrl_allow_view_profile">
									<option value="everyone" {xen:selected "{$visitor.allow_view_profile} == 'everyone' "}>{xen:phrase all_visitors}</option>
									<option value="members"  {xen:selected "{$visitor.allow_view_profile} == 'members'  "}>{xen:phrase members_only}</option>
									<option value="followed" {xen:selected "{$visitor.allow_view_profile} == 'followed' "}>{xen:phrase people_you_follow_only}</option>
								</select>
							</li>
						</ul>
					</li>
					<li><label for="ctrl_allow_post_profile_enable"><input type="checkbox" name="allow_post_profile_enable" value="1" id="ctrl_allow_post_profile_enable" class="Disabler OptOut" {xen:checked "{$visitor.allow_post_profile} != 'none' "} /> {xen:phrase post_messages_on_your_profile_page}:</label>
						<ul id="ctrl_allow_post_profile_enable_Disabler">
							<li>
								<select name="allow_post_profile" class="textCtrl autoSize" id="ctrl_allow_post_profile">
									<xen:comment><option value="everyone" {xen:selected "{$visitor.allow_post_profile} == 'everyone' "} disabled="disabled">{xen:phrase all_visitors}</option></xen:comment>
									<option value="members"  {xen:selected "{$visitor.allow_post_profile} == 'members'  "}>{xen:phrase members_only}</option>
									<option value="followed" {xen:selected "{$visitor.allow_post_profile} == 'followed' "}>{xen:phrase people_you_follow_only}</option>
								</select>
							</li>
						</ul>
					</li>
					</xen:hook>
				</ul>
			</dd>
		</dl>

		<dl class="ctrlUnit surplusLabel">
			<dt><label for="ctrl_allow_receive_news_feed">{xen:phrase news_feed}:</label></dt>
			<dd>
				<ul>
					<xen:hook name="account_privacy_news_feed">
					<li><label for="ctrl_allow_receive_news_feed_enable"><input type="checkbox" name="allow_receive_news_feed_enable" value="1" id="ctrl_allow_receive_news_feed_enable" class="Disabler OptOut" {xen:checked "{$visitor.allow_receive_news_feed} != 'none' "} /> {xen:phrase receive_your_news_feed}:</label>
						<ul id="ctrl_allow_receive_news_feed_enable_Disabler">
							<li>
								<select name="allow_receive_news_feed" class="textCtrl autoSize" id="ctrl_allow_receive_news_feed">
									<option value="everyone" {xen:selected "{$visitor.allow_receive_news_feed} == 'everyone' "}>{xen:phrase all_visitors}</option>
									<option value="members"  {xen:selected "{$visitor.allow_receive_news_feed} == 'members'  "}>{xen:phrase members_only}</option>
									<option value="followed" {xen:selected "{$visitor.allow_receive_news_feed} == 'followed' "}>{xen:phrase people_you_follow_only}</option>
								</select>
							</li>
						</ul>
					</li>
					</xen:hook>
				</ul>
			</dd>
		</dl>
	</fieldset>

	<fieldset>
		<dl class="ctrlUnit sectionLink" id="contact_details">
			<dt><a href="{xen:link 'account/contact-details'}">{xen:phrase edit_your_contact_details}</a></dt>
			<dd>
				<ul>
					<xen:hook name="account_privacy_contact_details">
					<li><label for="ctrl_allow_send_personal_conversation_enable"><input type="checkbox" name="allow_send_personal_conversation_enable" value="1" id="ctrl_allow_send_personal_conversation_enable" class="Disabler OptOut" {xen:checked "{$visitor.allow_send_personal_conversation} != 'none' "} /> {xen:phrase start_conversations_with_you}:</label>
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
					<li><label for="ctrl_allow_view_identities_enable"><input type="checkbox" name="allow_view_identities_enable" value="1" id="ctrl_allow_view_identities_enable" class="Disabler OptOut" {xen:checked "{$visitor.allow_view_identities} != 'none' "} /> {xen:phrase view_your_identities}:</label>
						<ul id="ctrl_allow_view_identities_enable_Disabler">
							<li>
								<select name="allow_view_identities" class="textCtrl autoSize" id="ctrl_allow_view_identities">
									<option value="everyone" {xen:selected "{$visitor.allow_view_identities} == 'everyone' "}>{xen:phrase all_visitors}</option>
									<option value="members"  {xen:selected "{$visitor.allow_view_identities} == 'members'  "}>{xen:phrase members_only}</option>
									<option value="followed" {xen:selected "{$visitor.allow_view_identities} == 'followed' "}>{xen:phrase people_you_follow_only}</option>
								</select>
							</li>
						</ul>
					</li>
					</xen:hook>
				</ul>
			</dd>
		</dl>
	</fieldset>
	
	<xen:hook name="account_privacy_bottom" />

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="{xen:phrase save_changes}" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
</form>