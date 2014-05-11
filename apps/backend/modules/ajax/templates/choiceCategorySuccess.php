<ul class="checkbox_list">
    <?php $cat_count = count($section->getCategories()); ?>
    <?php if($cat_count > 0): ?>
        <?php foreach($section->getCategories() as $category): ?>
            <?php $id = $category->getId(); ?>
            <li>
                <input name="content[categories_list][]" type="checkbox" value="<?php echo $id ?>" id="content_categories_list_<?php echo $id ?>" <?php echo $cat_ids[$id] ?> >&nbsp;
                <label for="content_categories_list_<?php echo $id ?>">
                    <?php echo $category->getName() ?>
                </label>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
            <span>Категори байхгүй байна</span> 
    <?php endif; ?>
</ul>