<xen:if is="{$postrating_has_ratings} OR {$postrating_can_rate}">
<div class="dark_postrating {xen:if $postrating_has_ratings, 'likesSummary secondaryContent'}">
	<div class="dark_postrating_container">
			<xen:include template="dark_postrating_output" />
			<xen:include template="dark_postrating_input" />
	</div>
	<div style="clear: right;"></div>
</div>
</xen:if>