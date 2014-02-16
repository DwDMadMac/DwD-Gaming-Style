<ol class="thumbnailList">
<xen:foreach loop="$images" value="$image">
	<li class="thumbnailHolder">
		<div class="boxModelFixer primaryContent">
			<div class="thumbnail">
				<a id="image-{$image.image_id}" href="{xen:link useralbums/view-image, $image}" class="xfrIbTrigger thumbBox" data-href="{xen:link useralbums/imagebox, $image}">
					<img src="{$image.thumbnailUrl}" alt="{$image.filename}"/>
				</a>
			</div>
			<div class="infobar">
				<span class="item Tooltip comments" title="{xen:phrase xfr_useralbums_image_comments}">{$image.comment_count}</span>
				<span class="item Tooltip views" title="{xen:phrase xfr_useralbums_image_views}">{$image.view_count}</span>
				<span class="item Tooltip likes" title="{xen:phrase xfr_useralbums_image_likes}">{$image.likes}</span>
			</div>
		</div>
	</li>
</xen:foreach>
</ol>