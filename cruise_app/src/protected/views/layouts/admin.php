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
        $controller = Yii::app()->controller->getId();

        ?>
        <div id="mainmenu">
            <ul class="centered">

                <li <?php if($controller == 'site'): ?>class="active"<?php endif; ?> ><a href="/">HOME</a></li>
                <li <?php if($controller == 'user'): ?>class="active"<?php endif; ?> ><a href="/user">USERS</a></li>
                <li <?php if($controller == 'role'): ?>class="active"<?php endif; ?> ><a href="/role">ROLES & PERMISSIONS</a></li>

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
        $action = Yii::app()->controller->getAction()->getId();
        $route = $controller.'/'.$action;

        if(!empty($this->menu)): ?>

        <div id="submenu" class="centered">
            <div class="navbar">
                <div class="navbar-inner">
                    <ul class="nav">

                        <?php foreach($this->menu as $item): ?>
                        <li <?php if($route == $item['url']['route']): ?>class="active"<?php endif; ?> >
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
            © Media24 News. All rights reserved.
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
