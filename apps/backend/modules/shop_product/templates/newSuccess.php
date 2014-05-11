<ul class="breadcrumb">
    <li><a href="<?php echo url_for('@homepage') ?>" class="glyphicons home"><i></i> Нүүр</a></li>
    <li class="divider"></li>
    <li><a href="<?php echo url_for('shop_product/index'); ?>">Бараа бүтээгдэхүүн</a></li>
    <li class="divider"></li>
    <li>Барааны мэдээлэл оруулах</li>
</ul>
<div class="separator bottom"></div>

<div class="heading-buttons">
    <h3>Шинэ бараа бүтээгдэхүүн бүртгэх</h3>
<!--    <div class="buttons pull-right">
        <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Save</a>
    </div>-->
</div>
<div class="separator bottom"></div>

<div class="innerLR">
    <div class="widget widget-tabs">
        <div class="widget-body" style="padding: 10px;">
            <?php include_partial('step', array('step' => 2, 'form'=>$form)); ?>

            <?php include_partial('form', array('form' => $form, 'category'=> $category)) ?>
        </div>
    </div>
</div>		

