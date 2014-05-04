<xen:title>{$forum.title}{xen:helper pagenumber, $page}</xen:title>
<xen:h1>{$forum.title}</xen:h1>

<xen:if is="{$forum.description} AND @threadListDescriptions">
	<xen:description class="baseHtml">{xen:raw $forum.description}</xen:description>
</xen:if>

<xen:navigation>
	<xen:breadcrumb source="$nodeBreadCrumbs" />
</xen:navigation>

<xen:container var="$head.canonical">
	<link rel="canonical" href="{xen:link 'canonical:forums', $forum, 'page={$page}'}" /></xen:container>

<xen:container var="$head.rss">
	<link rel="alternate" type="application/rss+xml" title="{xen:phrase rss_feed_for_x, 'title={$forum.title}'}" href="{xen:link forums/index.rss, $forum}" /></xen:container>

<xen:container var="$head.openGraph"><xen:include template="open_graph_meta">
	<xen:set var="$url">{xen:link 'canonical:forums', $forum}</xen:set>
	<xen:set var="$title">{$forum.title}</xen:set>
</xen:include></xen:container>

<xen:container var="$quickNavSelected">node-{$forum.node_id}</xen:container>
<xen:container var="$bodyClasses">{xen:helper nodeClasses, $nodeBreadCrumbs, $forum}</xen:container>
<xen:container var="$searchBar.forum"><xen:include template="search_bar_forum_only" /></xen:container>

<xen:if is="{$showPostedNotice}">
	<div class="importantMessage">{xen:phrase message_submitted_displayed_pending_approval}</div>
</xen:if>

<xen:if is="{$renderedNodes}">
	<xen:include template="ad_forum_view_above_node_list" />
</xen:if>

<xen:hook name="forum_view_pagenav_before" params="{xen:array 'forum={$forum}'}" />

<xen:include template="ad_forum_view_above_thread_list" />

<div class="pageNavLinkGroup">

	<div class="linkGroup SelectionCountContainer">
		<xen:if is="{$canWatchForum}">
			<a href="{xen:link 'forums/watch', $forum}" class="OverlayTrigger" data-cacheOverlay="false">{xen:if $forum.forum_is_watched, '{xen:phrase unwatch_forum}', '{xen:phrase watch_forum}'}</a>
		</xen:if>
	</div>
</div>

<xen:hook name="forum_view_threads_before" params="{xen:array 'forum={$forum}'}" />

<div class="pageNavLinkGroup afterDiscussionListHandle">
	<div class="btn-group pull-right">
		<xen:if is="{$canPostThread}">
			<a href="{xen:link 'forums/create-thread', $forum}" class="btn btn-primary btn-sm"><span>{xen:phrase post_new_thread}</span></a>
		<xen:elseif is="{$visitor.user_id}" />
			<span class="element">({xen:phrase no_permission_to_post})</span>
		<xen:else />
			<label for="LoginControl"><a href="{xen:link login}" class="concealed element">({xen:phrase log_in_or_sign_up_to_post})</a></label>
		</xen:if>
	</div>
	<div class="linkGroup"{xen:if '!{$ignoredNames}', ' style="display: none"'}><a href="javascript:" class="muted jsOnly DisplayIgnoredContent Tooltip" title="{xen:phrase show_hidden_content_by_x, "names={xen:helper implode, $ignoredNames, ', '}"}">{xen:phrase show_ignored_content}</a></div>
	
	<xen:pagenav link="forums" linkdata="{$forum}" linkparams="{$pageNavParams}" page="{$page}" perpage="{$threadsPerPage}" total="{$totalThreads}" />

</div>
<div class="discussionList section sectionMain" style="margin-bottom: 20px;">
	<xen:include template="thread_list" />
</div>

<div class="pageNavLinkGroup afterDiscussionListHandle">
	<xen:pagenav link="forums" linkdata="{$forum}" linkparams="{$pageNavParams}" page="{$page}" perpage="{$threadsPerPage}" total="{$totalThreads}" />
</div>

<xen:if is="{$renderedNodes}">
	<xen:include template="ad_forum_view_above_node_list" />
	<xen:include template="node_list" />
</xen:if>
