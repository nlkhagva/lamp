<?php $order = $form->getObject(); ?>

<div class="lkhagva-header">
    <ul class="breadcrumb">
        <li><a href="<?php echo url_for('@homepage') ?>" class="glyphicons home"><i></i> Нүүр</a></li>
        <li class="divider"></li>
        <li><a href="<?php echo url_for('shop_order/index'); ?>">Захиалга</a></li>
        <li class="divider"></li>
        <li>Захиалгын мэдээлэл</li>
    </ul>
    <div class="separator bottom"></div>

    <div class="heading-buttons">
        <h3>Захиалга: <?php echo $order->getInvoiceNumber(); ?> | <?php echo date('Y-m-d H:i:s', strtotime($order->getCreatedAt())); ?></h3>


    </div>
    <div class="separator bottom"></div>

    <div class="innerLR">

        <?php include_partial('public/flash'); ?>

        <div class="row-fluid">
            <div class="span4">
                <div class="widget">
                    <div class="widget-head"><h5 class="heading glyphicons edit"><i></i>Захиалгын төлөв өөрчлөх</h5></div>
                    <div class="widget-body" style="padding: 10px;">
                        <?php include_partial('form', array('form' => $form)) ?>
                    </div>
                </div>
            </div>

            <div class="span4">
                <div class="widget">
                    <div class="widget-head">
                        <h4 class="heading glyphicons shopping_bag"><i></i>Захиалгын мэдээлэл</h4>
                        <a data-toggle="modal" class="details pull-right" href="<?php echo url_for('shop_order/ajaxTransaction?id='.$order->id); ?>">Төлбөр төлөлт</a>
                    </div>
                    <div class="widget-body list">
                        <a href="<?php echo url_for('shop_order/viewTransactionAjax?id='.$order->id); ?>" data-toggle="modal"  class="btn-link" style="float: right; margin-right: 15px; font-size: 11px; color: #333;">Төлбөрийн түүх харах</a>
                        <ul>
                            <li>
                                <span>Нийт дүн</span>
                                <span class="count"><?php echo number_format($order->product_total_amount); ?>₮</span>
                            </li>
                            <li>
                                <span>Хүргэлтийн төлбөр</span>
                                <span class="count"><?php echo number_format($order->shipping_fee); ?>₮</span>
                            </li>
                            <li>
                                <span>Нийт төлөх дүн</span>
                                <span class="count"><?php echo number_format($order->getTotalAmount()) ?>₮</span>
                            </li>
                            <li>
                                <span>Үлдэгдэл төлбөр</span>
                                <span class="count"><?php echo number_format($order->getRemainAmount()) ?>₮</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="span4">
                <div class="widget">
                    <div class="widget-head"><h5 class="heading glyphicons user"><i></i>Үйлчлүүлэгчийн мэдээлэл</h5></div>
                    <?php $user =  $order->getCustomer(); ?>
                    <div class="widget-body list">
                        <ul>
                            <li>
                                <span>Нэр</span>
                                <span class="count" style="font-size: 13px;"><?php echo $user->getLastName().' '.$user->getFirstName(); ?></span>
                            </li>
                            <li>
                                <span>Майл хаяг</span>
                                <span class="count" style="font-size: 13px;"><a href="<?php echo url_for('shop_order/search?q='.$user->getEmailAddress()); ?>"><?php echo $user->getEmailAddress(); ?></a></span>
                            </li>
                            <li>
                                <span>Утас</span>
                                <span class="count" style="font-size: 13px;"><?php echo $user->getPhone().', '.$user->getPhone2() ?></span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<br class="clear" />

<div class="innerLR">
    <div class="row-fluid">
        <div class="widget ">
            <div class="print-information-header" style="display: none; position: relative">
                <div class="row1">
                    <p style="text-align: center; font-size: 13px; margin: 0px 0px 40px; font-weight: bold">ЗАХИАЛГЫН БАРИМТ №<?php echo $order->invoice_number ?> </p >
                    <p style="text-align: right; position: absolute; top: 0px; right: 0px; font-size: 8px;">
                        Санхүү, эдийн засгийн сайд, Үндэсний статистикийн<br>
                        газрын даргын 2002 оны 171/111 тоот тушаалын<br>
                        хавсралт
                    </p>
                    <p style="position: absolute; left: 0px; top: 0px; font-size: 8px;">НХМаягт БМ-3</p>
                </div>
                <div class="row2" style="margin-bottom: 10px;">
                    <span style="font-weight: bold; float: right; font-size: 12px"><?php echo date('Y он m сар d ны өдөр'); ?> </span>
                    <div class="clear"></div>
                </div>
                <div class="row3">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 20%">Байгууллагын нэр:</td>
                            <td style="width: 30%">Бид-Органик ХХК</td>
                            <td style="width: 20%">Худалдан авагч:</td>
                            <td style="width: 30%"><?php echo $user->getLastName().' '.$user->getFirstName() ?></td>
                        </tr>
                        <tr>
                            <td>Регистрийн №:</td>
                            <td>5697697 </td>
                            <td>Регистрийн №:</td>
                            <td>________________</td>
                        </tr>
                    </table>
                </div>

                <div class="clear"></div>
            </div>


            <?php include_partial('productList', array('order' => $order)); ?>


            <div class="print-information-footer" style="display: none;">
                <table style="margin-left: 150px;">
                    <tr>
                        <td style="width: 300px">Дарга</td>
                        <td>/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/</td>
                    </tr>
                    <tr>
                        <td>Нягтлан бодогч</td>
                        <td>/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/</td>
                    </tr>
                    <tr>
                        <td>Хүлээн авагч</td>
                        <td>/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/</td>
                    </tr>
                    <tr>
                        <td>Хүлээлгэн өгсөн</td>
                        <td>/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/</td>
                    </tr>
                </table>

                <div style="margin-top: 50px;">
                    <p><label style="font-weight: bold;" for="">Хаяг:</label> <?php echo $user->address  ?> </p>
                    <p><label style="font-weight: bold;" for="">Утас:</label> <?php echo $user->phone.' '.$user->phone2  ?> </p>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="innerLR lkhagva-header" >
    <div class="row-fluid">
        <div class="widget span7" >
            <div class="widget-head"><h5 class="heading glyphicons user">Харилцсан түүх</h5></div>
            <ul style="list-style: none; max-height: 300px; overflow: auto;" id="message-container">
                <?php foreach($order->getShopOrderMessage() as $message): ?>
                    <?php include_partial('shop_order/messageItem', array('message' => $message)) ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="widget span5">
            <div class="widget-head"><h5 class="heading glyphicons user">Тэмдэглэл үлдээх</h5></div>
            <?php include_partial('messageForm', array('order' => $order, 'form' => $message_form)) ?>
        </div>
    </div>
</div>


<style type="text/css">
    body .modal {
        /* new custom width */
        width: 800px;
        /* must be half of the width, minus scrollbar on the left (30px) */
        margin-left: -400px;
    }
</style>

<script type="text/javascript">
    $(function() {

        /*
         * Initialise print preview plugin
         */
        // Add link for print preview and intialise
        $('.heading-buttons').prepend('<a class="print-preview btn btn-mini" style="float: right" href="javascript:window.print()"><i class="icon-print" style="margin-top: 1px; margin-right: 3px;"></i><?php echo __('Хэвлэж авах'); ?></a>');

    });
</script>
