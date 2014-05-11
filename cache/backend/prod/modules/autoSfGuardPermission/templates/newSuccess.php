<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sfGuardPermission/assets') ?>
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
            <a href="<?php echo url_for('sfGuardPermission/index'); ?>"><?php echo __('Хандах эрх жагсаалт', array(), 'messages') ?></a>
                                <span class="divider">
                                    <i class="icon-angle-right arrow-icon"></i>
                                </span>
        </li>
        <li class="active"><?php echo __('Шинэ хандах эрх үүсгэх', array(), 'messages') ?></li>
    </ul>

</div>
<div class="page-content">
  <div class="page-header">
    <h1><?php echo __('Шинэ хандах эрх үүсгэх', array(), 'messages') ?></h1>
  </div>

  <?php include_partial('sfGuardPermission/flashes') ?>

  <?php include_partial('sfGuardPermission/form_header', array('sf_guard_permission' => $sf_guard_permission, 'form' => $form, 'configuration' => $configuration)) ?>

  <?php include_partial('sfGuardPermission/form', array('sf_guard_permission' => $sf_guard_permission, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

  <?php include_partial('sfGuardPermission/form_footer', array('sf_guard_permission' => $sf_guard_permission, 'form' => $form, 'configuration' => $configuration)) ?>
</div>