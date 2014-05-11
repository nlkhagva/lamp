<?php if($sf_user->hasFlash('success')): ?>
<div class="success">
	<?php echo $sf_user->getFlash('success'); ?>
</div>
<?php endif; ?>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('poll/index') ?>">Back to list |</a> 
          <?php if (!$form->getObject()->isNew()): ?>
            <?php echo image_tag('/sfDoctrinePlugin/images/new.png', array('align' => 'absmiddle', 'border' => 0)).link_to('Хариулт нэмэх |','@addAnswer?pollId='.$form['id']->getValue()); ?> 
            &nbsp;<?php echo link_to(image_tag('/sfDoctrinePlugin/images/delete.png', array('align' => 'absmiddle', 'border' => 0)).' Устгах', 'poll/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?> 
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
        <?php echo $form; ?>
    </tbody>
  </table>
</form>
    