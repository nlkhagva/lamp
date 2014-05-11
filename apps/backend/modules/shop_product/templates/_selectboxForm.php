<select name="<?php echo $fieldname; ?>" id="">
    <?php foreach($option->getShopOptionValue() as $value): ?>
        <option value="<?php echo $value->getId() ?>" <?php echo ($product->checkValue($value->getId()))?'selected':''; ?>><?php echo $value ?></option>
    <?php endforeach; ?>
</select>
