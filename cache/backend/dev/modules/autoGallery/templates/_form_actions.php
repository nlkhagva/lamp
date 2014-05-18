<div class="form-actions">
<?php if ($form->isNew()): ?>
  
  
  
  
<?php echo $helper->linkToDelete($form->getObject(), array(  'label' => 'Устгах',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',)) ?><div class="btn-group">
<?php echo $helper->linkToList(array(  'label' => 'Жагсаалт руу буцах',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?><?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'Хадгалах',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?><?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'label' => 'Хадгалах, нэмэх',  'params' =>   array(  ),  'class_suffix' => 'save_and_add',)) ?></div>
<?php else: ?>
  
  
  
<?php if (method_exists($helper, 'linkTo_purge')): ?>
  
<?php else: ?>
  
<?php endif; ?>
<?php echo $helper->linkToDelete($form->getObject(), array(  'label' => 'Устгах',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',)) ?><div class="btn-group">
<?php echo $helper->linkToList(array(  'label' => 'Жагсаалт руу буцах',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?><?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'Хадгалах',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?><?php echo $helper->linkTo_purge($form->getObject(), array(  'name' => 'backend.edit.purge',  'action' => 'purge',  'params' =>   array(  ),  'class_suffix' => 'purge',  'label' => 'Purge',)) ?><?php echo link_to(__('Purge', array(), 'messages'), 'gallery/purge?id='.$gallery->getId(), array()) ?></div>
<?php endif; ?>
</div>
