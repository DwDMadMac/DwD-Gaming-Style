<xen:require css="node_list.css" />
<xen:require css="node_page.css" />

<li class="node page level_{$level} {xen:if '{$level} == 1 AND !{$renderedChildren}', 'groupNoChildren'} node_{$page.node_id}">

	<xen:if is="{$level} == 1"><div class="categoryStrip"></div></xen:if>

	<div class="nodeInfo pageNodeInfo">
		<span class="nodeIcon"></span>

		<div class="nodeText">
			<h3 class="nodeTitle"><a href="{xen:link pages, $page}">{$page.title}</a></h3>
			<xen:if is="{$page.description}">
				<blockquote class="nodeDescription baseHtml muted" id="nodeDescription-{$page.node_id}">{xen:raw $page.description}</blockquote>
			</xen:if>
		</div>
	</div>
	
	<xen:if is="{$renderedChildren} AND {$level} == 1">		
		<ol class="nodeList">
			<xen:foreach loop="$renderedChildren" value="$child">{xen:raw $child}</xen:foreach>
		</ol>
	</xen:if>
	
</li>