<?php $fieldname = 'shop_product[option_values_list][]'; ?>
<?php if($category->getOptions()->count()): ?>
    <?php foreach($category->getOptions() as $option): ?>
        <tr>
            <td><?php echo $option ?></td>
            <td colspan="3">
                <?php 
                switch($option->getType()){
                    case 'selectbox':{
                        include_partial('shop_product/selectboxForm', array('option' => $option, 'fieldname' => $fieldname, 'product' => $product ));
                    }break;
                    case 'checkbox':{
                        include_partial('shop_product/checkboxFrom', array('option' => $option, 'fieldname' => $fieldname, 'product' => $product ));
                    }break;
                    case 'textarea':{
                        include_partial('shop_product/textareaFrom', array('option' => $option, 'fieldname' => $fieldname, 'product' => $product ));
                    }break;
                    case 'input':{
                        include_partial('shop_product/inputFrom', array('option' => $option, 'fieldname' => $fieldname, 'product' => $product ));
                    }break;
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>
