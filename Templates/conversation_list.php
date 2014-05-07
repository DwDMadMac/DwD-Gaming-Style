<xen:if is="!{$title}"><xen:set var="$title">{xen:phrase conversations}</xen:set></xen:if>
<xen:if is="!{$pageRoute}"><xen:set var="{$pageRoute}">conversations</xen:set></xen:if>

<xen:title>{xen:escape $title, false}{xen:helper pagenumber, $page}</xen:title>
<xen:h1>{xen:escape $title, false}</xen:h1>
<xen:description>{xen:phrase conversations_allow_exchanging_messages}</xen:description>

<xen:if is="{$canStartConversation}">
	<xen:topctrl>
		<a href="{xen:link conversations/add}" class="callToAction"><span>{xen:phrase start_new_conversation}</span></a>
	</xen:topctrl>
</xen:if>

<xen:require css="discussion_list.css" />
<xen:require js="js/xenforo/discussion_list.js" />

<xen:pagenav link="{$pageRoute}" page="{$page}" perpage="{$conversationsPerPage}" total="{$totalConversations}" linkparams="{$pageNavParams}" />

<div class="discussionList section sectionMain">
	<form action="{xen:link inline-mod/conversation/switch}" method="post"
		class="DiscussionList InlineModForm"
		data-cookieName="conversations"
		data-controls="#InlineModControls"
		data-imodOptions="#ModerationSelect option"
	>	
		<dl class="sectionHeaders">
			<dt class="posterAvatar"><a><span></span></a></dt>			
			<dd class="main">
				<a class="title"><span>{xen:phrase conversation_title}</span></a>
				<a class="postDate"><span></span></a>
			</dd>			
			<dd class="stats"><a><span>{xen:phrase replies}</span></a></dd>
			<dd class="lastPost"><a><span>{xen:phrase last_post}</span></a></dd>
		</dl>

		<ol class="discussionListItems">
		<xen:if is="{$conversations}">
			<xen:foreach loop="$conversations" value="$conversation">
				<xen:include template="conversation_list_item" />
			</xen:foreach>
		<xen:else />
			<li class="primaryContent">{xen:phrase there_no_conversations_to_display} <xen:if is="{$canStartConversation}"><a href="{xen:link conversations/add}">{xen:phrase start_a_conversation_now}</a></xen:if></li>
		</xen:if>
		</ol>

		<div class="sectionFooter InlineMod SelectionCountContainer">
			<xen:if is="{$totalConversations}"><span class="contentSummary">{xen:phrase showing_conversations_x_to_y_of_z, 'start={xen:number $startOffset}', 'end={xen:number $endOffset}', 'total={xen:number $totalConversations}'}</span></xen:if>

			<xen:include template="inline_mod_controls_conversation" />
		</div>

	</form>
	
	<h3 id="DiscussionListOptionsHandle" class="JsOnly"><a href="#">{xen:phrase conversation_display_options}</a></h3>

	<form action="{xen:link $pageRoute}" method="post" class="DiscussionListOptions secondaryContent">
		<div class="controlGroup">
			<label for="ctrl_search_type">{xen:phrase show_only_conversations}:</label>
			<select name="search_type" id="ctrl_search_type" class="textCtrl">
				<option value="">({xen:phrase show_all_conversations})</option>
				<option value="received_by" {xen:selected "{$search_type} == 'received_by'"}>{xen:phrase received_by}</option>
				<xen:comment><option value="message_by" {xen:selected "{$search_type} == 'message_by'"}>{xen:phrase containing_messages_by}</option></xen:comment>
				<option value="started_by" {xen:selected "{$search_type} == 'started_by'"}>{xen:phrase started_by}</option>
			</select>
			<input type="search" name="search_user" value="{$search_user}" placeholder="{xen:phrase user_name}..."
				results="0" class="textCtrl AutoComplete AcSingle"
				data-acurl="{xen:link conversations/find-user}" data-acextrafields="#ctrl_search_type" />
		</div>
	
		<div class="buttonGroup">
			<input type="submit" class="button primary" value="{xen:phrase set_options}" />
			<input type="reset" class="button" value="{xen:phrase cancel}" />
		</div>
	
		<input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
	</form>
	
</div>
	
<div class="pageNavLinkGroup afterDiscussionListHandle">
	<div class="linkGroup">
		<xen:if is="{$canStartConversation}">
			<a href="{xen:link conversations/add}" class="callToAction"><span>{xen:phrase start_new_conversation}</span></a>
		</xen:if>
	</div>
	
	<xen:pagenav link="{$pageRoute}" page="{$page}" perpage="{$conversationsPerPage}" total="{$totalConversations}" linkparams="{$pageNavParams}" />
</div>