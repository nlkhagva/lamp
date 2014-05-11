<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('shop_product/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '?category_id='.$category->getId())) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table">
    <tfoot>
      <tr>
        <td colspan="4">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a class="btn btn-link" href="<?php echo url_for('shop_product/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'shop_product/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger')) ?>
          <?php endif; ?>
          <input type="submit" class="btn" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
        <tr>
            <td colspan="1">Category</td>
            <td colspan="3">
                <?php echo $category->renderBreadcrumb($url = 'javascript:void()', $has_id = false); ?>
                <?php // if($form->isNew()): ?>
<!--                    <a class="btn btn-inverse" style="margin-bottom: 10px;" href="<?php // echo url_for('shop_product/choiceCategory'); ?>">Change category</a>-->
                <?php // endif; ?>
            </td>
        </tr>
      <tr>
        <th colspan="1"><?php echo $form['mn']->renderLabel() ?></th>
        <td colspan="3">
          <?php echo $form['mn']->renderError() ?>
          <?php echo $form['mn'] ?>
        </td>
      </tr>
      <tr>
        <th colspan="1"><?php echo $form['en']->renderLabel() ?></th>
        <td colspan="3">
          <?php echo $form['en']->renderError() ?>
          <?php echo $form['en'] ?>
        </td>
      </tr>
<!--      <tr>
        <th colspan="1" width="250"><?php // echo $form['content']->renderLabel() ?></th>
        <td colspan="3">
          <?php // echo $form['content']->renderError() ?>
          <?php // echo $form['content'] ?>
        </td>
      </tr>-->
      <tr>
        <th><?php echo $form['price']->renderLabel() ?></th>
        <td>
          <?php echo $form['price']->renderError() ?>
          <?php echo $form['price']; ?>
        </td>
        <th><?php echo $form['price_type']->renderLabel() ?></th>
        <td>
          <?php echo $form['price_type']->renderError() ?>
          <?php echo $form['price_type'] ?>
        </td>
      </tr>
      <tr>
          <th><?php echo $form['code']->renderLabel() ?></th>
          <td colspan="">
              <?php echo $form['code']->renderError() ?>
              <?php echo $form['code'] ?>
          </td>
      </tr>
      <tr>
        <th><?php echo $form['is_active']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_active']->renderError() ?>
          <?php echo $form['is_active'] ?>
        </td>
        <th><?php echo $form['is_featured']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_featured']->renderError() ?>
          <?php echo $form['is_featured'] ?>
        </td>
      </tr>
      <tr class="">
          <th colspan="4">&nbsp;</th>
      </tr>
      
        <?php if($category): ?>
            <?php include_partial('shop_product/options', array('category' => $category, 'product' => $form->getObject())); ?>
        <?php endif; ?>      
    </tbody>
  </table>
</form>
