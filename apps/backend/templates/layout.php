<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <?php include_title() ?>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--basic styles-->
    <?php include_stylesheets() ?>


    <!--[if IE 7]>
    <link rel="stylesheet" href="/backend/assets/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/backend/assets/css/ace-ie.min.css" />
    <![endif]-->

    <!--basic scripts-->

    <!--[if !IE]>-->
    <script type="text/javascript">
        window.jQuery || document.write("<script src='/backend/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
    </script>
    <!--<![endif]-->

    <!--[if IE]>
    <script type="text/javascript">
        window.jQuery || document.write("<script src='/backend/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
    </script>
    <![endif]-->

    <script type="text/javascript">
        if("ontouchend" in document) document.write("<script src='/backend/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>


    <?php include_javascripts() ?>
</head>

<body>

<?php include_partial('public/navbar'); ?>

<div class="main-container container-fluid">

    <?php include_partial('public/sidebar') ?>

    <div class="main-content">
        <?php echo $sf_content; ?>
    </div><!--/.main-content-->
</div><!--/.main-container-->

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
    <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>


</body>
</html>
