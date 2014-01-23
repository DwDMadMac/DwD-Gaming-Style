<xen:title>{xen:phrase personal_details}</xen:title>

<xen:require css="account.css" />
<xen:require js="js/xenforo/personal_details_editor.js" />

<xen:edithint template="account_avatar_overlay.css" />
<xen:edithint template="account_avatar_overlay" />

<form method="post" class="xenForm personalDetailsForm formOverlay NoFixedOverlay AutoValidator"
	action="{xen:link 'account/personal-details-save'}"
	data-fieldValidatorUrl="{xen:link 'account/validate-field.json'}">

	<xen:hook name="account_personal_details_status">
	<xen:if is="{$canUpdateStatus}">
		<dl class="ctrlUnit">
			<dt><label for="ctrl_status">{xen:phrase status_message}:</label></dt>
			<dd>
				<textarea name="status" rows="2" cols="60" id="ctrl_status" autofocus="autofocus" class="textCtrl StatusEditor Elastic OptOut" data-statusEditorCounter="#statusEditorCounter"></textarea>
				<span id="statusEditorCounter" title="{xen:phrase characters_remaining}"></span>
				<div class="explain"><h3 class="statusHeader">{xen:phrase current_status}:</h3> <span class="CurrentStatus"><xen:if is="{$visitor.status}">{xen:string censor, $visitor.status}<xen:else />({xen:phrase none})</xen:if></span><!--TODO: clearing--></div>
			</dd>
		</dl>
	</xen:if>
	</xen:hook>

	<xen:if hascontent="true">
		<fieldset>
			<xen:contentcheck>
				<xen:if is="{$canEditAvatar}">
					<dl class="ctrlUnit avatarEditor">
						<dt><label>{xen:phrase avatar}:</label></dt>
						<dd>
							<xen:avatar user="$visitor" size="m" class="OverlayTrigger" href="{xen:link account/avatar}" />
							<p class="explain">{xen:phrase click_image_to_change_your_avatar}</p>
						</dd>
					</dl>
				</xen:if>
				
				<xen:if is="{$canEditCustomTitle}">
					<dl class="ctrlUnit">
						<dt><label for="ctrl_custom_title">{xen:phrase custom_title}:</label></dt>
						<dd>
							<input type="text" name="custom_title" value="{$visitor.custom_title}" id="ctrl_custom_title" class="textCtrl" />
							<p class="explain">{xen:phrase if_specified_replace_title_that_displays_under_name_in_posts}</p>
						</dd>
					</dl>
				</xen:if>
			</xen:contentcheck>
		</fieldset>
	</xen:if>

	<xen:hook name="account_personal_details_biometrics">
	<fieldset>
		<dl class="ctrlUnit">
			<dt><label>{xen:phrase gender}:</label></dt>
			<dd>
				<ul>
					<li><label for="ctrl_gender_male"><input type="radio" name="gender" value="male" id="ctrl_gender_male" {xen:checked "{$visitor.gender} == 'male'"} /> {xen:phrase male}</label></li>
					<li><label for="ctrl_gender_female"><input type="radio" name="gender" value="female" id="ctrl_gender_female" {xen:checked "{$visitor.gender} == 'female'"}  /> {xen:phrase female}</label></li>
					<li><label for="ctrl_gender_"><input type="radio" name="gender" value="" id="ctrl_gender_" {xen:checked "{$visitor.gender} == ''"}  /> ({xen:phrase unspecified})</label></li>
				</ul>
			</dd>
		</dl>

		<dl class="ctrlUnit OptOut">
			<dt>{xen:phrase date_of_birth}:</dt>
			<dd>
				<xen:if is="{$visitor.dob_day} && {$visitor.dob_month} && {$visitor.dob_year}">
					{xen:date $birthday.timeStamp, $birthday.format}
					<p class="explain">{xen:phrase once_your_birthday_has_been_entered_it_cannot_be_changed}</p>
				<xen:else />
					<xen:include template="helper_birthday_input">
						<xen:map from="$visitor" to="$user" />
					</xen:include>
				</xen:if>
			</dd>
		</dl>

		<xen:include template="account_privacy_dob" />
	</fieldset>
	</xen:hook>

	<xen:hook name="account_personal_details_information">
	<fieldset>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_location">{xen:phrase location}:</label></dt>
			<dd><input type="text" name="location" value="{$visitor.location}" id="ctrl_location" class="textCtrl OptOut" /></dd>
		</dl>

		<dl class="ctrlUnit">
			<dt><label for="ctrl_occupation">{xen:phrase occupation}:</label></dt>
			<dd><input type="text" name="occupation" value="{$visitor.occupation}" id="ctrl_occupation" class="textCtrl OptOut" /></dd>
		</dl>

		<dl class="ctrlUnit">
			<dt><label for="ctrl_homepage">{xen:phrase home_page}:</label></dt>
			<dd><input type="url" name="homepage" value="{$visitor.homepage}" id="ctrl_homepage" class="textCtrl" /></dd>
		</dl>
		
		<xen:include template="custom_fields_edit" />
	</fieldset>
	</xen:hook>

	<xen:hook name="account_personal_details_about">
	<dl class="ctrlUnit OptOut">
		<dt><label for="ctrl_about">{xen:phrase about_you}:</label> <dfn>{xen:phrase you_may_use_bb_code}</dfn></dt>
                <dd>
                    <textarea name="status" rows="10" cols="60" id="ctrl_status" autofocus="autofocus" class="textCtrl StatusEditor Elastic OptOut" data-statusEditorCounter="#statusEditorCounter"></textarea>
                </dd>
	</dl>
	</xen:hook>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="{xen:phrase save_changes}" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
</form>