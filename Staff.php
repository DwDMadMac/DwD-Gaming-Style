<xen:title>DwD Staff</xen:title>

<xen:container var="$head.canonical">
    <link rel="canonical" href="{xen:link 'canonical:staff'}" />
</xen:container>

<xen:require css="member_list.css" />
<xen:require css="xenforo_member_list_item.css" />
	
<xen:if is="{$userNotFound}">
    <div class="importantMessage">{xen:phrase specified_member_cannot_be_found_enter_entire_name}</div>
</xen:if>

<ul class="tabs">
    <li class="{xen:if '{$type} == "staff"', active}"><a href="{xen:link staff}">{xen:phrase staff_members}</a></li>
</ul>

<div class="section">
    <ol class="memberList">
        <xen:foreach loop="$users" value="$user">
            <xen:include template="member_list_item">
                <xen:set var="$noOverlay">1</xen:set>
                <xen:set var="$extraTemplate"><xen:if is="{$bigKey}"><span class="bigNumber">{xen:number {$user.{$bigKey}}}</span></xen:if></xen:set>
            </xen:include>
    </xen:foreach>
    </ol>
</div>

<xen:sidebar>
    <div class="section">
        <form action="{xen:link members}" method="post" class="secondaryContent findMember">
            <h3><a href="{xen:link online}" title="{xen:phrase see_all_online_users}">{xen:phrase find_member}</a></h3>

            <input type="search" name="username" placeholder="{xen:phrase name}..." results="0" class="textCtrl AutoComplete" data-autoSubmit="true" />
            <input type="hidden" name="_xfToken" value="{$visitor.csrf_token_page}" />
        </form>
    </div>

    <xen:if is="{$birthdays}">
        <div class="section">
            <div class="secondaryContent avatarHeap">
                <h3>{xen:phrase todays_birthdays}</h3>

                <ol>
                <xen:foreach loop="$birthdays" value="$user">
                    <li><xen:avatar user="$user" size="s" text="{$user.username}" class="Tooltip" title="{$user.username}" /></li>
                </xen:foreach>
                </ol>
            </div>
        </div>
    </xen:if>

    <xen:if is="{$xenOptions.facebookAppId} AND {$xenOptions.facebookFacepile}">
        <xen:container var="$facebookSdk">1</xen:container>
        <div class="section">
            <fb:facepile width="@sidebar.width" size="small" colorscheme="@fbColorScheme"></fb:facepile>
        </div>
    </xen:if>
</xen:sidebar>