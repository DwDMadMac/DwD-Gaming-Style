<xen:comment>
    Founder = 13                    Priority = 9000
    
    /* Global */
    Staff Only = 16                 Priority = 50000
    Community Operator = 3          Priority = 1000
    Community Admin = 12            Priority = 950
    Community Moderator = 4         Priority = 900
    Wiki Developer = 15             Priority = 700
    Retired Staff = 14              Priority = 1
    Community Member = 2            Priority = 0
    Guest = 1                       Priority = 0
    
    /* Minecraft */
    MC Network Operator = 11        Priority = 70
    MC Network Developer = 17       Priority = 99
    MC Network Admin = 10           Priority = 60
    MC Network Moderator = 9        Priority = 50
    RPG Kingdom Owner = 5           Priority = 45
    MC Network Vet = 8              Priority = 40
    MC Network Elite = 7            Priority = 30
    MC Network Trustie = 6          Priority = 20
    
    /* Grand Theft Auto */
    GTA Admin = 18                  Priority = 59
    GTA Moderator = 19              Priority = 49
    
    /* League of Legends */
    LoL Admin = 20                  Priority = 58
    LoL Moderator = 21              Priority = 48
    
    /* Call of Duty */
    COD Admin = 22                  Priority = 57
    COD Moderator = 23              Priority = 47
</xen:comment>
<xen:require css="user_ribbons.css" />
<xen:if hascontent="true">
    <ul class="ribbon">
        <xen:contentcheck>
            <xen:if is="{xen:helper ismemberof, $user, 13}">
                <li class="ribbonFounder">
                    <div class="left"></div>
                    <div class="right"></div>
                        Founder
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 3}">
                <li class="ribbonCommunityOperator">
                    <div class="left"></div>
                    <div class="right"></div>
                        Community Operator
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 12}">
                <li class="ribbonCommunityAdmin">
                    <div class="left"></div>
                    <div class="right"></div>
                        Community Admin
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 4}">
                <li class="ribbonCommunityModerator">
                    <div class="left"></div>
                    <div class="right"></div>
                        Community Moderator
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 15}">
                <li class="ribbonWikiDeveloper">
                    <div class="left"></div>
                    <div class="right"></div>
                        Wiki Developer
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 14}">
                <li class="ribbonRetiredStaff">
                    <div class="left"></div>
                    <div class="right"></div>
                        Retired Staff
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 11}">
                <li class="ribbonMCNetworkOperator">
                    <div class="left"></div>
                    <div class="right"></div>
                        MC Network Operator
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 17}">
                <li class="ribbonMCNetworkDeveloper">
                    <div class="left"></div>
                    <div class="right"></div>
                        MC Network Developer
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 10}">
                <li class="ribbonMCNetworkAdmin">
                    <div class="left"></div>
                    <div class="right"></div>
                        MC Network Admin
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 9}">
                <li class="ribbonMCNetworkModerator">
                    <div class="left"></div>
                    <div class="right"></div>
                        Mc Network Moderator
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 5}">
                <li class="ribbonRPGKingdomOwner">
                    <div class="left"></div>
                    <div class="right"></div>
                        RPG Kingdom Owner
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 8}">
                <li class="ribbonMCNetworkVet">
                    <div class="left"></div>
                    <div class="right"></div>
                        MC Network Vet
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 7}">
                <li class="ribbonMCNetworkElite">
                    <div class="left"></div>
                    <div class="right"></div>
                        MC Network Elite
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 6}">
                <li class="ribbonMCNetworkTrustie">
                    <div class="left"></div>
                    <div class="right"></div>
                        MC Network Trustie
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 2}">
                <li class="ribbonCommunityMember">
                    <div class="left"></div>
                    <div class="right"></div>
                        Community Member
                </li>
            </xen:if>
            <xen:if is="{xen:helper ismemberof, $user, 1}">
                <li class="ribbonGuest">
                    <div class="left"></div>
                    <div class="right"></div>
                        Guest
                </li>
            </xen:if>
        </xen:contentcheck>
    </ul>
</xen:if>