<xen:require css="footer_dev.css" />

<div id="navigation" class="pageWidth {xen:if $canSearch, withSearch}">
    <div class="pageContent">
            <div class="footer">
                <div class="inner">
                    <div class='col-md-4'>
                        <h4>Social</h4>
                        <ul class="tile">
                            <li><a href="#"><img src="http://static.dwdg.net/theme/img/facebook.png" /></a></li>
                            <li><a href="#"><img src="http://static.dwdg.net/theme/img/twitter.png" /></a></li>
                            <li><a href="#"><img src="http://static.dwdg.net/theme/img/youtube.png" /></a></li>
                            <li><a href="#"><img src="http://static.dwdg.net/theme/img/google.png" /></a></li>
                            <li><a href="{xen:link forums/-/index.rss}" rel="alternate" class="globalFeed" target="_blank" title="{xen:phrase rss_feed_for_x, 'title={$xenOptions.boardTitle}'}">
                                    <img src="http://static.dwdg.net/theme/img/rss.png" /></a>
                            </li>
                        </ul>                    
                    </div>
                    <div class='col-md-4'>
                        <h4>Help & Support</h4>
                        <ul>
                            <li><a href="#">Wiki</a></li>
                            <li><a href="#">Staff</a></li>
                            <li><a href="#">Forum Issues</a></li>
                            <li><a href="#">Game Server Issues</a></li>
                            <li><a href="#">Report a member</a></li>
                        </ul>                    
                    </div>
                    <div class='col-md-4'>
                        <h4>Legal</h4>
                        <ul>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Copyright</a></li>
                            <li><a href="#">Credits</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="footerfooter">
                        &copy; Down With Destruction 2014, All Rights Reserved.
                        <span class="pull-right">Site Created by DwD Dev Team</span>
                    </div>
                    <div class="printnotes">
                        <xen:hook name="footer">
                            Forums powered by XenForo™ v1.2.2 ©2010-2013 XenForo Ltd.<br />
                            <xen:if is="{$debugMode}">
                                <xen:if hascontent="true">
                                    <dl class="pairsInline debugInfo" title="{$controllerName}-&gt;{$controllerAction}{xen:if $viewName, ' ({$viewName})'}">
                                        <xen:contentcheck>
                                            <xen:if is="{$page_time}"><dt>{xen:phrase timing}:</dt> <dd><a href="{$debug_url}" rel="nofollow">{xen:phrase x_seconds, 'time={xen:number $page_time, 4}'}</a></dd></xen:if>
                                            <xen:if is="{$memory_usage}"><dt>{xen:phrase memory}:</dt> <dd>{xen:phrase x_mb, 'size={xen:number {xen:calc "{$memory_usage} / 1024 / 1024"}, 3}'}</dd></xen:if>
                                            <xen:if is="{$db_queries}"><dt>{xen:phrase db_queries}:</dt> <dd>{xen:number {$db_queries}}</dd></xen:if>
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