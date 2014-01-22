<xen:require css="node_list.css" />

<xen:if hascontent="true">
	<ol class="nodeList sectionMain" id="forums">
	<xen:contentcheck>
		<xen:foreach loop="$renderedNodes" value="$node">{xen:raw $node}</xen:foreach>
	</xen:contentcheck>
	</ol>
</xen:if>

<xen:edithint template="node_category.css" />
<xen:edithint template="node_category_level_1" />
<xen:edithint template="node_category_level_2" />
<xen:edithint template="node_category_level_n" />

<xen:edithint template="node_forum.css" />
<xen:edithint template="node_forum_level_1" />
<xen:edithint template="node_forum_level_2" />
<xen:edithint template="node_forum_level_n" />

<xen:edithint template="node_page.css" />
<xen:edithint template="node_page_level_1" />
<xen:edithint template="node_page_level_2" />
<xen:edithint template="node_page_level_n" />

<xen:edithint template="node_link.css" />
<xen:edithint template="node_link_level_1" />
<xen:edithint template="node_link_level_2" />
<xen:edithint template="node_link_level_n" />