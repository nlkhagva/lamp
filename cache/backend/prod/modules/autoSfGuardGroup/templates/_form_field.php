<?php if ($field->isPartial()): ?>
  <?php include_partial('sfGuardGroup/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
  <?php include_component('sfGuardGroup', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
  <div class="control-group <?php echo $class ?><?php $form[$name]->hasError() and print ' error' ?>">
      <?php echo $form[$name]->renderLabel($label, array('class' => 'control-label')) ?>

      <div class="controls <?php echo $class ?>">
        <?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
        <span class="help-inline"><?php echo $form[$name]->renderError() ?></span>
        <?php if ($help): ?>
          <p class="help-block"><?php echo __($help, array(), 'messages') ?></p>
        <?php elseif ($help = $form[$name]->renderHelp()): ?>
          <p class="help-block"><?php echo $help ?></p>
        <?php endif; ?>
      </div>

  </div>
<?php endif; ?>
