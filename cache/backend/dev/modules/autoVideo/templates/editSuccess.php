<?php use_helper('I18N', 'Date') ?>
<?php include_partial('video/assets') ?>
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
            <a href="<?php echo url_for('video/index'); ?>"><?php echo __('Видео жагсаалт', array(), 'messages') ?></a>
                                <span class="divider">
                                    <i class="icon-angle-right arrow-icon"></i>
                                </span>
        </li>
        <li class="active"><?php echo __('Видео засварлах', array(), 'messages') ?></li>
    </ul>

</div>
<div class="page-content">
  <div class="page-header">
    <h1><?php echo __('Видео засварлах', array(), 'messages') ?></h1>
  </div>

  <?php include_partial('video/flashes') ?>

  <?php include_partial('video/form_header', array('video' => $video, 'form' => $form, 'configuration' => $configuration)) ?>

  <?php include_partial('video/form', array('video' => $video, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

  <?php include_partial('video/form_footer', array('video' => $video, 'form' => $form, 'configuration' => $configuration)) ?>
</div>