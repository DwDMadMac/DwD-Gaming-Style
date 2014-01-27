<xen:require css="node_list.css" />
<xen:require css="node_forum.css" />

<li class="node forum level_{$level} {xen:if '{$level} == 1 AND !{$renderedChildren}', 'groupNoChildren'} node_{$forum.node_id}">

	<xen:if is="{$level} == 1"><div class="categoryStrip subHeading"></div></xen:if>

	<div class="nodeInfo forumNodeInfo primaryContent {xen:if $forum.hasNew, 'unread'}">

            <xen:comment><span class="nodeIcon" title="{xen:if $forum.hasNew, '{xen:phrase unread_messages}', ''}"></span></xen:comment>

		<div class="nodeText">
			<h3 class="nodeTitle"><a href="{xen:link social-categories, $forum}" data-description="{xen:if @nodeListDescriptionTooltips, '#nodeDescription-{$forum.node_id}'}">{$forum.title}</a></h3>

			<xen:if is="{$forum.description} AND @nodeListDescriptions">
				<blockquote class="nodeDescription {xen:if @nodeListDescriptionTooltips, nodeDescriptionTooltip} baseHtml" id="nodeDescription-{$forum.node_id}">{xen:raw $forum.description}</blockquote>
			</xen:if>
		</div>
		
		<xen:hook name="node_forum_level_2_before_lastpost" />

		<div class="nodeLastPost secondaryContent">
			<xen:if is="{$forum.privateInfo}">
				<span class="noMessages muted">({xen:phrase private})</span>
			<xen:elseif is="{$forum.lastPost.date}" />
				{xen:phrase latest}: <a href="{xen:link posts, $forum.lastPost}" title="{$forum.lastPost.title}">{xen:helper wordTrim, $forum.lastPost.title, 30}</a>
				<span class="lastThreadMeta"><xen:if is="{xen:helper isIgnored, $forum.last_post_user_id}">{xen:phrase ignored_member}<xen:else /><xen:username user="$forum.lastPost" /></xen:if>, <xen:datetime time="$forum.lastPost.date" class="muted" /></span>
			<xen:else />
				<span class="noMessages muted">({xen:phrase contains_no_messages})</span>
			</xen:if>
		</div>

		<div class="nodeControls">
			<a href="{xen:link social-categories/index.rss, $forum}" class="tinyIcon feedIcon" title="{xen:phrase rss}">{xen:phrase rss}</a>
		</div>
			<div class="nodeStats pairsInline" style="padding-top: 8px !important;">
				<dl>
					<dt>{xen:phrase discussions}:</dt> <dd>{xen:if $forum.privateInfo, '&ndash;', {xen:number $forum.discussion_count}}</dd>
					<dt>{xen:phrase messages}:</dt> <dd>{xen:if $forum.privateInfo, '&ndash;', {xen:number $forum.message_count}}</dd>
				</dl>
				<xen:if is="{$renderedChildren} AND {$level} == 2">
					<div class="Popup subForumsPopup">
						<a href="{xen:link social-categories, $forum}" rel="Menu" class="cloaked" data-closemenu="true"><span class="dt">{xen:phrase sub_forums}:</span> {xen:number $forum.childCount}</a>
						
						<div class="Menu JsOnly subForumsMenu">
							<div class="primaryContent menuHeader">
								<h3>{$forum.title}</h3>
								<div class="muted">{xen:phrase sub_forums}</div>
							</div>
							<ol class="secondaryContent blockLinksList">
							<xen:foreach loop="$renderedChildren" value="$child">
								{xen:raw $child}
							</xen:foreach>
							</ol>
						</div>
					</div>
				</xen:if>
			</div>
		
	</div>

	<xen:if is="{$renderedChildren} AND {$level} == 1">
		<ol class="nodeList">
			<xen:foreach loop="$renderedChildren" value="$child">{xen:raw $child}</xen:foreach>
		</ol>
	</xen:if>

</li>