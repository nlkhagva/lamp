<div class="basket-item-info-container">
    <div class="item-image">
        <a href="<?php echo url_for('product/show?id='.$product->getId()); ?>"><img src="/uploads/products/50/<?php echo $product->getCoverPhoto()->getImgSrc() ?>" alt="<?php echo $product; ?>" /></a>
    </div>
    <div class="item-info">
        <h4><a href="<?php echo url_for('product/show?id='.$product->getId()); ?>"><?php echo $product; ?></a></h4>
        <dl class="dl-horizontal" style="float: left;">
            <dt><?php echo __('Нэгжийн үнэ'); ?>:</dt>
            <dd>₮ <?php echo $product->getPrice(); ?></dd>
        </dl>
        
    </div>
</div>