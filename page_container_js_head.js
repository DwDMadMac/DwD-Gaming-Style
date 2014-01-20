	<script src="{$jQuerySource}"></script>	
	<xen:if is="{$jQuerySource} != {$jQuerySourceLocal}">
		<script>if (!window.jQuery) { document.write('<scr'+'ipt type="text/javascript" src="{$jQuerySourceLocal}"><\/scr'+'ipt>'); }</script>
	</xen:if><xen:if is="{$xenOptions.uncompressedJs} == 1 OR {$xenOptions.uncompressedJs} == 3">
	<script src="{$javaScriptSource}/jquery/jquery.xenforo.rollup.js?_v={$xenOptions.jsVersion}"></script></xen:if>	
	<script src="{xen:helper javaScriptUrl, '{$javaScriptSource}/xenforo/xenforo.js?_v={$xenOptions.jsVersion}'}"></script>
        <!-- Custom Navi JS -->
        <script type="text/javascript" src="http://static.downwithdestruction.net/theme/js/custom.js"></script>
        <script type="text/javascript" src="http://static.downwithdestruction.net/theme/js/colour.jquery.min.js"></script>
        <xen:comment><script type="text/javascript" src="http://static.downwithdestruction.net/theme/js/bootstrap.min.js"></script></xen:comment>
        <!--XenForo_Require:JS-->