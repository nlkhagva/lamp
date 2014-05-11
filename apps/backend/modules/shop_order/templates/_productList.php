<!--    <p style="padding: 5px 15px;"><?php echo 'Захиалгын дугаар: #' . $order->getInvoiceNumber() . ' <strong>Нийт төлбөр: ' . $order->getTotalAmount() . '</strong> &nbsp; &nbsp;<strong>Үлдэгдэл төлбөр: ' . $order->getRemainAmount() . '</strong>'; ?></p>-->
<div class="widget-head">
    <h6 class="heading glyphicons list"><i></i>Бараануудын жагсаалт</h6>
</div>

<div class="widget-body">
    <table class="table">
        <thead>
        <tr>
            <th>№</th>
            <th><?php echo __('Барааны мэдээлэл'); ?></th>
            <th style="width: 100px;"><?php echo __('Барааны код'); ?></th>
            <th style="width: 80px; "><?php echo __('Тоо ширхэг'); ?></th>
            <th style="width: 100px;"><?php echo __('Нэгжийн үнэ'); ?></th>
            <th><?php echo __('Нийт дүн'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($order->getOrderItems() as $key => $item): ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td>
                    <span class="print-show" style="display: none;"><?php echo $item->getShopProduct() ?></span>
                    <?php include_partial('itemInfo', array('item' => $item)); ?>
                </td>
                <td> <span style="color: #df382c"><?php echo $item->getShopProduct()->getCode(); ?></span></td>
                <td style="text-align: center;">
                    <?php echo $item->getQuantity(); ?>
                </td>
                <td> <span style="color: #df382c"><?php echo number_format($item->getUnitPrice()); ?>₮</span></td>
                <td><b><?php echo number_format($item->getTotalPrice()) ; ?>₮</b></td>
            </tr>
        <?php endforeach; ?>
        <tr class="niit-dun">
            <td colspan="5" style="text-align: right">
                <b>Нийт дүн:</b> <br>
                <b>Хүргэлт:</b> <br>
                <b>Нийт төлөх дүн:</b>
            </td>
            <td>
                <b class="basket-total-price"><?php echo number_format($order->getProductTotalAmount()); ?>₮</b> <br>
                <b class="basket-total-price"><?php echo number_format($order->getShippingFee()); ?>₮</b>   <br>
                <b class="basket-total-price"><?php echo number_format($order->getTotalAmount()); ?>₮</b>
            </td>
        </tr>
        </tbody>
    </table>
</div>
