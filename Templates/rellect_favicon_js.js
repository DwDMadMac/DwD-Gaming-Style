<script type="text/javascript">
<!--
!function($, window, document, _undefined)
{
	XenForo.setFavicons = function(to)
	{
		$(to).each(function(){
			if($(this).has('img').length)
			{
				// skip if the link is an image
				return true;
			}
			$(this).addClass('setFavicon').css(
				"background-image", "url(https://www.google.com/s2/favicons?domain=" + this.href + ")"
			);
		});
	}

	var links = [".message .messageContent a.internalLink", ".message .messageContent a.externalLink"];
	if(@favicon_in_signatures)
		links.push(".message .signature a.internalLink", ".message .signature a.externalLink");

	XenForo.setFavicons(links.join(", "));

	/**
	* Monkey patching for quick edit
	*/
	XenForo.showMessagesTemp = XenForo.showMessages;
	XenForo.showMessages = function(ajaxData, $ctrl, method)
	{
		XenForo.showMessagesTemp(ajaxData, $ctrl, method);
		XenForo.setFavicons(links.join(", "));
	}

	/**
	* Monkey patching for quick reply
	*/
	XenForo.QuickReplyTemp = XenForo.QuickReply;
	XenForo.QuickReply = function($form)
	{
		$form.bind('QuickReplyComplete', function(e)
		{
			XenForo.setFavicons(links.join(", "));
		});

		XenForo.QuickReplyTemp($form);
	}
}
(jQuery, this, document);
//-->
</script>