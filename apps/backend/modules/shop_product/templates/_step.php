<div class="btn-group" style="margin: 20px 0px;">
  <?php
  $step1_title = 'Ангилал сонгох';
  $step2_title = 'Барааны мэдээлэл';
  $step3_title = 'Зураг оруулах';
  ?>


  <?php if($step == 1 && !$form): ?>  
    <a href="javascript:void()" class="btn btn-primary"><?php echo $step1_title ?></a>
    <a href="javascript:void()" class="btn disabled"><?php echo $step2_title ?></a>
    <a href="javascript:void()" class="btn disabled"><?php echo $step3_title ?></a>
  <?php elseif($step == 2 && $form->isNew()): ?>
    <a href="<?php echo url_for('shop_product/choiceCategory'); ?>" class="btn "><?php echo $step1_title ?></a>
    <a href="javascript:void()" class="btn btn-primary"><?php echo $step2_title ?></a>
    <a href="javascript:void()" class="btn disabled"><?php echo $step3_title ?></a>
  <?php elseif($step == 2 && !$form->isNew()): ?>
    <a href="javascript:void()" class="btn disabled"><?php echo $step1_title ?></a>
    <a href="javascript:void()" class="btn btn-primary"><?php echo $step2_title ?></a>
    <a href="<?php echo url_for('shop_product/addPictures?id='.$form->getObject()->getId()); ?>" class="btn "><?php echo $step3_title ?></a>
  <?php elseif($step == 3): ?>
    <a href="javascript:void()" class="btn disabled"><?php echo $step1_title ?></a>
    <a href="<?php echo url_for('shop_product/edit?id='.$form->getId()); ?>" class="btn"><?php echo $step2_title ?></a> <!-- form is product object -->
    <a href="javascript:void()" class="btn btn-primary"><?php echo $step3_title ?></a>
  <?php endif; ?>
</div>
