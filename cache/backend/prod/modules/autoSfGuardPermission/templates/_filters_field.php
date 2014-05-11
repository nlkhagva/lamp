<?php if ($field->isPartial()): ?>
  <?php include_partial('sfGuardPermission/'.$name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
  <?php include_component('sfGuardPermission', $name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
  <div class="control-group <?php echo $class ?>">
    <?php echo $form[$name]->renderLabel($label, array('class' => 'control-label')) ?>
    <div class="controls">
      <?php echo $form[$name]->renderError() ?>

      <?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>

      <?php if ($help || $help = $form[$name]->renderHelp()): ?>
        <p class="help-block"><?php echo __($help, array(), 'messages') ?></p>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>
