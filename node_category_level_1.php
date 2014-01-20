<xen:require css="node_list.css" />
<xen:require css="node_category.css" />

<li class="node category level_{$level} node_{$category.node_id}" id="{xen:helper linktitle, $category.node_id, $category.title, 1}">

	<div class="nodeInfo categoryNodeInfo categoryStrip">
	
		<div class="categoryText">
			<h3 class="nodeTitle"><a href="{xen:link categories, $category}">{$category.title}</a></h3>
			<xen:if is="{$category.description}"><blockquote class="nodeDescription baseHtml">{xen:raw $category.description}</blockquote></xen:if>
		</div>
		
	</div>
	
	<xen:if is="{$renderedChildren}">		
		<ol class="nodeList">
			<xen:foreach loop="$renderedChildren" value="$child">{xen:raw $child}</xen:foreach>
		</ol>
	</xen:if>
	
	<span class="tlc"></span>
	<span class="trc"></span>
	<span class="blc"></span>
	<span class="brc"></span>
</li>