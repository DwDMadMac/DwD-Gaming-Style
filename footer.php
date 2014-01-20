<xen:edithint template="footer.css" />

<xen:hook name="footer">
<div class="footer">
	<div class="pageWidth">
		<div class="pageContent">
			<xen:if is="{$canChangeStyle} OR {$canChangeLanguage}">
			<dl class="choosers">
				<xen:if is="{$canChangeStyle}">
					<dt>{xen:phrase style}</dt>
					<dd><a href="{xen:link 'misc/style', '', 'redirect={$requestPaths.requestUri}'}" class="OverlayTrigger Tooltip" title="{xen:phrase style_chooser}" rel="nofollow">{$visitorStyle.title}</a></dd>
				</xen:if>
				<xen:if is="{$canChangeLanguage}">
					<dt>{xen:phrase language}</dt>
					<dd><a href="{xen:link 'misc/language', '', 'redirect={$requestPaths.requestUri}'}" class="OverlayTrigger Tooltip" title="{xen:phrase language_chooser}" rel="nofollow">{$visitorLanguage.title}</a></dd>
				</xen:if>
			</dl>
			</xen:if>
			
			<ul class="footerLinks">
			<xen:hook name="footer_links">
				<xen:if is="{$xenOptions.contactUrl.type} === 'default'">
					<li><a href="{xen:link 'misc/contact'}" class="OverlayTrigger" data-overlayOptions="{&quot;fixed&quot;:false}">{xen:phrase contact_us}</a></li>
				<xen:elseif is="{$xenOptions.contactUrl.type} === 'custom'" />
					<li><a href="{$xenOptions.contactUrl.custom}" {xen:if {$xenOptions.contactUrl.overlay}, 'class="OverlayTrigger" data-overlayOptions="{&quot;fixed&quot;:false}"'}>{xen:phrase contact_us}</a></li>
				</xen:if>
				<li><a href="{xen:link help}">{xen:phrase help}</a></li>
				<xen:if is="{$homeLink}"><li><a href="{$homeLink}" class="homeLink">{xen:phrase home}</a></li></xen:if>
				<li><a href="{$requestPaths.requestUri}#navigation" class="topLink">{xen:phrase go_to_top}</a></li>
				<li><a href="{xen:link forums/-/index.rss}" rel="alternate" class="globalFeed" target="_blank"
					title="{xen:phrase rss_feed_for_x, 'title={$xenOptions.boardTitle}'}">{xen:phrase rss}</a></li>
			</xen:hook>
			</ul>
			
			<span class="helper"></span>
		</div>
	</div>
</div>

<div class="footerLegal">
	<div class="pageWidth">
		<div class="pageContent">
			<ul id="legal">
			<xen:hook name="footer_links_legal">
				<xen:if is="{$tosUrl}"><li><a href="{$tosUrl}">{xen:phrase terms_and_rules}</a></li></xen:if>
				<xen:if is="{$xenOptions.privacyPolicyUrl}"><li><a href="{$xenOptions.privacyPolicyUrl}">{xen:phrase privacy_policy}</a></li></xen:if>
			</xen:hook>
			</ul>
			
			<div id="copyright">{xen:phrase xenforo_copyright}</div>
			<xen:hook name="footer_after_copyright" />
		
			<xen:if is="{$debugMode}">
				<xen:if hascontent="true">
					<dl class="pairsInline debugInfo" title="{$controllerName}-&gt;{$controllerAction}{xen:if $viewName, ' ({$viewName})'}">
					<xen:contentcheck>
						<xen:if is="{$page_time}"><dt>{xen:phrase timing}:</dt> <dd><a href="{$debug_url}" rel="nofollow">{xen:phrase x_seconds, 'time={xen:number $page_time, 4}'}</a></dd></xen:if>
						<xen:if is="{$memory_usage}"><dt>{xen:phrase memory}:</dt> <dd>{xen:phrase x_mb, 'size={xen:number {xen:calc "{$memory_usage} / 1024 / 1024"}, 3}'}</dd></xen:if>
						<xen:if is="{$db_queries}"><dt>{xen:phrase db_queries}:</dt> <dd>{xen:number {$db_queries}}</dd></xen:if>
					</xen:contentcheck>
					</dl>
				</xen:if>
			</xen:if>
			
			<span class="helper"></span>
		</div>
	</div>	
</div>
</xen:hook>