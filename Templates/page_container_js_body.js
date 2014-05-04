<script>

<xen:hook name="page_container_js_body">
jQuery.extend(true, XenForo,
{
	visitor: { user_id: {$visitor.user_id} },
	serverTimeInfo:
	{
		now: {$serverTimeInfo.now},
		today: {$serverTimeInfo.today},
		todayDow: {$serverTimeInfo.todayDow}
	},
	_lightBoxUniversal: "{$xenOptions.lightBoxUniversal}",
	_enableOverlays: "@enableOverlays",
	_animationSpeedMultiplier: "@animationSpeedMultiplier",
	_overlayConfig:
	{
		top: "@overlayTop",
		speed: {xen:calc '@overlaySpeed * @animationSpeedMultiplier'},
		closeSpeed: {xen:calc '@overlayCloseSpeed * @animationSpeedMultiplier'},
		mask:
		{
			color: "@overlayMaskColor",
			opacity: "@overlayMaskOpacity",
			loadSpeed: {xen:calc '@overlaySpeed * @animationSpeedMultiplier'},
			closeSpeed: {xen:calc '@overlayCloseSpeed * @animationSpeedMultiplier'}
		}
	},
	_ignoredUsers: {xen:helper json, $visitor.ignoredUsers},
	_loadedScripts: {/*<!--XenForo_Required_Scripts-->*/},
	_cookieConfig: { path: "{xen:jsescape $xenOptions.cookieConfig.path}", domain: "{xen:jsescape $xenOptions.cookieConfig.domain}", prefix: "{xen:jsescape $xenOptions.cookieConfig.prefix}"},
	_csrfToken: "{xen:jsescape $visitor.csrf_token_page}",
	_csrfRefreshUrl: "{xen:jsescape {xen:link login/csrf-token-refresh}}",
	_jsVersion: "{$xenOptions.jsVersion}"
});
jQuery.extend(XenForo.phrases,
{
	cancel: "{xen:jsescape {xen:phrase cancel}}",

	a_moment_ago:    "{xen:jsescape {xen:phrase a_moment_ago}}",
	one_minute_ago:  "{xen:jsescape {xen:phrase one_minute_ago}}",
	x_minutes_ago:   "{xen:jsescape {xen:phrase x_minutes_ago, 'minutes=%minutes%'}}",
	today_at_x:      "{xen:jsescape {xen:phrase today_at_x, 'time=%time%'}}",
	yesterday_at_x:  "{xen:jsescape {xen:phrase yesterday_at_x, 'time=%time%'}}",
	day_x_at_time_y: "{xen:jsescape {xen:phrase day_x_at_time_y, 'day=%day%', 'time=%time%'}}",

	day0: "{xen:jsescape {xen:phrase day_sunday}}",
	day1: "{xen:jsescape {xen:phrase day_monday}}",
	day2: "{xen:jsescape {xen:phrase day_tuesday}}",
	day3: "{xen:jsescape {xen:phrase day_wednesday}}",
	day4: "{xen:jsescape {xen:phrase day_thursday}}",
	day5: "{xen:jsescape {xen:phrase day_friday}}",
	day6: "{xen:jsescape {xen:phrase day_saturday}}",

	_months: "{xen:jsescape '{xen:phrase month_1},{xen:phrase month_2},{xen:phrase month_3},{xen:phrase month_4},{xen:phrase month_5},{xen:phrase month_6},{xen:phrase month_7},{xen:phrase month_8},{xen:phrase month_9},{xen:phrase month_10},{xen:phrase month_11},{xen:phrase month_12}'}",
	_daysShort: "{xen:jsescape '{xen:phrase day_sunday_short},{xen:phrase day_monday_short},{xen:phrase day_tuesday_short},{xen:phrase day_wednesday_short},{xen:phrase day_thursday_short},{xen:phrase day_friday_short},{xen:phrase day_saturday_short}'}",

	following_error_occurred: "{xen:jsescape {xen:phrase following_error_occurred}}",
	server_did_not_respond_in_time_try_again: "{xen:jsescape {xen:phrase server_did_not_respond_in_time_try_again}}",
	logging_in: "{xen:jsescape {xen:phrase logging_in}}",
	click_image_show_full_size_version: "{xen:jsescape {xen:phrase click_image_show_full_size_version}}",
	show_hidden_content_by_x: "{xen:jsescape {xen:phrase show_hidden_content_by_x}}"
});

// Facebook Javascript SDK
XenForo.Facebook.appId = "{xen:jsescape $xenOptions.facebookAppId}";
XenForo.Facebook.forceInit = {xen:if $facebookSdk, true, false};
</xen:hook>

</script>