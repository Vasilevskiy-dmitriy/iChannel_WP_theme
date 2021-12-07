<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Cache-Control" content="no-cache">
        <title><?php bloginfo('name'); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all">
    </head>
<body>
<?php date_default_timezone_set('EET'); ?>
<!--HEADER-->
    <header>
        <div class="time_header">Kyiv <?php echo date("H:i");?> </div>
        <div>
            <a class="text_header" style="color: white;" href="/"><?php bloginfo('name'); ?></a>
        </div>
        <div class="log_out_header">
            <img src="" alt=""  class="dropbtn">
        </div>
    </header>
