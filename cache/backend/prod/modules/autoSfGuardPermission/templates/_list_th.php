<?php slot('sf_admin.current_header') ?>
<th>
  <?php if ('name' == $sort[0]): ?>
    <?php echo link_to(__('Нэр <i class="icon-chevron-'.(($sort[1] == 'asc') ? 'down' : 'up').'"></i>', array(), 'messages'), '@sf_guard_permission', array('query_string' => 'sort=name&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Нэр', array(), 'messages'), '@sf_guard_permission', array('query_string' => 'sort=name&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th>
  <?php if ('description' == $sort[0]): ?>
    <?php echo link_to(__('Тайлбар <i class="icon-chevron-'.(($sort[1] == 'asc') ? 'down' : 'up').'"></i>', array(), 'messages'), '@sf_guard_permission', array('query_string' => 'sort=description&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Тайлбар', array(), 'messages'), '@sf_guard_permission', array('query_string' => 'sort=description&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th>
  <?php if ('created_at' == $sort[0]): ?>
    <?php echo link_to(__('Үүссэн огноо <i class="icon-chevron-'.(($sort[1] == 'asc') ? 'down' : 'up').'"></i>', array(), 'messages'), '@sf_guard_permission', array('query_string' => 'sort=created_at&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Үүссэн огноо', array(), 'messages'), '@sf_guard_permission', array('query_string' => 'sort=created_at&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th>
  <?php if ('updated_at' == $sort[0]): ?>
    <?php echo link_to(__('Засварласан огноо <i class="icon-chevron-'.(($sort[1] == 'asc') ? 'down' : 'up').'"></i>', array(), 'messages'), '@sf_guard_permission', array('query_string' => 'sort=updated_at&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Засварласан огноо', array(), 'messages'), '@sf_guard_permission', array('query_string' => 'sort=updated_at&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>