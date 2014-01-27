<xen:require css="message_user_info.css" />

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock">
	<xen:hook name="message_user_info_avatar" params="{xen:array 'user={$user}', 'isQuickReply={$isQuickReply}'}">
		<div class="avatarHolder">
			<span class="helper"></span>
                        <xen:if is="{$isQuickReply}">
                            <xen:avatar user="$user" size="m" img="true" />
                        <xen:else />
                            <xen:avatar user="$user" size="l" img="true">
                                <div class="MUBholdUsername">
                                    <xen:username user="$user" itemprop="name" rich="true" />
                                </div>
                            </xen:avatar>
                            <!-- slot: message_user_info_avatar -->
                        </xen:if>
		</div>
	</xen:hook>

<xen:if is="!{$isQuickReply}">
	<xen:hook name="message_user_info_text" params="{xen:array 'user={$user}', 'isQuickReply={$isQuickReply}'}">
		<h3 class="userText">
                    <xen:if hascontent="true">
                        <ul class="ribbon">
                            <xen:contentcheck>
                                <xen:include template="user_ribbons" />
                            </xen:contentcheck>
                        </ul>
                        
                    </xen:if>
			<xen:if hascontent="true"><em class="userTitle" itemprop="title"><xen:contentcheck>{xen:helper userTitle, $user, 1, 1}</xen:contentcheck></em></xen:if>
			{xen:helper userBanner, $user, 'wrapped'}
			<!-- slot: message_user_info_text -->
		</h3>
	</xen:hook>
		
	<xen:if hascontent="true">
		<div class="extraUserInfo">
			<xen:contentcheck>
			<xen:hook name="message_user_info_extra" params="{xen:array 'user={$user}', 'isQuickReply={$isQuickReply}'}">
				<xen:if is="@messageShowRegisterDate AND {$user.user_id}">
					<dl class="pairsJustified">
						<dt>{xen:phrase joined}:</dt>
						<dd>{xen:date $user.register_date}</dd>
					</dl>
				</xen:if>
				
				<xen:if is="@messageShowMessageCount AND {$user.user_id}">
					<dl class="pairsJustified">
						<dt>{xen:phrase messages}:</dt>
						<dd><a href="{xen:link search/member, '', 'user_id={$user.user_id}'}" class="concealed" rel="nofollow">{xen:number $user.message_count}</a></dd>
					</dl>
				</xen:if>
				
				<xen:if is="@messageShowTotalLikes AND {$user.user_id}">
					<dl class="pairsJustified">
						<dt>{xen:phrase likes_received}:</dt>
						<dd>{xen:number $user.like_count}</dd>
					</dl>
				</xen:if>
				
				<xen:if is="@messageShowTrophyPoints AND {$user.user_id}">
					<dl class="pairsJustified">
						<dt>{xen:phrase trophy_points}:</dt>
						<dd><a href="{xen:link 'members/trophies', $user}" class="OverlayTrigger concealed">{xen:number $user.trophy_points}</a></dd>
					</dl>
				</xen:if>
			
				<xen:if is="@messageShowGender AND {$user.gender}">
					<dl class="pairsJustified">
						<dt>{xen:phrase gender}:</dt>
						<dd itemprop="gender"><xen:if is="{$user.gender} == 'male'">{xen:phrase male}<xen:else />{xen:phrase female}</xen:if></dd>
					</dl>
				</xen:if>
				
				<xen:if is="@messageShowOccupation AND {$user.occupation}">
					<dl class="pairsJustified">
						<dt>{xen:phrase occupation}:</dt>
						<dd itemprop="role">{xen:string censor, $user.occupation}</dd>
					</dl>
				</xen:if>
				
				<xen:if is="@messageShowLocation AND {$user.location}">
					<dl class="pairsJustified">
						<dt>{xen:phrase location}:</dt>
						<dd><a href="{xen:link 'misc/location-info', '', 'location={xen:string censor, $user.location, '-'}'}" target="_blank" rel="nofollow" itemprop="address" class="concealed">{xen:string censor, $user.location}</a></dd>
					</dl>
				</xen:if>
			
				<xen:if is="@messageShowHomepage AND {$user.homepage}">
					<dl class="pairsJustified">
						<dt>{xen:phrase home_page}:</dt>
						<dd><a href="{xen:string censor, $user.homepage, '-'}" rel="nofollow" target="_blank" itemprop="url">{xen:string censor, $user.homepage}</a></dd>
					</dl>
				</xen:if>
							
			</xen:hook>			
			<xen:if is="@messageShowCustomFields AND {$user.customFields}">
			<xen:hook name="message_user_info_custom_fields" params="{xen:array 'user={$user}', 'isQuickReply={$isQuickReply}'}">
			
				<xen:foreach loop="$userFieldsInfo" key="$fieldId" value="$fieldInfo">
					<xen:if is="{$fieldInfo.viewable_message}">
						<xen:if hascontent="true">
							<dl class="pairsJustified userField_{$fieldId}">
								<dt>{xen:helper userFieldTitle, $fieldId}:</dt>
								<dd><xen:contentcheck>{xen:helper userFieldValue, $fieldInfo, $user, {$user.customFields.{$fieldId}}}</xen:contentcheck></dd>
							</dl>
						</xen:if>
					</xen:if>
				</xen:foreach>
				
			</xen:hook>
			</xen:if>
			</xen:contentcheck>
		</div>
	</xen:if>
		
</xen:if>

	<span class="arrow"><span></span></span>
</div>
</div>