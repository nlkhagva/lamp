<?php use_helper('I18N', 'Date') ?>
<?php include_partial('content/assets') ?>
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
            <a href="<?php echo url_for('content/index'); ?>"><?php echo __('Агуулгын жагсаалт', array(), 'messages') ?></a>
                                <span class="divider">
                                    <i class="icon-angle-right arrow-icon"></i>
                                </span>
        </li>
        <li class="active"><?php echo __('Шинээр агуулга нэмэх', array(), 'messages') ?></li>
    </ul>

</div>
<div class="page-content">
  <div class="page-header">
    <h1><?php echo __('Шинээр агуулга нэмэх', array(), 'messages') ?></h1>
  </div>

  <?php include_partial('content/flashes') ?>

  <?php include_partial('content/form_header', array('content' => $content, 'form' => $form, 'configuration' => $configuration)) ?>

  <?php include_partial('content/form', array('content' => $content, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

  <?php include_partial('content/form_footer', array('content' => $content, 'form' => $form, 'configuration' => $configuration)) ?>
</div>