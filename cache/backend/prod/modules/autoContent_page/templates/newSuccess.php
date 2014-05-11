<?php use_helper('I18N', 'Date') ?>
<?php include_partial('content_page/assets') ?>
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>

    <ul class="breadcrumb">
        <li>
            <a href="<?php echo url_for('@homepage'); ?>"><i class="icon-home home-icon"></i></a>

                                <span class="divider">
                                    <i class="icon-angle-right arrow-icon"></i>
                                </span>
        </li>
        <li>
            <a href="<?php echo url_for('content_page/index'); ?>"><?php echo __('Хуудас жагсаалт', array(), 'messages') ?></a>
                                <span class="divider">
                                    <i class="icon-angle-right arrow-icon"></i>
                                </span>
        </li>
        <li class="active"><?php echo __('Шинэ хуудас үүсгэх', array(), 'messages') ?></li>
    </ul>

</div>
<div class="page-content">
  <div class="page-header">
    <h1><?php echo __('Шинэ хуудас үүсгэх', array(), 'messages') ?></h1>
  </div>

  <?php include_partial('content_page/flashes') ?>

  <?php include_partial('content_page/form_header', array('page' => $page, 'form' => $form, 'configuration' => $configuration)) ?>

  <?php include_partial('content_page/form', array('page' => $page, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

  <?php include_partial('content_page/form_footer', array('page' => $page, 'form' => $form, 'configuration' => $configuration)) ?>
</div>