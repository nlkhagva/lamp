<?php foreach($option->getShopOptionValue() as $value): ?>
    <label class="checkbox inline">
        <input type="checkbox" id="" name="<?php echo $fieldname ?>" <?php echo ($product->checkValue($value->getId()))?'checked':''; ?> value="<?php echo $value->getId(); ?>"> <?php echo $value ?>
    </label>
<?php endforeach; ?>
