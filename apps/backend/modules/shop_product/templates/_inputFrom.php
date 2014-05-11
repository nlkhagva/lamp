<?php 
    $value = $product->getValue($option->getId()); 
    $_REQUEST['shop_product_option_value['.$option->getId().'][]'] = (!isset($_REQUEST['shop_product_option_value['.$option->getId().'][]']))?'':$_REQUEST['shop_product_option_value['.$option->getId().'][]'];
?>

<input type="text" name="shop_product_option_value[<?php echo $option->getId() ?>][<?php echo ($value)?$value->getId():''; ?>]" value="<?php echo ($value)?$value->getName():$_REQUEST['shop_product_option_value['.$option->getId().'][]']; ?>">

