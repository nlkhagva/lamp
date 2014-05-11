 <div id="sf_admin_container" class="">
    <?php if($id): ?>
            <?php $title = 'Санал асуулга засах'?>
    <?php else: ?>
            <?php $title = 'Санал асуулга нэмэх'?>
    <?php endif; ?>

    <h1><?php echo $title ?></h1>     
    <?php if ($id): ?>
            <a href="<?php echo url_for('@poll_new')?>">Шинэ санал асуулга нэмэх</a>	
    <?php else: ?>
            Шинэ санал асуулга нэмэх
    <?php endif; ?>
    | <a href="<?php echo url_for('@poll_list')?>">Жагсаалт</a><br/><br/>
    
    
    <div id="sf_admin_content">
        <?php // include_partial('package/stepbystep', array('step' => 1, 'package' => $form->getObject())); ?>

        <div class="sf_admin_form">
            <?php include_partial('poll/form', array('form' => $form, 'id' => $id)); ?>
        </div>
    </div>
</div>
