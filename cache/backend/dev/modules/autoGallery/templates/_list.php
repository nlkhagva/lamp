  <?php if (!$pager->getNbResults()): ?>
    <p class="alert alert-warning"><?php echo __('No result', array(), 'sf_admin') ?></p>
    <div class="btn-toolbar">
      <?php include_partial('gallery/list_actions', array('helper' => $helper)) ?>
    </div>
  <?php else: ?>

    <table class="table table-striped">
      <thead>
        <tr>
          <th><input id="checkAll" type="checkbox" onclick="toggleCheckboxes();" /></th>
          <?php include_partial('gallery/list_th', array('sort' => $sort)) ?>
          <th><?php echo __('Actions', array(), 'sf_admin') ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="4">
            <?php if ($pager->haveToPaginate()): ?>
              <?php include_partial('gallery/pagination', array('pager' => $pager)) ?>
            <?php endif; ?>

            <div class="btn-toolbar">
              <?php include_partial('gallery/list_batch_actions', array('helper' => $helper)) ?>
              <?php include_partial('gallery/list_actions', array('helper' => $helper)) ?>
            </div>
          </th>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($pager->getResults() as $gallery): ?>
          <tr>
            <?php include_partial('gallery/list_td_batch_actions', array('gallery' => $gallery, 'helper' => $helper)) ?>
            <?php include_partial('gallery/list_td', array('gallery' => $gallery)) ?>
            <?php include_partial('gallery/list_td_actions', array('gallery' => $gallery, 'helper' => $helper)) ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

<script type="text/javascript">
/* <![CDATA[ */
function toggleCheckboxes()
{
	var $mainCheckbox = $('#checkAll'),
	    $boxes        = $('tbody [type="checkbox"]', $mainCheckbox.closest('table'));
	
	if ($mainCheckbox.is(':checked'))
		$boxes.attr('checked', 'checked');
	else
		$boxes.removeAttr('checked');
}
/* ]]> */
</script>