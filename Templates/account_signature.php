<xen:title>{xen:phrase edit_signature}</xen:title>

<xen:require css="account.css" />

<form method="post" class="xenForm AutoValidator Preview"
	action="{xen:link 'account/signature-save'}"
	data-previewUrl="{xen:link 'account/signature-preview'}">

	<dl class="ctrlUnit fullWidth">
		<dt></dt>
		<dd>{xen:raw $signatureEditor}</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" name="save" value="{xen:phrase save_changes}" accesskey="s" class="button primary" />
			<input type="button" value="{xen:phrase preview}..." class="button PreviewButton JsOnly" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
</form>