<xen:title>{$user.username}</xen:title>
<xen:h1></xen:h1> <xen:comment>H1 empty, do not render.</xen:comment>

<xen:container var="$head.canonical">
	<link rel="canonical" href="{xen:link 'canonical:members', $user, 'page={$page}'}" /></xen:container>

<xen:container var="$head.description">
	<meta name="description" content="{xen:phrase x_is_a_y_at_z, 'name={$user.username}', 'title={xen:helper stripHtml, {xen:helper usertitle, $user}}', 'location={$xenOptions.boardTitle}'}" /></xen:container>
	
<xen:container var="$head.openGraph"><xen:include template="open_graph_meta">
	<xen:set var="$url">{xen:link 'canonical:members', $user}</xen:set>
	<xen:set var="$title">{$user.username}</xen:set>
	<xen:set var="$description">{xen:phrase x_is_a_y_at_z, 'name={$user.username}', 'title={xen:helper stripHtml, {xen:helper usertitle, $user}}', 'location={$xenOptions.boardTitle}'}</xen:set>
	<xen:set var="$avatar">{xen:helper avatar, $user, 'm', '', 'true'}</xen:set>
	<xen:set var="$ogType">profile</xen:set>
	<xen:set var="$ogExtraHtml">
		<meta property="profile:username" content="{$user.username}" />
		<xen:if is="{$user.gender}"><meta property="profile:gender" content="{$user.gender}" /></xen:if>
	</xen:set>
</xen:include></xen:container>

<xen:comment>
<xen:navigation>
	<xen:breadcrumb href="{xen:link full:members, $user}">{$user.username}</xen:breadcrumb>
</xen:navigation>
</xen:comment>

<xen:require css="member_view.css" />
<xen:require js="js/xenforo/quick_reply_profile.js" />

