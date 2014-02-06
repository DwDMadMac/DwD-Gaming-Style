<xen:if is="{$taigachat.canPost}">
	<div id='taigachat_controls'>
		<xen:if is="({$taigachat.toolbar} == 1 AND !{$taigachat.alt} AND !{$taigachat.sidebar}) OR ({$taigachat.toolbar} == 2 AND (!{$taigachat.sidebar} OR ({$taigachat.sidebar} AND {$taigachat.alt})) OR ({$taigachat.toolbar} == 3)">
			<div id='taigachat_toolbar'>
				<xen:if is="{$taigachat.toolbar_bbcode}">
					<xen:require css="editor_ui.css" />
					<xen:foreach loop="$taigachat.toolbar_bbcode" value="$code" key="$title">
						<button data-code='{$code}' class='button taigachat_bbcode xenForoSkin'>{xen:raw $title}</button>
					</xen:foreach>
				</xen:if>
				<xen:if is="{$taigachat.toolbar_smilies}">
					<div class="taigachat_Popup" id='taigachat_smilies' style='display: inline; top: 3px'>
						<a rel="Menu"><span class="taigachat_bbcode_smilies"></span></a>
						<div class="Menu">
							<div class="primaryContent menuHeader"><h3>{xen:phrase smilies}</h3></div>
							<ul class="secondaryContent blockLinksList taigachat_smilies_list">
								<xen:foreach loop="$taigachat.toolbar_smilies" value="$smilie" key="$id">
									<xen:if is="{$smilie.sprite_mode}">
										<li><a href='javascript:;' class='taigachat_smilie mceSmilieSprite mceSmilie{$smilie.smilie_id}' data-src='{$smilie.image_url}' data-alt='{$smilie.text}' data-title='{$smilie.title}'></a></li>
									<xen:else />
										<li><a href='javascript:;' class='taigachat_smilie' data-src='{$smilie.image_url}' data-alt='{$smilie.text}' data-title='{$smilie.title}'></a></li>
									</xen:if>
								</xen:foreach>
							</ul>
						</div>
					</div>
				</xen:if>
			</div>
		</xen:if>
		<input id='taigachat_message' class='textCtrl' type='text' maxlength='{xen:raw $taigachat.maxlength}' placeholder='{xen:phrase dark_enter_message}' /> <input type='submit' id='taigachat_send' value='Send' class='button primary' />
	</div>
</xen:if>
