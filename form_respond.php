<xen:title>{xen:raw $form.title}</xen:title>
<xen:require css="form_respond.css" />

<xen:navigation>
	<xen:breadcrumb href="{xen:link forms/respond, $form}">{$form.title}</xen:breadcrumb>
</xen:navigation>
<xen:container var="$formId">{$form.form_id}</xen:container>

<xen:container var="$head.description">
	<meta name="description" content="{xen:helper snippet, $form.description, 155}" /></xen:container>


<form method="post" class="xenForm formOverlay NoFixedOverlay AutoValidator"
	action="{xen:link 'forms/save'}"
	data-fieldValidatorUrl="{xen:link 'forms/validate-field'}" data-redirect="on">
    
        <div class="baseHtml"><p id="pageDescription" class="muted">{xen:raw $form.description}</p></div>
	
	<xen:foreach loop="$fields" value="$field">
		<xen:if is="{$field}">
			<xen:include template="field_edit" />
		</xen:if>
	</xen:foreach>

	<xen:if is="{$attachmentParams}">
		<dl class="ctrlUnit AttachedFilesUnit">
			<dt><label for="ctrl_uploader">{xen:phrase attached_files}:</label></dt>
			<dd><xen:include template="attachment_editor" /></dd>
		</dl>
	</xen:if>

	<xen:include template="helper_captcha_unit" />

	<input type="hidden" name="form_id" value="{$form.form_id}"/>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="{xen:phrase submit}" class="button primary" />
			<xen:if is="{$attachmentManager}"><xen:include template="attachment_upload_button" /></xen:if>
		</dd>
	</dl>
</form>