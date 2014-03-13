<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>
    <div id="main">

        <?php
        /*
         * Render the main menu
         *
         */
        ?>
        <div id="mainmenu">
            <ul class="centered">
                <li <?php if($this->controller == 'site'): ?>class="active"<?php endif; ?> ><a href="/">home</a></li>
                <li <?php if($this->controller == 'user' || $this->controller == 'role'): ?>class="active"<?php endif; ?> ><a href="/user">users</a></li>
                <li <?php if($this->controller == 'cruiseline'): ?>class="active"<?php endif; ?> ><a href="/cruiseline">cruiselines</a></li>
                <li <?php if($this->controller == 'ship'): ?>class="active"<?php endif; ?> ><a href="/ship">ships</a></li>
                <li <?php if($this->controller == 'cabin'): ?>class="active"<?php endif; ?> ><a href="/cabin">cabins</a></li>
                <li <?php if($this->controller == 'port'): ?>class="active"<?php endif; ?> ><a href="/port">ports</a></li>
                <li <?php if($this->controller == 'route'): ?>class="active"<?php endif; ?> ><a href="/route">routes</a></li>
                <li <?php if($this->controller == 'pricing'): ?>class="active"<?php endif; ?> ><a href="/pricing">pricing</a></li>
                <li <?php if($this->controller == 'itinerary'): ?>class="active"<?php endif; ?> ><a href="/itinerary">itinerary</a></li>
                
                <li id="user">
                    CRUISE ADMIN | <?php echo Yii::app()->user->name ?>
                </li>
            </ul>
        </div> <!-- mainmenu -->

        <?php
        /*
         * Render the submenu using the menu array that
         * was set in the content view.
         *
         */

        if(!empty($this->menu)): ?>

        <div id="submenu" class="centered">
            <div class="navbar">
                <div class="navbar-inner">
                    <ul class="nav">

                        <?php foreach($this->menu as $item): ?>
                        <li <?php if($this->route == $item['url']['route']): ?>class="active"<?php endif; ?> >
                            <?php echo CHtml::link($item['label'], array($item['url']['route'])); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?> <!-- submenu -->

        <div class="centered">
            <div id="content"><?php echo $content; ?></div>
        </div> <!-- content -->
    </div>

    <div id="footer">
        <div class="centered">
            © R&D Ops. All rights reserved.
        </div>
    </div> <!-- footer -->

    <?php
        /* RENDER THE FLASH MESSAGES */
        
        // check if the user has the success
        // flash set. If the user has the flash then
        // render a script to call the BlockUI function
        // growlUI() which will show a flash message
        // in the top right-hand corner of the viewport.
        if (Yii::app()->user->hasFlash('success')) {

            cs()->registerScript(
                'flash',
                '$(function() { $.growlUI("'.Yii::app()->user->getFlash('success').'"); });',
                CClientScript::POS_END);
        }
        
        // TODO: Maybe an error flash?... this could just be a div element
        // that gets rendered to notify the user that an error had occured.
        ?>
</body>
</html>
