<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_header" );?>
<div class="htmlError">
    <div class="inner">
        <h2>Nice Try Broski!</h2>
        <p>It looks like you don't have permission to view this page!</p>
    </div></div>
<div class='clearfix padd'></div>
<div class='clearfix padd'></div>
<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "tpl/global_footer" );?>