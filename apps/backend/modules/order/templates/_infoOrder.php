<?php if($form->getObject()): ?>
    <?php $_object = $form->getObject(); ?>
    <p style="padding: 5px 15px;"><?php echo 'Захиалгын дугаар: #'.$_object->getInvoiceNumber().' <strong>Нийт төлбөр: '.$_object->getTotalAmount().'</strong> &nbsp; &nbsp;<strong>Үлдэгдэл төлбөр: '.$_object->getRemainAmount().'</strong>'; ?></p>
    
    <table class="table">
        <thead>
            <tr>
                <th>Бараа</th>
                <th>Тоо ширхэг</th>
                <th>Үнэ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($_object->getOrderItems() as $item): ?>
                <tr>
                    <td>
                        <?php include_partial('order/productInfo', array('product' => $item->getShopProduct())); ?>
                    </td>
                    <td><?php echo $item->getQuantity(); ?></td>
                    <td><?php echo $item->getTotalPrice() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
