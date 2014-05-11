<div class="widget-body list products">
    <div class="img">
        <a href="<?php echo url_for('shop_product/edit?id=' . $product->getId()); ?>">
            <img src="/uploads/products/50/<?php echo $product->getCoverPhoto()->getImgSrc() ?>" alt="<?php echo $product; ?>" style="width: 46px; height: 42px; margin: 1px;"/>
        </a>
    </div>
    <div class="title" style="color: #000 !important; display: block !important;  ">
        <a href="<?php echo url_for('shop_product/edit?id=' . $product->getId()); ?>" style="color: #000 !important; display: block !important;  ">
            <?php echo $product; ?>
        </a>
<!--            <br /> <strong>₮--><?php //echo number_format($product->getPrice()) ?>

    </div>
<!--        <li>
            <span class="img">photo</span>
            <span class="title">Product name<br><strong>€2,900</strong></span>
            <span class="count"></span>
        </li>-->
</div>