<div class="profilePage" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">

            <div class="CoverPhotoBelowBlock">
		<xen:if is="{$following} AND {$followers}">
			<xen:if is="{$following}">
				<div class="section leftblock">
					<h3 class="subHeading textWithCount" title="{xen:phrase x_is_following_y_members, 'name={$user.username}', 'count={xen:number $followingCount}'}">
						<span class="text">{xen:phrase following}</span>
						<a href="{xen:link 'members/following', $user}" class="count OverlayTrigger">{xen:number $followingCount}</a>
					</h3>
					<div class="primaryContent avatarHeap">
						<ol>
						<xen:foreach loop="$following" key="$followUserId" value="$followUser">
							<li>
								<xen:avatar user="$followUser" size="s" text="{$followUser.username}" class="Tooltip" title="{$followUser.username}" itemprop="contact" />
							</li>
						</xen:foreach>
						</ol>
					</div>
					<xen:if is="{$followingCount} > {xen:count $following, false}">
						<div class="sectionFooter"><a href="{xen:link 'members/following', $user}" class="OverlayTrigger">{xen:phrase show_all}</a></div>
					</xen:if>
				</div>
			</xen:if>

			<xen:if is="{$followers}">
				<div class="section rightblock">
					<h3 class="subHeading textWithCount" title="{xen:phrase x_is_being_followed_by_y_members, 'name={$user.username}', 'count={xen:number $followersCount}'}">
						<span class="text">{xen:phrase followers}</span>
						<a href="{xen:link 'members/followers', $user}" class="count OverlayTrigger">{xen:number $followersCount}</a>
					</h3>
					<div class="primaryContent avatarHeap">
						<ol>
						<xen:foreach loop="$followers" key="$followUserId" value="$followUser">
							<li>
								<xen:avatar user="$followUser" size="s" text="{$followUser.username}" class="Tooltip" title="{$followUser.username}" itemprop="contact" />
							</li>
						</xen:foreach>
						</ol>
					</div>
					<xen:if is="{$followersCount} > {xen:count $followers, false}">
						<div class="sectionFooter"><a href="{xen:link 'members/followers', $user}" class="OverlayTrigger">{xen:phrase show_all}</a></div>
					</xen:if>
				</div>
			</xen:if>
		<xen:elseif is="{$following}" />
			<xen:if is="{$following}">
				<div class="section">
					<h3 class="subHeading textWithCount" title="{xen:phrase x_is_following_y_members, 'name={$user.username}', 'count={xen:number $followingCount}'}">
						<span class="text">{xen:phrase following}</span>
						<a href="{xen:link 'members/following', $user}" class="count OverlayTrigger">{xen:number $followingCount}</a>
					</h3>
					<div class="primaryContent avatarHeap">
						<ol>
						<xen:foreach loop="$following" key="$followUserId" value="$followUser">
							<li>
								<xen:avatar user="$followUser" size="s" text="{$followUser.username}" class="Tooltip" title="{$followUser.username}" itemprop="contact" />
							</li>
						</xen:foreach>
						</ol>
					</div>
					<xen:if is="{$followingCount} > {xen:count $following, false}">
						<div class="sectionFooter"><a href="{xen:link 'members/following', $user}" class="OverlayTrigger">{xen:phrase show_all}</a></div>
					</xen:if>
				</div>
			</xen:if>
		<xen:elseif is="{$followers}" />
			<xen:if is="{$followers}">
				<div class="section">
					<h3 class="subHeading textWithCount" title="{xen:phrase x_is_being_followed_by_y_members, 'name={$user.username}', 'count={xen:number $followersCount}'}">
						<span class="text">{xen:phrase followers}</span>
						<a href="{xen:link 'members/followers', $user}" class="count OverlayTrigger">{xen:number $followersCount}</a>
					</h3>
					<div class="primaryContent avatarHeap">
						<ol>
						<xen:foreach loop="$followers" key="$followUserId" value="$followUser">
							<li>
								<xen:avatar user="$followUser" size="s" text="{$followUser.username}" class="Tooltip" title="{$followUser.username}" itemprop="contact" />
							</li>
						</xen:foreach>
						</ol>
					</div>
					<xen:if is="{$followersCount} > {xen:count $followers, false}">
						<div class="sectionFooter"><a href="{xen:link 'members/followers', $user}" class="OverlayTrigger">{xen:phrase show_all}</a></div>
					</xen:if>
				</div>
			</xen:if>
                <xen:else />
                        <!-- Do Nothing here & float to the top -->
                </xen:if>
            </div>
	<div class="profilePageTopBlock">
            <div class="profileInfoWrapper">
                <div class="avatarBlockWrapper">
                    <div class="avatarScaler">
                        <xen:if is="{$visitor.user_id} == {$user.user_id}">
                            <a class="Av{$user.user_id}l OverlayTrigger" href="{xen:link account/avatar}">
                                <img src="{xen:helper avatar, $user, l, '', true}" alt="{$user.username}" style="{xen:helper avatarCropCss, $user}" itemprop="photo" >
                                    <h1 itemprop="name" class="username">{xen:helper richUserName, $user}</h1>
                                </img>
                            </a>
                        <xen:else />
                            <span class="Av{$user.user_id}l">
                                <img src="{xen:helper avatar, $user, l, '', true}" alt="{$user.username}" style="{xen:helper avatarCropCss, $user}" itemprop="photo" >
                                    <h1 itemprop="name" class="username">{xen:helper richUserName, $user}</h1>
                                </img>
                            </span>
                        </xen:if>
                    </div>
                </div>
                <div class="profileInfoBlockwrapper">
                    <xen:if is="{$user.status}">
                        <p class="userStatus bubble" id="UserStatus">
                            {xen:helper bodyText, $user.status} <br /> 
                            <b class="suerStatusPostDate">
                                Status posted <xen:datetime time="$user.status_date" />
                            </b>
                        </p>
                    </xen:if>
                    <xen:if hascontent="true">
                        <div class="userBanners">
                            <xen:contentcheck>{xen:helper userBanner, $user}</xen:contentcheck>
                        </div>
                    </xen:if>
                    <div class="userLinks">
                        <xen:hook name="member_card_links">
                            <xen:if is="{$visitor.user_id} AND {$user.user_id} != {$visitor.user_id}">
                                <xen:if is="{$canStartConversation}">
                                    <a href="{xen:link conversations/add, '', 'to={$user.username}'}">{xen:phrase start_conversation}</a>
                                </xen:if>
                                <xen:follow user="$user" class="Tooltip" />
                                <xen:if is="{xen:helper isIgnored, $user.user_id}">
                                    <a href="{xen:link members/unignore, $user}" class="FollowLink">{xen:phrase unignore}</a>
                                <xen:elseif is="{$canIgnore}" />
                                    <a href="{xen:link members/ignore, $user}" class="FollowLink">{xen:phrase ignore}</a>
                                </xen:if>
                            </xen:if>
                        </xen:hook>
                    </div>
                    <xen:if is="{$canViewOnlineStatus}">
                        <dl class="pairsInline lastActivity">
                            <dt>{xen:phrase x_was_last_seen, 'username={$user.username}'}:</dt>
                            <dd>
                                <xen:if is="{$user.activity}">
                                    <xen:if is="{$user.activity.description}">
                                        {$user.activity.description}<xen:if is="{$user.activity.itemTitle}"> <em><a href="{$user.activity.itemUrl}">{$user.activity.itemTitle}</a></em></xen:if>,
                                    <xen:else />
                                        {xen:phrase viewing_unknown_page},
                                    </xen:if>
                                    <xen:datetime time="{$user.effective_last_activity}" class="muted" />
                                <xen:else />
                                    <xen:datetime time="{$user.effective_last_activity}" />
                                </xen:if>
                            </dd>
                        </dl>
                    </xen:if>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="profileCoverPhoto">
                <xen:if is="{$visitor.user_id} == {$user.user_id}">
                    <xen:if is="{$user.customFields.profileCoverImage}">
                        <div class="changeCoverPhoto button">
                            <a href="{xen:link account/alert-preferences}" class="button">Change Cover Photo</a>
                        </div>
                        <img src="{$user.customFields.profileCoverImage}" style="max-width: 100%;min-width: 100%;max-height: 450px;min-height: 450px;" />
                    <xen:else />
                        <div class="changeCoverPhoto button">
                            <a href="{xen:link account/preferences}">Change Cover Photo</a>
                        </div>
                        <script type="text/javascript">getRandomImage(random_images_array);</script>
                    </xen:if>
                <xen:else />
                    <xen:if is="{$user.customFields.profileCoverImage}">
                        <img src="{$user.customFields.profileCoverImage}" style="max-width: 100%;min-width: 100%;max-height: 450px;min-height: 450px;" />
                    <xen:else />
                        <script type="text/javascript">getRandomImage(random_images_array);</script>
                    </xen:if>
                </xen:if>
            </div>
        </div>
    <xen:comment>
	<div class="mast">
		
		<xen:include template="ad_member_view_below_avatar" />

		<xen:hook name="member_view_sidebar_start" params="{xen:array 'user={$user}'}" />
                
		<xen:hook name="member_view_sidebar_middle1" params="{xen:array 'user={$user}'}" />


		<xen:hook name="member_view_sidebar_middle2" params="{xen:array 'user={$user}'}" />
		
		<xen:if is="{$user.allow_view_profile} == 'everyone'">
			<xen:include template="sidebar_share_page">
				<xen:set var="$url">{xen:link canonical:members, $user}</xen:set>
			</xen:include>
		</xen:if>

		<xen:hook name="member_view_sidebar_end" params="{xen:array 'user={$user}'}" />
		
		<xen:include template="ad_member_view_sidebar_bottom" />

	</div>
    </xen:comment>
        <div class="belowCoverPhotoBlock">
            <div class="overviewTopBlocks">
                <xen:if hascontent="true">
                    <div class="section profileAboutContent">
                        <h3 class="textHeading">General</h3>
                        <div class="primaryContent">
                            <xen:contentcheck>
                                <xen:if hascontent="true">
                                    <div class="pairsColumns aboutPairs">
                                    <xen:contentcheck>
                                        <xen:if is="{$customFieldsGrouped.personal}">
                                                <xen:foreach loop="$customFieldsGrouped.personal" value="$field">
                                                        <xen:include template="custom_field_view" />
                                                </xen:foreach>
                                        </xen:if>
                                        <xen:if is="{$user.gender}">
                                            <dl><dt>{xen:phrase gender}:</dt>
                                                <dd itemprop="gender"><xen:if is="{$user.gender} == 'male'">{xen:phrase male}<xen:else />{xen:phrase female}</xen:if></dd></dl>
                                        </xen:if>
                                        <xen:if is="{$birthday}">
                                            <dl><dt>{xen:phrase birthday}:</dt>
                                                <dd><span class="dob" itemprop="dob">{xen:date $birthday.timeStamp, $birthday.format}</span> <xen:if is="{$birthday.age}"><span class="age">({xen:phrase age}: {xen:number $birthday.age})</span></xen:if></dd></dl>
                                        </xen:if>
                                        <xen:if is="{$user.homepage}">
                                            <dl><dt>{xen:phrase home_page}:</dt>
                                                <dd><a href="{xen:string censor, $user.homepage, 'x'}" rel="nofollow" target="_blank" itemprop="url">{xen:string censor, $user.homepage}</a></dd></dl>
                                        </xen:if>
                                        <xen:if is="{$user.location}">
                                            <dl><dt>{xen:phrase location}:</dt>
                                                <dd><a href="{xen:link misc/location-info, '', 'location={xen:string censor, $user.location, 'x'}'}" rel="nofollow" target="_blank" itemprop="address">{xen:string censor, $user.location}</a></dd></dl>
                                        </xen:if>
                                        <xen:if is="{$user.occupation}">
                                            <dl><dt>{xen:phrase occupation}:</dt>
                                                <dd itemprop="role">{xen:string censor, $user.occupation}</dd></dl>
                                        </xen:if>
                                        <dl><dt>{xen:phrase joined}:</dt>
                                                <dd>{xen:date $user.register_date}</dd></dl>

                                        <dl><dt>{xen:phrase messages}:</dt>
                                                <dd>{xen:number $user.message_count}</dd></dl>

                                        <dl><dt>{xen:phrase trophy_points}:</dt>
                                                <dd><a href="{xen:link 'members/trophies', $user}" class="OverlayTrigger">{xen:number $user.trophy_points}</a></dd></dl>

                                        <xen:if is="{$canViewWarnings}">
                                                <dl><dt>{xen:phrase warning_points}:</dt><dd>{xen:number $user.warning_points}</dd></dl>
                                        </xen:if>

                                        <xen:if is="{$canViewOnlineStatus}">
                                                <dl><dt>{xen:phrase last_activity}:</dt>
                                                        <dd><xen:datetime time="$user.effective_last_activity" /></dd></dl>
                                        </xen:if>
                                    </xen:contentcheck>
                                    </div>
                                </xen:if>
                                <xen:if is="{$user.about}"><div class="baseHtml ugc">{xen:raw $user.aboutHtml}</div></xen:if>
                            </xen:contentcheck>
                        </div>
                    </div>
                </xen:if>
                <div class="section profileInteractContent">
                        <h3 class="textHeading">Social</h3>

                        <div class="primaryContent">
                                <div class="pairsColumns contactInfo">
                                        <dl>
                                                <dt>{xen:phrase content}:</dt>
                                                <dd><ul>
                                                        <xen:hook name="member_view_search_content_types">
                                                        <li><a href="{xen:link search/member, '', 'user_id={$user.user_id}'}" rel="nofollow">{xen:phrase find_all_content_by_x, 'name={$user.username}'}</a></li>
                                                        <li><a href="{xen:link search/member, '', 'user_id={$user.user_id}', 'content=thread'}" rel="nofollow">{xen:phrase find_all_threads_by_x, 'name={$user.username}'}</a></li>
                                                        </xen:hook>
                                                </ul></dd>
                                        </dl>
                                        <xen:if is="{$canStartConversation}">
                                                <dl><dt>{xen:phrase conversation}:</dt> <dd><a href="{xen:link 'conversations/add', '', 'to={$user.username}'}">{xen:phrase start_conversation}</a></dd></dl>
                                        </xen:if>
                                        <xen:if is="{$customFieldsGrouped.contact}">
                                                <xen:foreach loop="$customFieldsGrouped.contact" value="$field">
                                                        <xen:include template="custom_field_view" />
                                                </xen:foreach>
                                        </xen:if>
                                <xen:comment>
                                    <xen:if is="{$visitor.customFields.MCUUID}">
                                        {$visitor.customFields.MCUUID}
                                    </xen:if>
                                    {xen:helper dump, $visitor.customFields.MCUUID}
                                    {xen:helper dump, $visitor}
                                </xen:comment>
                                        </dl>
                                                <dt>Minecraft Username:</dt>
                                                <dd><xen:callback class="TruDan_DwDMCLink" method="render" params="{$user.customFields.MCUUID}"></xen:callback></dd>
                                        </dl>
                                </div>
                        </div>
                </div>
            </div>
        </div>
	<div class="mainProfileColumn">
		<div class="section primaryUserBlock">
			<ul class="tabs mainTabs Tabs" data-panes="#ProfilePanes > li" data-history="on">
				<li><a href="{$requestPaths.requestUri}#profilePosts">{xen:phrase profile_posts}</a></li>
				<xen:if is="{$showRecentActivity}">
                                    <li><a href="{$requestPaths.requestUri}#recentActivity">{xen:phrase recent_activity}</a></li>
                                </xen:if>
				<li><a href="{$requestPaths.requestUri}#postings">{xen:phrase postings}</a></li>
				<li><a href="{$requestPaths.requestUri}#info">Signature</a></li>
				<xen:if is="{$warningCount}">
                                    <li><a href="{$requestPaths.requestUri}#warnings">{xen:phrase warnings} ({xen:number $warningCount})</a></li>
                                </xen:if>
				<xen:hook name="member_view_tabs_heading" params="{xen:array 'user={$user}'}" />
			</ul>
		</div>

		<ul id="ProfilePanes">
			<li id="profilePosts" class="profileContent">
			<xen:if is="{$canViewProfilePosts}">
				<xen:require css="message_simple.css" />

				<xen:if is="{$canPostOnProfile}">
					<form action="{xen:link members/post, $user}" method="post"
						class="messageSimple profilePoster AutoValidator primaryContent" id="ProfilePoster"
						data-optInOut="optIn">
						<xen:avatar user="$visitor" size="s" img="true" />
						<div class="messageInfo">
							<xen:if is="{$visitor.user_id} == {$user.user_id}">
								<textarea name="message" class="textCtrl StatusEditor UserTagger Elastic" placeholder="{xen:phrase update_your_status}..." rows="3" cols="50" data-statusEditorCounter="#statusEditorCounter"></textarea>
							<xen:else />
								<textarea name="message" class="textCtrl UserTagger Elastic" placeholder="{xen:phrase write_something}..." rows="3" cols="50"></textarea>
							</xen:if>
							<div class="submitUnit">
								<span id="statusEditorCounter" title="{xen:phrase characters_remaining}"></span>
								<input type="submit" class="button primary" value="{xen:phrase post_verb}" accesskey="s" />
								<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
							</div>
						</div>
					</form>
				</xen:if>
				
				<xen:include template="ad_member_view_above_messages" />

				<form action="{xen:link 'inline-mod/profile-post/switch'}" method="post"
					class="InlineModForm section"
					data-cookieName="profilePosts"
					data-controls="#InlineModControls"
					data-imodOptions="#ModerationSelect option">

					<ol class="messageSimpleList" id="ProfilePostList">
						<xen:if is="{$profilePosts}">
							<xen:foreach loop="$profilePosts" value="$profilePost">
								<xen:if is="{$profilePost.isDeleted}">
									<xen:include template="profile_post_deleted" />
								<xen:else />
									<xen:include template="profile_post" />
								</xen:if>
							</xen:foreach>
						<xen:else />
							<li id="NoProfilePosts">{xen:phrase there_no_messages_on_xs_profile_yet, 'name={$user.username}'}</li>
						</xen:if>
					</ol>

					<xen:if is="{$inlineModOptions}">
						<div class="sectionFooter InlineMod Hide">
							<label for="ModerationSelect">{xen:phrase perform_action_with_selected_posts}...</label>

							<xen:include template="inline_mod_controls">
								<xen:set var="$text">{xen:phrase post_moderation}</xen:set>
								<xen:set var="$options">
									<xen:if is="{$inlineModOptions.delete}"><option value="delete">{xen:phrase delete_posts}</option></xen:if>
									<xen:if is="{$inlineModOptions.undelete}"><option value="undelete">{xen:phrase undelete_posts}</option></xen:if>
									<xen:if is="{$inlineModOptions.approve}"><option value="approve">{xen:phrase approve_posts}</option></xen:if>
									<xen:if is="{$inlineModOptions.unapprove}"><option value="unapprove">{xen:phrase unapprove_posts}</option></xen:if>
									<option value="deselect">{xen:phrase deselect_posts}</option>
								</xen:set>
								<xen:set var="$checkboxTitle">{xen:phrase select_deselect_all_posts_on_this_page}</xen:set>
								<xen:set var="$selectedItemsPhrase">{xen:phrase selected_posts}</xen:set>
							</xen:include>
						</div>
					</xen:if>

					<div class="pageNavLinkGroup">
						<div class="linkGroup SelectionCountContainer"></div>
						<div class="linkGroup"{xen:if '!{$ignoredNames}', ' style="display: none"'}><a href="javascript:" class="muted JsOnly DisplayIgnoredContent Tooltip" title="{xen:phrase show_hidden_content_by_x, "names={xen:helper implode, $ignoredNames, ', '}"}">{xen:phrase show_ignored_content}</a></div>
						<xen:pagenav link="members" linkdata="{$user}" page="{$page}" perpage="{$profilePostsPerPage}" total="{$totalProfilePosts}" />
					</div>

					<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
				</form>

			<xen:else />
				<div id="NoProfilePosts">{xen:phrase there_no_messages_on_xs_profile_yet, 'name={$user.username}'}</div>
			</xen:if>

			</li>

			<xen:if is="{$showRecentActivity}">
			<li id="recentActivity" class="profileContent" data-loadUrl="{xen:link members/recent-activity, $user}">
				<span class="JsOnly">{xen:phrase loading}...</span>
				<noscript><a href="{xen:link members/recent-activity, $user}">{xen:phrase view}</a></noscript>
			</li>
			</xen:if>

			<li id="postings" class="profileContent" data-loadUrl="{xen:link members/recent-content, $user}">
				<span class="JsOnly">{xen:phrase loading}...</span>
				<noscript><a href="{xen:link members/recent-content, $user}">{xen:phrase view}</a></noscript>
			</li>

			<li id="info" class="profileContent">
                            <xen:if is="{$user.signature}">
                                    <div class="section">
                                            <h3 class="textHeading">{xen:phrase signature}</h3>
                                            <div class="primaryContent">
                                                    <div class="baseHtml signature ugc">{xen:raw $user.signatureHtml}</div>
                                            </div>
                                    </div>
                            </xen:if>
			</li>
			
			<xen:if is="{$warningCount}">
				<li id="warnings" class="profileContent" data-loadUrl="{xen:link members/warnings, $user}">
					{xen:phrase loading}...
					<noscript><a href="{xen:link members/warnings, $user}">{xen:phrase view}</a></noscript>
				</li>
			</xen:if>
			
			<xen:hook name="member_view_tabs_content" params="{xen:array 'user={$user}'}" />
		</ul>
	</div>

</div>