  <?php if (!$pager->getNbResults()): ?>
    <p class="alert alert-warning"><?php echo __('No result', array(), 'sf_admin') ?></p>
    <div class="btn-toolbar">
      <?php include_partial('content/list_actions', array('helper' => $helper)) ?>
    </div>
  <?php else: ?>

    <table class="table table-striped">
      <thead>
        <tr>
          <th><input id="checkAll" type="checkbox" onclick="toggleCheckboxes();" /></th>
          <?php include_partial('content/list_th', array('sort' => $sort)) ?>
          <th><?php echo __('Actions', array(), 'sf_admin') ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="6">
            <?php if ($pager->haveToPaginate()): ?>
              <?php include_partial('content/pagination', array('pager' => $pager)) ?>
            <?php endif; ?>

            <div class="btn-toolbar">
              <?php include_partial('content/list_batch_actions', array('helper' => $helper)) ?>
              <?php include_partial('content/list_actions', array('helper' => $helper)) ?>
            </div>
          </th>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($pager->getResults() as $content): ?>
          <tr>
            <?php include_partial('content/list_td_batch_actions', array('content' => $content, 'helper' => $helper)) ?>
            <?php include_partial('content/list_td', array('content' => $content)) ?>
            <?php include_partial('content/list_td_actions', array('content' => $content, 'helper' => $helper)) ?>
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
