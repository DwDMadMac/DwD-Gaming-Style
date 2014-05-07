<xen:title>{xen:phrase latest_alerts}</xen:title>

<xen:edithint template="xenforo_alert.css" />

<div class="formOverlay NoFixedOverlay">

	<xen:if is="{$alerts}">
		<ol class="alerts alertsScroller">
		<xen:foreach loop="$alerts" key="$date" value="$alertsDay">
			<li class="alertGroup">
				<h2 class="textHeading">{$date}</h2>
				<ol>
				<xen:foreach loop="$alertsDay" value="$alert">
					<li id="alert{$alert.alert_id}" style="background: none !important;border: none !important;" class="primaryContent {xen:if $alert.new, 'new'}" data-author="{$alert.user.username}">
						<xen:avatar user="$alert.user" size="s" img="true" class="plainImage" />
						<div class="alertText">
							<h3>{xen:raw $alert.template}</h3>
							<div class="timeRow"><span class="time muted">{xen:time $alert.event_date}</span><xen:if is="{$alert.new}"><span class="newIcon"></span></xen:if></div>
						</div>
					</li>
				</xen:foreach>
				</ol>
			</li>
		</xen:foreach>
		</ol>
		
		<xen:pagenav link="account/alerts" page="{$page}" perpage="{$perPage}" total="{$totalAlerts}" />
			
	<xen:else />
	
		<p>{xen:phrase you_do_not_have_any_recent_alerts}</p>
		
	</xen:if>
	
</div>