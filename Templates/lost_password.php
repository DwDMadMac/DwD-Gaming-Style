<xen:title>{xen:phrase lost_password}</xen:title>

<form action="{xen:link 'lost-password/lost'}" method="post" class="xenForm formOverlay">
        <p>
            {xen:phrase if_forgotten_your_password_use_form_to_reset}
            {xen:phrase reset_your_password_with_secret_question, 'link={xen:link 'lost-password/secret-question'}'}
        </p>
	
	<dl class="ctrlUnit">
		<dt><label for="ctrl_username_email">{xen:phrase name_or_email}:</label></dt>
		<dd><input type="text" name="username_email" class="textCtrl" id="ctrl_username_email" autofocus="true" /></dd>
	</dl>

	<xen:if hascontent="true">
		<fieldset>
			<xen:contentcheck>
				<xen:include template="helper_captcha_unit" />
			</xen:contentcheck>
		</fieldset>
	</xen:if>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="{xen:phrase reset_password}" accesskey="s" class="button primary" /></dd>
	</dl>
	
	<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
</form>