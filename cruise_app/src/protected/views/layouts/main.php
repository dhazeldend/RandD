<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <style type="text/css">
        #main { border-top: 2px solid #222222; }
    </style>

</head>
<body>

    <div id="main">
        <?php echo $content; ?>
    </div>

</body>
</html>
