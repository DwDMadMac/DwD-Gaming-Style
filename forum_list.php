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
	
<xen:sidebar>
	<xen:edithint template="sidebar.css" />
	
	<xen:hook name="forum_list_sidebar">
		<xen:include template="sidebar_online_users" />
		
		<!-- block: forum_stats -->
		<div class="section">
			<div class="secondaryContent statsList" id="boardStats">
				<h3>{xen:phrase forum_statistics}</h3>
				<div class="pairsJustified">
					<dl class="discussionCount"><dt>{xen:phrase discussions}:</dt>
						<dd>{xen:number $boardTotals.discussions}</dd></dl>
					<dl class="messageCount"><dt>{xen:phrase messages}:</dt>
						<dd>{xen:number $boardTotals.messages}</dd></dl>
					<dl class="memberCount"><dt>{xen:phrase members_count}:</dt>
						<dd>{xen:number $boardTotals.users}</dd></dl>
					<dl><dt>{xen:phrase latest_member}:</dt>
						<dd><xen:username user="$boardTotals.latestUser" /></dd></dl>
					<!-- slot: forum_stats_extra -->
				</div>
			</div>
		</div>
		<!-- end block: forum_stats -->
		
		<xen:include template="sidebar_share_page">
			<xen:set var="$url">{xen:link canonical:forums}</xen:set>
		</xen:include>
		
	</xen:hook>
</xen:sidebar>