<xen:include template="dark_taigachat"><xen:set var="$taigachat_alt">1</xen:set></xen:include>
<xen:container var="$head.canonical"><link rel="canonical" href="{xen:link 'canonical:forums'}" /></xen:container>
<xen:if is="{$xenOptions.boardDescription}"><xen:container var="$head.description">
	<meta name="description" content="{$xenOptions.boardDescription}" /></xen:container></xen:if>
<xen:container var="$head.openGraph">
	<xen:include template="open_graph_meta">
		<xen:set var="$url">{xen:link 'canonical:forums'}</xen:set>
		<xen:set var="$title">{$xenOptions.boardTitle}</xen:set>
		<xen:set var="$ogType">website</xen:set>
	</xen:include></xen:container>

<xen:hook name="forum_list_nodes">
	<xen:if is="{$renderedNodes}"><xen:include template="node_list" /></xen:if>
</xen:hook>