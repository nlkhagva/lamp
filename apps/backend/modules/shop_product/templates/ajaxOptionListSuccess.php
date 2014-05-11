<?php if($category): ?>
    <?php if($category->getOptions()->count()): ?>
        <?php foreach($category->getOptions() as $option): ?>
            <tr>
                <td><?php echo $option ?></td>
                <td colspan="3">
                    <?php 
                    switch($option->getType()){
                        case 'selectbox':{
                            include_partial('product/selectboxForm', array('option' => $option, 'fieldname'=>$fieldname ));
                        }break;
                        case 'checkbox':{
                            include_partial('product/checkboxFrom', array('option' => $option, 'fieldname'=>$fieldname ));
                        }break;
                        case 'textarea':{
                            include_partial('product/textareaFrom', array('option' => $option, 'fieldname'=>$fieldname ));
                        }break;
                        case 'input':{
                            include_partial('product/inputFrom', array('option' => $option, 'fieldname'=>$fieldname ));
                        }break;
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
     <?php else: ?>
            <tr class="warning">
                <td colspan="4">Emtpy</td>
            </tr>
     <?php endif; ?>
<?php else: ?>
        <tr class="warning">
            <td colspan="4">Emtpy</td>
        </tr>
<?php endif; ?>