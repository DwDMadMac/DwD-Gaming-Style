<xen:require css="dark_taigachat.css" />
<xen:require css="bb_code.css" />
<xen:require js="js/dark/taigachat.js?{xen:raw $taigachat.js_modification}" />	


<div class="section<xen:if is="{$taigachat.alt}"> sectionMain nodeList taigachat_alt </xen:if><xen:if is="{$taigachat.reverse}"> taigachat_reverse<xen:else /> taigachat_normal</xen:if><xen:if is="{$taigachat.popup}"> taigachat_popup</xen:if>" id='<xen:if is="{$taigachat.alt} OR !{$taigachat.sidebar}">taigachat_full<xen:else />taigachat_sidebar</xen:if>'>
	<xen:if is="!{$taigachat.alt}">
		<div class="<xen:if is="{$taigachat.sidebar}">secondaryContent<xen:else />primaryContent</xen:if>">
	<xen:else />
		<div>
	</xen:if>
	
	
		<xen:if is="{$taigachat.sidebar}">
			<xen:if is="{$taigachat.alt}">
				<div class="nodeInfo categoryNodeInfo categoryStrip">		
					<div class="categoryText">
						<h3 class="nodeTitle"><a href="{xen:link '{$taigachat.route}'}">{xen:phrase dark_shoutbox}</a></h3>				
					</div>			
				</div>
			<xen:else />
				<h3><a href='{xen:link '{$taigachat.route}'}'>{xen:phrase dark_shoutbox}</a></h3>
			</xen:if>
		
		</xen:if>
		<xen:if is="!{$taigachat.reverse}">
			<xen:include template="dark_taigachat_controls">
				<xen:map from="$taigachat" to="$taigachat" />
			</xen:include>
		</xen:if>
		
		<div id='taigachat_box' class='<xen:if is="{$taigachat.thumbzoom}">taigachat_thumbzoom</xen:if>'<xen:if is="{$taigachat.sidebar}"> style='height: {xen:raw $taigachat.height}px'</xen:if>><ol></ol></div>			
		
		<xen:if is="{$taigachat.reverse}">
			<xen:include template="dark_taigachat_controls">
				<xen:map from="$taigachat" to="$taigachat" />
			</xen:include>
		</xen:if>
		
	</div>
</div>

<script type='text/javascript'>
var taigachat_autorefresh = <xen:if is="{$visitor.user_id} OR {$taigachat.canPost}">true<xen:else />false</xen:if>;
var taigachat_maxrefreshtime = parseInt("{xen:raw $taigachat.maxrefreshtime}", 10) || 10;
var taigachat_limit = parseInt("{xen:raw $taigachat.limit}", 10) || 50;
var taigachat_sidebar = <xen:if is="{$taigachat.sidebar}">true<xen:else />false</xen:if>;
</script>