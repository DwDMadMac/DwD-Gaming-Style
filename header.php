<xen:hook name="header">
<div id="header">
        <xen:comment><xen:include template="logo_block" /></xen:comment>
	<xen:include template="navigation" />
	<xen:if is="{$canSearch}"><xen:include template="search_bar" /></xen:if>
</div>
</xen:hook>