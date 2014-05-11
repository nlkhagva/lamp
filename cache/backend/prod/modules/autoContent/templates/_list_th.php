<?php slot('sf_admin.current_header') ?>
<th>
  <?php echo __('Гарчиг', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th>
  <?php if ('published' == $sort[0]): ?>
    <?php echo link_to(__('Харуулах уу? <i class="icon-chevron-'.(($sort[1] == 'asc') ? 'down' : 'up').'"></i>', array(), 'messages'), '@content', array('query_string' => 'sort=published&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Харуулах уу?', array(), 'messages'), '@content', array('query_string' => 'sort=published&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th>
  <?php echo __('Секци', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th>
  <?php echo __('Ангилалууд', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>