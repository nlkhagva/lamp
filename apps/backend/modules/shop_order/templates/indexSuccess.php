<ul class="breadcrumb">
    <li><a href="<?php echo url_for('@homepage'); ?>" class="glyphicons home"><i></i> Нүүр</a></li>
    <li class="divider"></li>
    <li><a href="<?php echo url_for('shop_order/index'); ?>">Захиалга</a></li>
</ul>

<?php if(isset($order_status)): ?>
<div class="menubar" style="margin: -1px 0 5px;">
    <ul>
        <li>Захиалгын төлвүүд:</li>
        <li><a href="<?php echo url_for($status_url.'0'); ?>">Бүгд</a></li>
        <?php foreach($order_status as  $key => $status): ?>
            <li class="divider"></li>
            <li><a href="<?php echo url_for($status_url.$status->id); ?>"><?php echo $status ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="separator bottom"></div>
<?php endif; ?>

<div class="heading-buttons">
    <h3 class="lkhagva-header">Захиалга</h3>
    <!--    <div class="buttons pull-right">
            <a href="" class="btn btn-default btn-icon glyphicons inbox"><i></i> Manage categories</a>
            <a href="" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Add product</a>
        </div>-->

    <!--------------------------------------------
    ----------------------------------------------
    ------------------- printer ------------------
    --------------------------------------------->
    <div class="print-information-header" style="display: none; position: relative">
        <div class="row2" style="margin-bottom: 10px;">
            <span style="float: left; font-weight: bold; font-size: 18px; margin-left: 20px;"><?php echo $title; ?></span>
            <span style="font-weight: bold; float: right; font-size: 12px"><?php echo date('Y он m сар d ны өдөр'); ?> </span>
            <div class="clear"></div>
        </div>

        <div class="clear"></div>
    </div>
    <!--- printer end  --->

</div>
<div class="separator bottom"></div>

<div class="innerLR">

    <div class="widget">
        <div class="widget-head" id="printer-lkhagva">
            <h4 class="heading glyphicons list"><i></i> <?php echo $title; ?></h4>
        </div>
        <div class="widget-body">
            <div class="form-inline separator bottom small">
                Нийт захиалгын тоо: <?php echo $total_order; ?>
                
<!--                <a href="" class="btn ">Шинэ захиалга</a>-->
<!--                <span class="pull-right">
                    <label class="strong">Sort by:</label>
                    <select class="selectpicker" data-style="btn-default btn-small">
                        <option>Option</option>
                        <option>Option</option>
                        <option>Option</option>
                    </select>
                </span>-->
            </div>

            <div class="filter-bar">
                <form action="<?php echo url_for('shop_order/search'); ?>">
                    <div id="search" class="input-append">
                        <input type="text" name="q" id="" <?php echo (isset($q)) ? 'value="' . $q . '"' : ''; ?> placeholder="Хайх ..." style="height: 21px;"/>
                        <button class="btn" type="button"><i class="icon-search"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>

            <table class="table table-bordered table-condensed table-primary table-vertical-center checkboxs js-table-sortable" id="order-index-table">
                <thead>
                    <tr>
                        <th style="width: 1%;" class="center">№</th>
                        <th>Захиалгын дугаар</th>
                        <th class="center">Төлөв</th>
                        <th class="center" style="width: 100px;">Барааны тоо</th>
                        <th class="center">Нийт үнэ</th>
                        <th class="center">Үлдэгдэл</th>
                        <th class="center">Захиалагч</th>
                        <th class="center">Захиалсан огноо</th>
                        <th class="center" style="width: 60px;">Үйлдэл</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_total_price = 0; $_total_remain = 0; ?>
                    <?php foreach ($pager as $order): ?>
                        <tr>
                            <?php $_total_price += $order['total_amount']; ?>
                            <?php $_total_remain += $order['remain_amount']; ?>
    <!--                        <td class="center uniformjs"><input type="checkbox" /></td>-->
                            <td class="center"><?php echo $order['id'] ?></td>
                            <td class="important"><a href="<?php echo url_for('shop_order/edit?id='.$order['id']); ?>"><?php echo $order['invoice_number'] ?></a></td>
                            <td class="center"><?php echo $order->getShopOrderStatus() ?></td>
                            <td class="center"><a href="<?php echo url_for('shop_order/edit?id='.$order['id']); ?>"><span class="glyphicons btn-action single shopping_bag" style="margin-right: 0;"><i></i></span><?php echo $order['product_count'] ?> бараа</a></td>
                            <td class="center"><?php echo number_format($order['total_amount']) ?>₮</td>
                            <td class="center"><?php echo number_format($order['remain_amount']) ?>₮</td>
                            <td class="center"><a href="<?php echo url_for('shop_order/search?q=' . $order->getCustomer()->getEmailAddress()); ?>"><?php echo $order->getCustomer(); ?></a></td>
                            <td class="center"><?php echo $order['created_at'] ?></td>
                            <td class="center">
                                <a href="<?php echo url_for('shop_order/edit?id=' . $order['id']); ?>" class="btn-action glyphicons eye_open btn-success"><i></i></a>
                                <a href="<?php echo url_for('shop_order/delete?id=' . $order['id']); ?>" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                <tr class="niit-dun">
                    <td colspan="3"></td>
                    <td style="text-align: right">
                        <b>Нийт:</b>
                    </td>
                    <td style="text-align: center"><b class="basket-total-price"><?php echo number_format($_total_price); ?>₮</b></td>
                    <td style="text-align: center">
                        <b class="basket-total-price"><?php echo number_format($_total_remain); ?>₮</b>   <br>
                    </td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>

            </table>
            <div class="separator top form-inline small">
                <!--                <div class="pull-left checkboxs_actions hide">
                                    <label class="strong">With selected:</label>
                                    <select class="selectpicker dropup" data-style="btn-default btn-small">
                                        <option>Action</option>
                                        <option>Action</option>
                                        <option>Action</option>
                                    </select>
                                </div>-->
                <div class="pagination pagination-small" style="margin: 0;">
                    <ul>
                        <li <?php echo ($pager->getPage() == 1) ? 'class="disabled"' : ''; ?>><a href="<?php echo url_for($page_url . $pager->getPreviousPage()); ?>">&laquo;</a></li>
                        <?php foreach ($pager->getLinks() as $page): ?>
                            <?php if ($pager->getPage() == $page): ?>
                                <li class="active"><a href="javascript:void()"><?php echo $page ?></a></li>
                            <?php else: ?>
                                <li><a href="<?php echo url_for($page_url . $page); ?>"><?php echo $page ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <li <?php echo ($pager->getPage() == $pager->getCurrentMaxLink()) ? 'class="disabled"' : ''; ?>><a href="<?php echo url_for($page_url . $pager->getNextPage()); ?>">&raquo;</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</div>		
<!-- End Content -->



<script type="text/javascript">
    $(function() {

        /*
         * Initialise print preview plugin
         */
        // Add link for print preview and intialise
        $('#printer-lkhagva').append('<a class="print-preview btn btn-mini" style="float: right; margin-top: 10px;" href="javascript:window.print()"><i class="icon-print" style="margin-top: 1px; margin-right: 3px;"></i><?php echo __('Хэвлэж авах'); ?></a>');

    });
</script>
