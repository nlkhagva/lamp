<div class="form-actions">
<?php if ($form->isNew()): ?>
  
  
  
  
<?php echo $helper->linkToDelete($form->getObject(), array(  'label' => 'Устгах',  'confirm' => 'Are you sure?',  'params' =>   array(  ),  'class_suffix' => 'delete',)) ?><div class="btn-group">
<?php echo $helper->linkToList(array(  'label' => 'Жагсаалт руу буцах',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?><?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'Хадгалах',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?><?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'label' => 'Хадгалах, нэмэх',  'params' =>   array(  ),  'class_suffix' => 'save_and_add',)) ?></div>
<?php else: ?>
  
  
  
  
<?php echo $helper->linkToDelete($form->getObject(), array(  'label' => 'Устгах',  'confirm' => 'Are you sure?',  'params' =>   array(  ),  'class_suffix' => 'delete',)) ?><div class="btn-group">
<?php echo $helper->linkToList(array(  'label' => 'Жагсаалт руу буцах',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?><?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'Хадгалах',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?><?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'label' => 'Хадгалах, нэмэх',  'params' =>   array(  ),  'class_suffix' => 'save_and_add',)) ?></div>
<?php endif; ?>
</div>
