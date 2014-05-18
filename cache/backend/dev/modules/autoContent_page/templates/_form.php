<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@page_content_page', array('class' => 'form-horizontal')) ?>
  <?php echo $form->renderHiddenFields(false) ?>

  <?php if ($form->hasGlobalErrors()): ?>
    <?php echo $form->renderGlobalErrors() ?>
  <?php endif; ?>

  <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
    <?php include_partial('content_page/form_fieldset', array('page' => $page, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
  <?php endforeach; ?>
  
  <?php include_partial('content_page/form_actions', array('page' => $page, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</form>
