<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sfGuardPermission/assets') ?>

<?php #include_partial('sfGuardPermission/navbar', array('filter' => 1)) ?>
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
        <li class="active"><?php echo __('Хандах эрх жагсаалт', array(), 'messages') ?></li>
    </ul>

</div>
<div class="page-content">

      <?php $filterValues = $sf_user->getAttribute('sfGuardPermission.filters', array(), 'admin_module'); if (!empty($filterValues)): ?>
    <div class="alert alert-info alert-block">
      <a href="#" class="close fade" data-dismiss="alert">&times;</a>
      <h4 class="alert-heading">Хайлт</h4>
      Хайлтын илэрц. <a href="#filterPopup" data-toggle="modal">Хайлтыг өөрчлөх</a>
    </div>
    <?php endif; ?>

  
  <div class="page-header">

    <div class="pull-right">
      <a href="#filterPopup" class="btn" data-toggle="modal"><i class="icon-search"></i> Хайлт</a>
    </div>
    <h1><?php echo __('Хандах эрх жагсаалт', array(), 'messages') ?>
    <small class="offset2"><?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?>
    <?php if ($pager->haveToPaginate()): ?>
      <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
    <?php endif; ?></small></h1>
  </div>

  <?php include_partial('sfGuardPermission/flashes') ?>

  <?php include_partial('sfGuardPermission/list_header', array('pager' => $pager)) ?>

    <form action="<?php echo url_for('sf_guard_permission_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('sfGuardPermission/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    </form>

  <div id="sf_admin_footer">
    <?php include_partial('sfGuardPermission/list_footer', array('pager' => $pager)) ?>
  </div>

  <?php include_partial('sfGuardPermission/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
</div>