<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@content', array('class' => 'form-horizontal')) ?>
  <?php echo $form->renderHiddenFields(false) ?>

  <?php if ($form->hasGlobalErrors()): ?>
    <?php echo $form->renderGlobalErrors() ?>
  <?php endif; ?>

  <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
    <?php include_partial('content/form_fieldset', array('content' => $content, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
  <?php endforeach; ?>
  
  <?php include_partial('content/form_actions', array('content' => $content, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</form>
