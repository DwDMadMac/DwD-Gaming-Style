<?php if(!class_exists('raintpl')){exit;}?><div class="clearfix"></div>
<div class="footer<?php if( $session["user_id"] == 0 ){ ?> loginPage<?php } ?>">
    <div class="inner"> 
        <div class="clearfix"></div>
        <div class="footerfooter">
            &copy; Down With Destruction 2014, All Rights Reserved.
            <span class="pull-right">Site Created by DwD Dev Team</span>
        </div>
        <div class="printnotes">
            Page generated in <?php echo ( round( $pageTime, 4 ) );?> seconds<br />
        </div>
    </div>
</div>
</div>
</body>
</html>
