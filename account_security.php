<xen:title>{xen:phrase password}</xen:title>

<xen:require css="account.css" />

<form method="post" class="xenForm formOverlay AutoValidator ContactDetailsForm"
	action="{xen:link 'account/security-save'}"
	data-fieldValidatorUrl="{xen:link 'account/validate-field.json'}"
	data-optInOut="OptIn">
	
	<xen:if is="{$hasPassword}">
		<dl class="ctrlUnit">
			<dt><label for="ctrl_password_original">{xen:phrase your_existing_password}:</label></dt>
			<dd>
				<input type="password" name="old_password" value="" dir="ltr" class="textCtrl" id="ctrl_password_original" autofocus="autofocus" />
				<p class="explain">{xen:phrase you_must_verify_existing_password_before_changing}</p>
			</dd>
		</dl>
	
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_password">{xen:phrase new_password}:</label></dt>
				<dd><input type="password" name="password" value="" dir="ltr" class="textCtrl" id="ctrl_password" /></dd>
			</dl>
	
			<dl class="ctrlUnit">
				<dt><label for="ctrl_password_confirm">{xen:phrase confirm_new_password}:</label></dt>
				<dd><input type="password" name="password_confirm" value="" class="textCtrl" dir="ltr" id="ctrl_password_confirm" /></dd>
			</dl>
		</fieldset>
	
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd><input type="submit" name="save" value="{xen:phrase save_changes}" accesskey="s" class="button primary" /></dd>
		</dl>
	<xen:else />
		<dl class="ctrlUnit fullWidth">
			<dt></dt>
			<dd>{xen:phrase your_account_does_not_currently_have_password} <a href="{xen:link account/request-password}" class="OverlayTrigger">{xen:phrase request_password_be_emailed_to_you}</a></dd>
		</dl>
	</xen:if>

	<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
</form>