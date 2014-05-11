<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <?php include_title() ?>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--basic styles-->

    <link href="/backend/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/backend/assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/backend/assets/css/font-awesome.min.css" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="/backend/assets/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!--page specific plugin styles-->

    <!--fonts-->
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/backend/assets/css/ace-fonts.css" />

    <!--ace styles-->

    <link rel="stylesheet" href="/backend/assets/css/ace.min.css" />
    <link rel="stylesheet" href="/backend/assets/css/ace-responsive.min.css" />
    <link rel="stylesheet" href="/backend/assets/css/ace-skins.min.css" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/backend/assets/css/ace-ie.min.css" />
    <![endif]-->

    <!--inline styles related to this page-->
    <?php include_stylesheets() ?>



    <!--basic scripts-->

    <script src="/backend/assets/js/jquery-2.0.3.min.js"></script>
    <script src="/backend/assets/js/bootstrap.min.js"></script>

    <!--page specific plugin scripts-->
    <?php //include_javascripts() ?>

    <!--[if lte IE 8]>
    <script src="/backend/assets/js/excanvas.min.js"></script>
    <![endif]-->

    <!--ace scripts-->

    <script src="/backend/assets/js/ace-elements.min.js"></script>
    <script src="/backend/assets/js/ace.min.js"></script>

    <!--ace settings handler-->
    <script src="/backend/assets/js/ace-extra.min.js"></script>
</head>

<body class="login-layout">
<div class="main-container container-fluid">
<div class="main-content">
<div class="row-fluid">
<div class="span12" style="margin-top: 75px;">
    <?php echo $sf_content; ?>
</div><!--/.span-->
</div><!--/.row-fluid-->
</div>
</div><!--/.main-container-->

</body>
</html>
