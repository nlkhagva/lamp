<?php use_helper('I18N', 'Date') ?>
<?php include_partial('product_stock/assets') ?>

<div id="sf_admin_container" class="product-stock-lkhagva">
  <h1><?php echo __('Барааны бүртгэлийн мэдээлэл', array(), 'messages') ?></h1>

  <?php include_partial('product_stock/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('product_stock/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('product_stock/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('product_stock_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('product_stock/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('product_stock/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('product_stock/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('product_stock/list_footer', array('pager' => $pager)) ?>
  </div>
</div>


<script type="text/javascript">
    $(function() {

        /*
         * Initialise print preview plugin
         */
        // Add link for print preview and intialise
        $('#sf_admin_container').prepend('<a class="print-preview btn btn-mini" style="float: right" href="javascript:window.print()"><i class="icon-print" style="margin-top: 1px; margin-right: 3px;"></i><?php echo __('Хэвлэж авах'); ?></a>');

    });
</script>
