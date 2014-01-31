<xen:title>{xen:phrase alert_preferences}</xen:title>

<xen:require css="account.css" />
<xen:require js="js/xenforo/personal_details_editor.js" />

<xen:edithint template="account_avatar_overlay.css" />
<xen:edithint template="account_avatar_overlay" />

<form method="post" class="xenForm formOverlay NoFixedOverlay AutoValidator"
	action="{xen:link 'account/alert-preferences-save'}"
	data-fieldValidatorUrl="{xen:link 'account/validate-field.json'}">
	
	<h3 class="sectionHeader">{xen:phrase messages_in_threads}</h3>
	<dl class="ctrlUnit">
		<dt>{xen:phrase receive_alert_when_someone}...</dt>
		<dd>
			<ul>
				<xen:hook name="account_alerts_messages_in_threads">
				<li><input type="hidden" name="alertSet[post_insert]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_insert]" {xen:checked "!{$alertOptOuts.post_insert}"} autofocus="true" /> {xen:phrase replies_to_watched_thread}</label>
					<p class="hint">{xen:phrase someone_replies_to_thread_you_are_watching}</p>
				</li>
				<li><input type="hidden" name="alertSet[post_insert_attachment]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_insert_attachment]" {xen:checked "!{$alertOptOuts.post_insert_attachment}"} /> {xen:phrase attaches_file_to_watched_thread}</label>
					<p class="hint">{xen:phrase someone_replies_and_attaches_a_file_to_a_thread_you_are_watching}</p>
				</li>
				<li><input type="hidden" name="alertSet[post_quote]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_quote]" {xen:checked "!{$alertOptOuts.post_quote}"} /> {xen:phrase quotes_your_message}</label>
					<p class="hint">{xen:phrase someone_directly_quotes_one_of_your_messages_in_thread}</p>
				</li>
				<li><input type="hidden" name="alertSet[post_tag]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_tag]" {xen:checked "!{$alertOptOuts.post_tag}"} /> {xen:phrase tags_you_in_message}</label>
					<p class="hint">{xen:phrase someone_tags_you_in_a_message}</p>
				</li>
				<li><input type="hidden" name="alertSet[post_like]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_like]" {xen:checked "!{$alertOptOuts.post_like}"} /> {xen:phrase likes_your_message}</label>
					<p class="hint">{xen:phrase someone_likes_one_of_your_messages_in_thread}</p>
				</li>
				</xen:hook>
			</ul>
		</dd>
	</dl>

	<xen:hook name="account_alerts_after_posts" />
	
	<h3 class="sectionHeader">{xen:phrase messages_on_profile_pages}</h3>
	<dl class="ctrlUnit">
		<dt>{xen:phrase receive_alert_when_someone}...</dt>
		<dd>
			<ul>
				<xen:hook name="account_alerts_messages_on_profile_pages">
				<li><input type="hidden" name="alertSet[profile_post_insert]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_insert]" {xen:checked "!{$alertOptOuts.profile_post_insert}"} /> {xen:phrase posts_on_your_profile}</label>
					<p class="hint">{xen:phrase someone_posts_message_on_your_profile_page}</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_comment_your_profile]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_comment_your_profile]" {xen:checked "!{$alertOptOuts.profile_post_comment_your_profile}"} /> {xen:phrase comments_on_your_profile_or_status}</label>
					<p class="hint">{xen:phrase someone_comments_on_message_on_your_profile_page_or_your_status}</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_comment_your_post]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_comment_your_post]" {xen:checked "!{$alertOptOuts.profile_post_comment_your_post}"} /> {xen:phrase comments_on_your_profile_posts_for_other_members}</label>
					<p class="hint">{xen:phrase someone_comments_on_message_you_left_on_someone_elses_profile}</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_comment_other_commenter]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_comment_other_commenter]" {xen:checked "!{$alertOptOuts.profile_post_comment_other_commenter}"} /> {xen:phrase also_comments_on_profile_post}</label>
					<p class="hint">{xen:phrase someone_comments_on_profile_post_that_you_have_commented_on}</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_tag]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_tag]" {xen:checked "!{$alertOptOuts.profile_post_tag}"} /> {xen:phrase tags_you_in_profile_post_or_comment}</label>
					<p class="hint">{xen:phrase someone_tags_you_post_or_comment_on_a_profile}</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_like]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_like]" {xen:checked "!{$alertOptOuts.profile_post_like}"} /> {xen:phrase likes_your_profile_post}</label>
					<p class="hint">{xen:phrase someone_likes_message_you_left_on_member_profile_page}</p>
				</li>
				</xen:hook>
			</ul>
		</dd>
	</dl>
	
	<xen:hook name="account_alerts_after_profile_posts" />
		
	<h3 class="sectionHeader">{xen:phrase achievements}</h3>
	<dl class="ctrlUnit">
		<dt>{xen:phrase receive_alert_when_you_receive}...</dt>
		<dd>
			<ul>
				<xen:hook name="account_alerts_achievements">
				<li><input type="hidden" name="alertSet[user_following]" value="1" />
					<label><input type="checkbox" value="1" name="alert[user_following]" {xen:checked "!{$alertOptOuts.user_following}"} /> {xen:phrase new_follower}</label
					 ><p class="hint">{xen:phrase someone_starts_following_you}</p>
				</li>
				<li><input type="hidden" name="alertSet[user_trophy]" value="1" />
					<label><input type="checkbox" value="1" name="alert[user_trophy]" {xen:checked "!{$alertOptOuts.user_trophy}"} /> {xen:phrase new_trophy}</label>
					<p class="hint">{xen:phrase you_awarded_new_trophy_for_passing_milestone}</p>
				</li>
				</xen:hook>
			</ul>
		</dd>
	</dl>
	
	<xen:hook name="account_alerts_extra" />

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="{xen:phrase save_changes}" accesskey="s" class="button primary" /></dd>
	</dl>
	
	<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
</form>