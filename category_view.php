<xen:title>{$category.title}</xen:title>
<xen:if is="{$category.description} AND @threadListDescriptions">
	<xen:description class="baseHtml">{xen:raw $category.description}</xen:description>
</xen:if>

<xen:navigation>
	<xen:breadcrumb source="$nodeBreadCrumbs" />
</xen:navigation>

<xen:container var="$quickNavSelected">node-{$category.node_id}</xen:container>
<xen:container var="$bodyClasses">{xen:helper nodeClasses, $nodeBreadCrumbs, $category}</xen:container>
<xen:container var="$searchBar.forum"><label title="{xen:phrase search_only_x, 'title={$category.title}'}"><input type="checkbox" name="nodes[]" value="{$category.node_id}" /> {xen:phrase search_this_forum_only}</label></xen:container>
<xen:container var="$head.canonical">
	<link rel="canonical" href="{xen:link 'canonical:categories', $category}" /></xen:container>

<xen:if is="{$renderedNodes}">
	<ol class="nodeList section sectionMain">
	<xen:foreach loop="$renderedNodes" value="$node">
		{xen:raw $node}
	</xen:foreach>
	</ol>
</xen:if>