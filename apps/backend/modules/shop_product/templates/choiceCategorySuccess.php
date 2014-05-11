<ul class="breadcrumb">
    <li><a href="<?php echo url_for('@homepage') ?>" class="glyphicons home"><i></i> Нүүр</a></li>
    <li class="divider"></li>
    <li><a href="<?php echo url_for('shop_product/index'); ?>">Бараа бүтээгдэхүүн</a></li>
    <li class="divider"></li>
    <li>Барааны ангилал сонгох</li>
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
            <?php include_partial('step', array('step' => 1, 'form' => false)); ?>

            <form action="<?php echo url_for('shop_product/new'); ?>">
                <select name="category_id" id="" style="margin-bottom: 0px;">
                    <?php foreach($toplevel_categories as $category): ?>
                       <?php req($category); ?>
                    <?php endforeach; ?>
                </select>
                <input type="submit" class="btn" value="next" />
            </form>
        </div>
    </div>
</div>		




<?php 
    function req($category, $level = 0)
    {
        $prefix = '';
        for($i = 0; $i < $level; $i++)
            $prefix .= '--';
        
        echo '<option value="'.$category->getId().'">'.$prefix.$category.'</option>';
        if($category->getChilds()->count()){
            foreach($category->getChilds() as $child){
                req($child, $level+1);
            }
        }
    }
?>
