<ul class="inline" style="margin: 0px; padding: 0px;">
    <?php $cat_count = count($section->getCategories()); ?>
    <?php if($cat_count > 0): ?>
        <?php foreach($section->getCategories() as $category): ?>
            <?php $id = $category->getId(); ?>
            <li>
                <label class="checkbox">
                    <input name="content[categories_list][]" type="checkbox" value="<?php echo $id ?>" id="content_categories_list_<?php echo $id ?>" <?php echo $cat_ids[$id] ?> >
                    <?php echo $category->getName() ?>
                </label>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
            <span>Категори байхгүй байна</span> 
    <?php endif; ?>
</ul>