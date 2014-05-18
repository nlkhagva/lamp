<?php use_helper('I18N', 'Date') ?>
<?php include_partial('gallery/assets') ?>
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
            <a href="<?php echo url_for('gallery/index'); ?>"><?php echo __('Зургийн цомгууд', array(), 'messages') ?></a>
                                <span class="divider">
                                    <i class="icon-angle-right arrow-icon"></i>
                                </span>
        </li>
        <li class="active"><?php echo __('Зургийн цомог засах', array(), 'messages') ?></li>
    </ul>

</div>
<div class="page-content">
  <div class="page-header">
    <h1><?php echo __('Зургийн цомог засах', array(), 'messages') ?></h1>
  </div>

  <?php include_partial('gallery/flashes') ?>

  <?php include_partial('gallery/form_header', array('gallery' => $gallery, 'form' => $form, 'configuration' => $configuration)) ?>

  <?php include_partial('gallery/form', array('gallery' => $gallery, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

  <?php include_partial('gallery/form_footer', array('gallery' => $gallery, 'form' => $form, 'configuration' => $configuration)) ?>
</div>