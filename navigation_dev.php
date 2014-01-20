<div id="navigation" class="pageWidth {xen:if $canSearch, withSearch}">
    <div class="pageContent">
            
            <div class="header styled">
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
                        <li class="navi"><a href="htt://dwdg.net/home"><span class='l'>Home</span></a></li>
                    </xen:if>
                        <li class="dropdown navi active" data-nav-colour='1494c5'><a href="/board" class="dropdown-toggle" data-toggle="dropdown"><span class='l'>Forums<span class="caret"></span></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{xen:link 'board/dwd-network/'}">Minecraft Network</a></li>
                                <li><a href="{xen:link 'league-of-leagends'}">League Of Legends</a></li>
                                <li><a href="{xen:link 'board/gta-online/'}">GTA Online</a></li>
                                <li><a href="{xen:link 'board/call-of-duty'} ">Call of Duty</a></li>
                                <li><a href="{xen:link ''}">Counter Strike</a></li>

                            </ul>
                        </li>
                        <li class="navi" data-nav-colour="2d46b2"><a href="home"><span class='l'>Servers</span></a></li>
                        <li class="navi" data-nav-colour="c329be"><a href="home"><span class='l'>Wiki</span></a></li>
                        <li class="navi" data-nav-colour="d39b38"><a href="home"><span class='l'>Staff</span></a></li>
                        <li class="navi" data-nav-colour="15a3a5"><a href="home"><span class='l'>Support</span></a></li>
                    </ul>
                </div>
            </div>
    </div>
</div>