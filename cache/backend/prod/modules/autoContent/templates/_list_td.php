<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $content->getTitle() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_published">
  <?php echo get_partial('content/list_field_boolean', array('value' => $content->getPublished())) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_section">
  <?php echo $content->getSection() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_categories">
  <?php echo get_partial('content/categories', array('type' => 'list', 'content' => $content)) ?>
</td>
