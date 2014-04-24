<xen:require css="footer_dev.css" />

<div id="navigation" class="pageWidth {xen:if $canSearch, withSearch}">
    <div class="pageContent">
            <div class="footer">
                <div class="inner">
                    <div class='col-md-4'>
                        <h4>Social</h4>
                        <ul class="tile">
                            <li><a href="https://www.facebook.com/DwDGamingCommunity" target="_blank"><img src="https://dwdg.net/theme/img/facebook.png" /></a></li>
                            <li><a href="https://twitter.com/dwdgaming" target="_blank"><img src="https://dwdg.net/theme/img/twitter.png" /></a></li>
                            <li><a href="https://www.youtube.com/user/TheDwDCommunity" target="_blank"><img src="https://dwdg.net/theme/img/youtube.png" /></a></li>
                            <li><a href="https://plus.google.com/117841516016676816685" target="_blank"><img src="https://dwdg.net/theme/img/google.png" /></a></li>
                            <li><a href="{xen:link forums/-/index.rss}" rel="alternate" class="globalFeed" target="_blank" title="{xen:phrase rss_feed_for_x, 'title={$xenOptions.boardTitle}'}"><img src="http:s//dwdg.net/theme/img/rss.png" /></a></li>
                        </ul>                    
                    </div>
                    <div class='col-md-4'>
                        <h4>Help & Support</h4>
                        <ul>
                            <li><a href="{xen:link wiki}">Wiki</a></li>
                            <li><a href="https://forums.downwithdestruction.net/staff/">Staff</a></li>
                            <li><a href="#">Forum Issues</a></li>
                            <li><a href="#">Game Server Issues</a></li>
                            <li><a href="{xen:link forms/file-a-report.5/respond}" class="OverlayTrigger">Report a member</a></li>
                        </ul>                    
                    </div>
                    <div class='col-md-4'>
                        <h4>Legal</h4>
                        <ul>
                            <li><a href="{xen:link doc/rules-and-regulations/}">Rules & Regulations</a></li>
                            <li><a href="{xen:link doc/intelligence-clause/}">Intelligence Clause</a></li>
                            <li><a href="{xen:link doc/copyright/}">Copyright</a></li>
                            <li><a href="{xen:link doc/privacy-policy/}">Privacy Policy</a></li>
                            <li><a href="{xen:link doc/terms-of-service/}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="footerfooter">
                        &copy; Down With Destruction 2014, All Rights Reserved.
                        <span class="pull-right">Site Created by DwD Dev Team</span>
                    </div>
                    <div class="printnotes">
                        <xen:hook name="footer">
                            Forums powered by XenForo™ v1.3.0 ©2010-2014 XenForo Ltd.<br />
                            <xen:if is="{$debugMode}">
                                <xen:if hascontent="true">
                                    <dl class="pairsInline debugInfo" title="{$controllerName}-&gt;{$controllerAction}{xen:if $viewName, ' ({$viewName})'}">
                                        <xen:contentcheck>
                                            <xen:if is="{$memory_usage}"><dt>{xen:phrase memory}:</dt> <dd>{xen:phrase x_mb, 'size={xen:number {xen:calc "{$memory_usage} / 1024 / 1024"}, 3}'}</dd></xen:if>
                                            <xen:if is="{$db_queries}"><dt>{xen:phrase db_queries}:</dt> <dd>{xen:number {$db_queries}}</dd></xen:if>
                                            <xen:if is="{$page_time}"><a href="{$debug_url}" rel="nofollow"><dt>{xen:phrase timing}:</dt> <dd>{xen:phrase x_seconds, 'time={xen:number $page_time, 4}'}</dd></a></xen:if>
                                        </xen:contentcheck>
                                    </dl>
                                </xen:if>
                            </xen:if>
                        </xen:hook>
                    </div>
                </div>
            </div>
    </div>
</div>