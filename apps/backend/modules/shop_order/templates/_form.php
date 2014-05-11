<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('shop_order/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('shop_order/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'shop_order/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
          <th><?php echo $form['status_id']->renderLabel() ?></th>
          <td>
              <?php echo $form['status_id']->renderError() ?>
              <?php echo $form['status_id'] ?>
          </td>
      </tr>
      <tr>
          <th><?php echo $form['shipping_fee']->renderLabel() ?></th>
          <td>
              <?php echo $form['shipping_fee']->renderError() ?>
              <?php echo $form['shipping_fee'] ?>
          </td>
      </tr>
    </tbody>
  </table>
</form>
