<?php slot('sf_admin.current_header') ?>
<th>
  <?php if ('id' == $sort[0]): ?>
    <?php echo link_to(__('Id <i class="icon-chevron-'.(($sort[1] == 'asc') ? 'down' : 'up').'"></i>', array(), 'messages'), '@gallery', array('query_string' => 'sort=id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Id', array(), 'messages'), '@gallery', array('query_string' => 'sort=id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th>
  <?php if ('title' == $sort[0]): ?>
    <?php echo link_to(__('Гарчиг <i class="icon-chevron-'.(($sort[1] == 'asc') ? 'down' : 'up').'"></i>', array(), 'messages'), '@gallery', array('query_string' => 'sort=title&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Гарчиг', array(), 'messages'), '@gallery', array('query_string' => 'sort=title&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>