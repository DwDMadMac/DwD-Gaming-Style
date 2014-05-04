<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin CP | DwD</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/theme/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="/theme/css/style.css" />
        <script type="text/javascript" src="/theme/js/jquery.min.js"></script>
        <script type="text/javascript" src="/theme/js/easing.jquery.min.js"></script>
        <script type="text/javascript" src="/theme/js/colour.jquery.min.js"></script>
        <script type="text/javascript" src="/theme/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/theme/js/custom.js"></script>
    </head>
    <body>
        <div class="wrap">
            <?php if( $session["user_id"] > 0 ){ ?>
            <div class="header styled">
                <div class="userbar">Hello <?php echo $session["username"];?></div>
                <div class="inner">
                    <img src="/theme/img/BioHazard.png" class="pull-left" />


                    <div class='status pull-right'>
                        Administration Control Panel v0.1<br />
                    </div>
                </div>
                <div class="nav">
                    <ul id="nav">
                        <li class='navi'><a href="/home"><span class='l'>Dashboard</span></a></li>
                        <li class='navi' data-nav-colour='1494c5'><a href="/users"><span class='l'>User Moderation</span></a></li>
                        <li class='navi' data-nav-colour='2FD32F'><a href="/servers"><span class='l'>Server Management</span></a></li>
                        <li class='navi' data-nav-colour='E78233'><a href="/logs"><span class='l'>Logs</span></a></li>
                        
                             <li class="pull-right dropdown"><a href="/#" class="dropdown-toggle" data-toggle="dropdown"><img src="https://www.gravatar.com/avatar/<?php echo $session["emailhash"];?>" width='28' height='28' style='margin-top:-3px;' /> <?php echo $session["username"];?> <span class="caret"></span></span></a>

                                 <ul class="dropdown-menu">
                                     <li><a href="/acpusers">Users</a></li>
                                     <li><a href="/settings">Settings</a></li>
                                     <li class="divider"></li>
                                     <li><a href="/logout">Log Out</a></li>

                                 </ul>
                             </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>

                <div class="clearfix padd"></div>
                <div class="clearfix padd"></div>