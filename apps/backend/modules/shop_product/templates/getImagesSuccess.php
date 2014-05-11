<?php foreach($product->getPhotos() as $key => $photo): ?>
    <?php include_partial('shop_product/photoItem', array('photo' => $photo, 'product' => $product)); ?>
    <?php if( $key%3 == 2 ): ?><br class="clear" /><?php endif; ?>
<?php endforeach; ?>
