        <div class="wrap">
            <div class="header styled">
                <div class="userbar">Log in or Sign up</div>
                <div class="inner">
                    <img src="BioHazard.png" class="pull-left" />


                    <div class='status pull-right'>
                        <img src='online.png' data-placement="left" title="Online" /> TeamSpeak: ts.dwdg.net<br />
                        <img src='semioffline.png' data-placement="left" title="Events is Offline" /> Minecraft: hub.dwdg.net<br />
                    </div>
                </div>
                <div class="nav">
                    <ul id="nav">
                    <xen:if is="{$showHomeLink}">
                        <li class="home PopupClosed"><a href="home"><span class='l'><a href="{$homeLink}" class="navLink">Home</a></span></a></li>
                    </xen:if>
                        <li class="dropdown" data-nav-colour='1494c5'><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class='l'>Forums<span class="caret"></span></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{xen:link 'board/dwd-network/'}">Minecraft Network</a></li>
                                <li><a href="{xen:link 'leage-of-leagends'}">League Of Legends</a></li>
                                <li><a href="{xen:link 'board/gta-online/'}">GTA Online</a></li>
                                <li><a href="{xen:link 'board/call-of-duty'} ">Call of Duty</a></li>
                                <li><a href="{xen:link ''}">Counter Strike</a></li>

                            </ul>
                        </li>
                        <li><a href="home"><span class='l'>Communities</span></a></li>
                        <li><a href="home"><span class='l'>Servers</span></a></li>
                        <li><a href="home"><span class='l'>Wiki</span></a></li>
                        <li><a href="home"><span class='l'>Staff</span></a></li>
                        <li><a href="home"><span class='l'>Support</span></a></li>
                    </ul>
                </div>
            </div>
        </div>