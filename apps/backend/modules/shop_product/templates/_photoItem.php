<li class="picture-item span2">
    <div class="thumbnail">
        <img src="/uploads/products/200/<?php echo $photo->getImgSrc() ?>" alt=""/>
        <div class="caption">
            <a href="javascript:void(0)" onclick="ajaxLink(this, 'activation');" rel="<?php echo url_for('shop_product/imageChangeActive?id='.$photo->getId()); ?>" class="btn btn-mini <?php echo ($photo->getIsActive() == 1)?'btn-primary':''; ?> ">
                <?php echo ($photo->getIsActive() == 1)?'Active':'No active'; ?>
            </a>
            <a href="javascript:void(0)" onclick="ajaxLink(this, 'coverphoto');" rel="<?php echo url_for('shop_product/choiceCoverPhoto?id='.$photo->getId()); ?>" class="btn btn-mini <?php echo ($photo->getId() == $product->getCoverPhotoId())?'btn-primary cover-photo':''; ?> ">
                <span class="icon-star  <?php echo ($photo->getId() == $product->getCoverPhotoId())?'icon-white':''; ?> "></span>
            </a>
        </div>

        <a href="javascript:void(0)" onclick="ajaxLink(this, 'remove');" rel="<?php echo url_for('shop_product/removePhoto?id='.$photo->getId()); ?>" class="right btn btn-mini btn-danger remove-button">
            <span class="icon-remove icon-white"></span>
        </a>
    </div>
</li>
