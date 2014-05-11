<?php slot('sf_admin.current_header') ?>
<th>
  <?php if ('username' == $sort[0]): ?>
    <?php echo link_to(__('Хэрэглэгчийн нэр <i class="icon-chevron-'.(($sort[1] == 'asc') ? 'down' : 'up').'"></i>', array(), 'messages'), '@sf_guard_user', array('query_string' => 'sort=username&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Хэрэглэгчийн нэр', array(), 'messages'), '@sf_guard_user', array('query_string' => 'sort=username&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th>
  <?php if ('last_login' == $sort[0]): ?>
    <?php echo link_to(__('Хамгийн сүүлд нэвтэрсэн <i class="icon-chevron-'.(($sort[1] == 'asc') ? 'down' : 'up').'"></i>', array(), 'messages'), '@sf_guard_user', array('query_string' => 'sort=last_login&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Хамгийн сүүлд нэвтэрсэн', array(), 'messages'), '@sf_guard_user', array('query_string' => 'sort=last_login&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>