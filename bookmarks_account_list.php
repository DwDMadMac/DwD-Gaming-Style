<xen:title>{xen:phrase bookmarks_bookmarks}{xen:helper pagenumber, $page}</xen:title>
<xen:h1>{xen:phrase bookmarks_bookmarks}</xen:h1>

<xen:require css="events.css" />
<xen:require css="bookmarks.css" />
<xen:require js="js/bookmarks/bookmarks.js" />

<div class="event formOverlay NoFixedOverlay">
<xen:if is="{$postBookmarks} OR {$profilePostBookmarks} OR {$resourceBookmarks} OR {$showcaseItemBookmarks}">
<form action="{xen:link bookmarks/flipStatus}" method="post" class="BookmarksList formOverlay AutoValidator" id="BookmarksFlipForm">
<div class="bookmarksPage">

	<xen:if is="{$xenOptions.bookmarks_profile} OR {$xenOptions.bookmarks_resource} OR {$xenOptions.bookmarks_showcase}">
		<span class="tabsPos numTabs{$numTabs}">
			<xen:if is="{$totalPostItems} < 1 AND {$xenOptions.bookmarks_profile} AND {$totalProfilePostItems}">
				<ul class="tabs mainTabs BookmarkTabs" data-panes="#BookmarkPanes > li" data-types="{$contentTypes}" data-tab="profile_posts" data-history="on">
			<xen:elseif is="{$totalPostItems} < 1 AND {$xenOptions.bookmarks_resource} AND {$totalResources}" />
				<ul class="tabs mainTabs BookmarkTabs" data-panes="#BookmarkPanes > li" data-types="{$contentTypes}" data-tab="resources" data-history="on">
			<xen:elseif is="{$totalPostItems} < 1 AND {$xenOptions.bookmarks_showcase} AND {$totalShowcaseItems}" />
				<ul class="tabs mainTabs BookmarkTabs" data-panes="#BookmarkPanes > li" data-types="{$contentTypes}" data-tab="showcase_items" data-history="on">
			<xen:else />
				<ul class="tabs mainTabs BookmarkTabs" data-panes="#BookmarkPanes > li" data-types="{$contentTypes}" data-history="on">
			</xen:if>
				<li><a href="#thread_posts">{xen:phrase bookmarks_thread_posts}</a></li>
				<xen:if is="{$xenOptions.bookmarks_profile}">
					<li><a href="#profile_posts">{xen:phrase profile_posts}</a></li>
				</xen:if>
				<xen:if is="{$xenOptions.bookmarks_resource}">
					<li><a href="#resources">{xen:phrase bookmarks_resources}</a></li>
				</xen:if>
				<xen:if is="{$xenOptions.bookmarks_showcase}">
					<li><a href="#showcase_items">{xen:phrase bookmarks_showcase_items}</a></li>
				</xen:if>
			</ul>
		</span>
	</xen:if>
	
	<xen:if is="{$xenOptions.bookmarks_tags} AND {$bookmarkTags}">
	<span class="tagsPos numTabs{$numTabs}">
		<div class="linkGroup" style="position:relative;">
			<div class="Popup">
				<a rel="Menu">{xen:phrase bookmarks_filter_tags}</a>
				<div class="Menu">
					<div class="primaryContent menuHeader"><h3>{xen:phrase bookmarks_filter_tags}</h3></div>
					<ul class="secondaryContent blockLinksList">
						<xen:foreach loop="$bookmarkTags" value="$tag">
							<li><a href="{xen:link 'account/bookmarks', '', 'tag={$tag.name}'}""><span style="float:right;">{$tag.count}</span>{$tag.name}</a></li>
						</xen:foreach>
					</ul>
				</div>
			</div>
		</div>
	</span>
	</xen:if>

	<ul id="BookmarkPanes">
		<li id="thread_posts">
			<xen:if is="{$postBookmarks}">
				<ol>
					<xen:foreach loop="$postBookmarks" value="$item">
						<xen:include template="bookmarks_item">
							<xen:set var="$isOnAccountPage">true</xen:set>
						</xen:include>
					</xen:foreach>
					<div class="pageNavLinkGroup">
						<xen:if is="{$totalPostItems} > {$perPage}">
							<span class="paginationCount">{xen:phrase bookmarks_showing_x_to_y_of_z, 'from={$postFrom}', 'to={$postTo}', 'total={$totalPostItems}'}</span>
						</xen:if>
						<xen:pagenav link="account/bookmarks/#posts" linkparams="{xen:array 'type={xen:escape 'post'}', 'profilePostPage={$profilePostPage}', 'resourcePage={$resourcePage}', 'showcaseItemPage={$showcaseItemPage}', 'tag={$bookmarkTag}'}" page="{$postPage}" perpage="{$perPage}" total="{$totalPostItems}" />
					</div>
				</ol>
			<xen:else />
				<br />
				<p><xen:if is="{$bookmarkTag}">{xen:phrase bookmarks_no_posts_with_tag_x, 'tag={$bookmarkTag}'}<xen:else />{xen:phrase bookmarks_no_posts}</xen:if></p>
			</xen:if>
		</li>
		<xen:if is="{$xenOptions.bookmarks_profile}">
			<li id="profile_posts">
				<xen:if is="{$profilePostBookmarks}">
					<ol>
						<xen:foreach loop="$profilePostBookmarks" value="$item">
							<xen:include template="bookmarks_item">
								<xen:set var="$isOnAccountPage">true</xen:set>
							</xen:include>
						</xen:foreach>
		
						<div class="pageNavLinkGroup">
							<xen:if is="{$totalProfilePostItems} > {$perPage}">
								<span class="paginationCount">{xen:phrase bookmarks_showing_x_to_y_of_z, 'from={$profilePostFrom}', 'to={$profilePostTo}', 'total={$totalProfilePostItems}'}</span>
							</xen:if>
							<xen:pagenav link="account/bookmarks/#profile_posts" linkparams="{xen:array 'type={xen:escape 'profile_post'}', 'postPage={$postPage}', 'resourcePage={$resourcePage}', 'showcaseItemPage={$showcaseItemPage}', 'tag={$bookmarkTag}'}" page="{$profilePostPage}" perpage="{$perPage}" total="{$totalProfilePostItems}" />
						</div>
					</ol>
				<xen:else />
					<br />
					<p><xen:if is="{$bookmarkTag}">{xen:phrase bookmarks_no_profile_posts_with_tag_x, 'tag={$bookmarkTag}'}<xen:else />{xen:phrase bookmarks_no_profile_posts}</xen:if></p>
				</xen:if>
			</li>
		</xen:if>
		<xen:if is="{$xenOptions.bookmarks_resource}">
			<li id="resources">
				<xen:if is="{$resourceBookmarks}">
					<ol>
						<xen:foreach loop="$resourceBookmarks" value="$item">
							<xen:include template="bookmarks_item">
								<xen:set var="$isOnAccountPage">true</xen:set>
							</xen:include>
						</xen:foreach>
		
						<div class="pageNavLinkGroup">
							<xen:if is="{$totalResources} > {$perPage}">
								<span class="paginationCount">{xen:phrase bookmarks_showing_x_to_y_of_z, 'from={$resourceFrom}', 'to={$resourceTo}', 'total={$totalResources}'}</span>
							</xen:if>
							<xen:pagenav link="account/bookmarks/#resources" linkparams="{xen:array 'type={xen:escape 'resource'}', 'postPage={$postPage}', 'profilePostPage={$profilePostPage}', 'showcaseItemPage={$showcaseItemPage}', 'tag={$bookmarkTag}'}" page="{$resourcePage}" perpage="{$perPage}" total="{$totalResources}" />
						</div>
					</ol>
				<xen:else />
					<br />
					<p><xen:if is="{$bookmarkTag}">{xen:phrase bookmarks_no_resources_with_tag_x, 'tag={$bookmarkTag}'}<xen:else />{xen:phrase bookmarks_no_resources}</xen:if></p>
				</xen:if>
			</li>
		</xen:if>
		<xen:if is="{$xenOptions.bookmarks_showcase}">
			<li id="showcase_items">
				<xen:if is="{$showcaseItemBookmarks}">
					<ol>
						<xen:foreach loop="$showcaseItemBookmarks" value="$item">
							<xen:include template="bookmarks_item">
								<xen:set var="$isOnAccountPage">true</xen:set>
							</xen:include>
						</xen:foreach>
		
						<div class="pageNavLinkGroup">
							<xen:if is="{$totalShowcaseItems} > {$perPage}">
								<span class="paginationCount">{xen:phrase bookmarks_showing_x_to_y_of_z, 'from={$showcaseItemFrom}', 'to={$showcaseItemTo}', 'total={$totalShowcaseItems}'}</span>
							</xen:if>
							<xen:pagenav link="account/bookmarks/#showcase_items" linkparams="{xen:array 'type={xen:escape 'showcase_item'}', 'postPage={$postPage}', 'resourcePage={$resourcePage}', 'profilePostPage={$profilePostPage}', 'tag={$bookmarkTag}'}" page="{$showcaseItemPage}" perpage="{$perPage}" total="{$totalShowcaseItems}" />
						</div>
					</ol>
				<xen:else />
					<br />
					<p><xen:if is="{$bookmarkTag}">{xen:phrase bookmarks_no_showcase_items_with_tag_x, 'tag={$bookmarkTag}'}<xen:else />{xen:phrase bookmarks_no_showcase_items}</xen:if></p>
				</xen:if>
			</li>
		</xen:if>
	</ul>
		
<xen:edithint template="bookmarks_list_item_edit" />
<input type="hidden" id="bookmark_id" name="bookmark_id" value="" />
<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
</div>
</form>

<xen:else />

	<p><xen:if is="{$bookmarkTag}"><br />{xen:phrase bookmarks_none_with_tag_x, 'tag={$bookmarkTag}'}<xen:else />{xen:phrase bookmarks_no_bookmarks}</xen:if></p>

</xen:if>
</div>