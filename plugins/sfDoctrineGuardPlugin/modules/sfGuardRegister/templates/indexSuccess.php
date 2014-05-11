<?php use_helper('I18N') ?>

<div class="container_33">
    <div class="grid_25">
        <div class="bordered content">
            <h3 class="title">
                <?php echo __('Register', null, 'sf_guard') ?>
            </h3>
            
            <div class="content-show padded10">
                <?php echo get_partial('sfGuardRegister/form', array('form' => $form)) ?>
                <br class="clear"/>
            </div>
        </div>
    </div>
    <div class="grid_8">
        <?php include_component('partial','latestEvents'); ?>
        
        <div class="box marg-bottom"><?php include_partial('partial/weather'); ?></div>
        <div class="box video marg-bottom"><?php include_component('partial', 'video'); ?></div>
        <div class="box"><?php include_partial('partial/webLink') ?></div>
    </div>
    <br class="clear"/>
</div>