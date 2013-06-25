<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <?php echo $head; ?>
    </head>
    <body>
        <?php echo $header; ?>
        <?php echo $content; ?>
        <?php echo $footer; ?>
    </body>
    
<!--         <script src="js/vendor/jquery-1.10.0.min.js"></script> -->
<!--         <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.0.min.js"><\/script>')</script> -->

        <?  echo Asset::js('vendor/jquery-1.10.0.min.js');
            echo Asset::js('vendor/jquery-ui-1.10.3.custom.min.js');
            echo Asset::js('plugins/rotate3Di.js');
            echo Asset::js('plugins/jquery.reveal.js');
            echo Asset::js('plugins/jquery.Jcrop.min.js');
            echo Asset::js('plugins/jquery.validationEngine.js');
            echo Asset::js('plugins/jquery.validationEngine-en.js');
            echo Asset::js('plugins.js');
		    echo Asset::js('main.js'); ?>
</html>