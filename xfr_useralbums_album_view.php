<xen:require css="xfr_useralbums_images_list.css" />
<xen:require js="js/xfru/useralbums/imagebox.js" />

<xen:title>{$album.title}</xen:title>
<xen:h1>{$album.title}</xen:h1>

<xen:description>
	{xen:phrase xfr_useralbums_album_created_by_x_date_y,
		'name={xen:helper username, $album}',
		'date=<a href="{xen:link useralbums/view, $album}">{xen:datetime $album.createdate, html}</a>'}
</xen:description>

<xen:if is="{$canAddImages}">
	<xen:topctrl>
		<a href="{xen:link useralbums/manage-images, $album}" class="callToAction"><span>{xen:phrase xfr_useralbums_add_delete_images}</span></a>
	</xen:topctrl>
</xen:if>


<xen:navigation>
	<xen:breadcrumb source="$breadCrumbs" />
</xen:navigation>

<div class="pageNavLinkGroup">
	<div class="linkGroup SelectionCountContainer">
		<xen:if hascontent="true">
			<div class="Popup">
				<a rel="Menu">{xen:phrase xfr_useralbums_album_tools}</a>
				<div class="Menu">
					<div class="primaryContent menuHeader"><h3>{xen:phrase xfr_useralbums_album_tools}</h3></div>
					<ul class="secondaryContent blockLinksList">
						<xen:contentcheck>
							<xen:if is="{$canEditAlbum}">
								<!-- todo: overlay edit window -->
								<li><a href="{xen:link 'useralbums/edit', $album}" class="">{xen:phrase xfr_useralbums_edit_album}</a></li>
							</xen:if>
							<xen:if is="{$canDeleteAlbum}">
								<li><a href="{xen:link 'useralbums/delete', $album}" class="OverlayTrigger">{xen:phrase xfr_useralbums_delete_album}</a></li>
							</xen:if>
						</xen:contentcheck>
					</ul>
				</div>
			</div>
		</xen:if>
		<xen:if is="{$canLikeAlbum}">
			<a href="{xen:link useralbums/like-album, $album}" class="LikeLink {xen:if $album.like_date, unlike, like}" data-container="#likes-album-{$album.album_id}"><span></span><span class="LikeLabel">{xen:if $album.like_date, {xen:phrase unlike}, {xen:phrase like}}</span></a>
		</xen:if>
	</div>
</div>
<div class="albumLikes">
<div id="likes-album-{$album.album_id}">
	<xen:if is="{$album.likes}">
		<xen:include template="xfr_useralbums_album_likes_summary">
			<xen:set var="$likesUrl">{xen:link useralbums/likes-album, $album}</xen:set>
		</xen:include>
	</xen:if>
</div>
</div>
<xen:if hascontent="true">
<div class="section primaryContent descriptionHolder">
	<div>
		<div class="descriptionUserBlock">
			<div class="avatarHolder">
				<xen:avatar user="$album" size="s" title="{$album.username}" class="Tooltip" />
			</div>
			<span class="arrow"><span></span></span>
		</div>
		<div class="descriptionInfo">
			<div class="descriptionContent">
				<article><blockquote class="messageText ugc baseHtml">
					<xen:contentcheck>
					{xen:raw $album.descriptionHtml}
					</xen:contentcheck>
				</blockquote></article>

			</div>
		</div>
	</div>
</div>
</xen:if>

<div class="section secondaryContent">
<xen:if is="{$images}">
	<xen:include template="xfr_useralbums_images_list" />
<xen:else />
	{xen:phrase xfr_useralbums_there_are_no_images_yet}
</xen:if>
</div>
<div class="pageNavLinkGroup">
	<div class="linkGroup SelectionCountContainer">
		<xen:if hascontent="true">
			<xen:contentcheck>
			<xen:if is="{$canAddImages}">
				<div class="viewAlbumManageImagesButton">
					<a href="{xen:link useralbums/manage-images, $album}" class="callToAction"><span>{xen:phrase xfr_useralbums_add_delete_images}</span></a>
				</div>
			</xen:if>
			</xen:contentcheck>
		</xen:if>
	</div>
</div>
<xen:if is="{$album.album_type} != 'private'">
	<xen:include template="share_page">
		<xen:set var="$url">{xen:link 'canonical:useralbums/view', $album}</xen:set>
	</xen:include>
</xen:if>