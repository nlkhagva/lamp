<?php use_helper('I18N', 'Date') ?>
<?php include_partial('gallery/assets') ?>

<script>
	bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true}).panelInstance('gallery_description')});
</script>

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
            <a href="<?php echo url_for('@gallery'); ?>">Зургийн цомгууд</a>

            <span class="divider">
                <i class="icon-angle-right arrow-icon"></i>
            </span>
        </li>
        <li class="active">Зургийн цомог засварлах</li>
    </ul>
</div>

<div class="page-content">
    <div class="page-header">
        <h1><?php echo __('backend.edit.title', array(), 'sfmaug') ?></h1>
    </div>

<div id="sf_admin_container">

  <?php include_partial('gallery/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('gallery/form_header', array('gallery' => $gallery, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('gallery/form', array('gallery' => $gallery, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('gallery/form_footer', array('gallery' => $gallery, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

</div><!--- end page-content. --->
