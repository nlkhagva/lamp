<?php 
$value = $product->getValue($option->getId()); 
$_POST['shop_product_option_value['.$option->getId().'][]'] = '';
?>

<textarea name="shop_product_option_value[<?php echo $option->getId() ?>][<?php echo ($value)?$value->getId():''; ?>]" id=""><?php echo ($value)?$value->getName():$_POST['shop_product_option_value['.$option->getId().'][]']; ?></textarea>