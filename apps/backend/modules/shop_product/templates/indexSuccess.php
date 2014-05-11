<ul class="breadcrumb">
    <li><a href="<?php echo url_for('@homepage'); ?>" class="glyphicons home"><i></i> Нүүр</a></li>
    <li class="divider"></li>
    <li>Бараа бүтээгдэхүүн</li>
</ul>
<div class="separator bottom"></div>

<div class="heading-buttons">
    <h3>Бараа бүтээгдэхүүн</h3>
    <div class="buttons pull-right lkhagva-header">
        <a href="<?php echo url_for('shop_category/index'); ?>" class="btn btn-default btn-icon glyphicons inbox"><i></i>Барааны ангилал </a>
        <a href="<?php echo url_for('shop_product/choiceCategory'); ?>" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Нэмэх</a>
    </div>
</div>
<div class="separator bottom"></div>

<div class="innerLR">
    <div class="row-fluid">
        <!--
        <div class="span4">
            <div class="widget">
                <div class="widget-head">
                    <h4 class="heading">Last order</h4>
                    <a href="" class="details pull-right">view all</a>
                </div>
                <div class="widget-body list products">
                    <ul>
                        <li>
                            <span class="img">photo</span>
                            <span class="title">10 items<br/><strong>&euro;5,900</strong></span>
                            <span class="count"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="widget">
                <div class="widget-head">
                    <h4 class="heading">Best seller</h4>
                    <a href="" class="details pull-right">view all</a>
                </div>
                <div class="widget-body list products">
                    <ul>
                        <li>
                            <span class="img">photo</span>
                            <span class="title">Product name<br/><strong>&euro;2,900</strong></span>
                            <span class="count"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
                    <div class="span4">
                        <div class="widget">
                            <div class="widget-head">
                                <h4 class="heading">Promotion</h4>
                                <a href="" class="details pull-right">view all</a>
                            </div>
                            <div class="widget-body list products">
                                <ul>
                                    <li>
                                        <span class="img">photo</span>
                                        <span class="title">Product name<br/><strong>&euro;1,800</strong></span>
                                        <span class="count"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>-->

    </div>

    <div class="widget">
        <div class="widget-head" id="printer-lkhagva">
            <h4 class="heading glyphicons list"><i></i> Бараануудын жагсаалт</h4>
        </div>

        <!--------------------------------------------
        ----------------------------------------------
        ------------------- printer ------------------
        --------------------------------------------->
        <div class="print-information-header" style="display: none; position: relative">
            <div class="row2" style="margin-bottom: 10px;">
                <span style="float: left; font-weight: bold; font-size: 18px; margin-left: 20px;">Бараа бүтээгдэхүүн</span>
                <span style="font-weight: bold; float: right; font-size: 12px"><?php echo date('Y он m сар d ны өдөр'); ?> </span>
                <div class="clear"></div>
            </div>

            <div class="clear"></div>
        </div>
        <!--- printer end  --->

        <div class="widget-body">
            <div class="form-inline separator bottom small lkhagva-header">
                Нийт бараа: <?php echo $shop_products->count(); ?>
                <span class="pull-right">
                    <div class="pagination pagination-small pull-right" style="margin: 0;">
                        <ul>
                            <li <?php echo ($shop_products->getPage() == 1)?'class="disabled"':'';?>><a href="<?php echo url_for('shop_product/index?page=' . $shop_products->getPreviousPage()); ?>">&laquo;</a></li>
                            <?php foreach ($shop_products->getLinks() as $page): ?>
                                <?php if ($shop_products->getPage() == $page): ?>
                                    <li class="active"><a href="javascript:void()"><?php echo $page ?></a></li>
                                <?php else: ?>
                                    <li><a href="<?php echo url_for('shop_product/index?page=' . $page); ?>"><?php echo $page ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <li <?php echo ($shop_products->getPage() == $shop_products->getCurrentMaxLink())?'class="disabled"':'';?>><a href="<?php echo url_for('shop_product/index?page=' . $shop_products->getNextPage()); ?>">&raquo;</a></li>
                        </ul>
                    </div>
                </span>
            </div>

            <!--                <div class="filter-bar">
                                <form>
                                    <div>
                                        <label>From:</label>
                                        <div class="input-append">
                                            <input type="text" name="from" id="dateRangeFrom" class="input-mini" value="08/05/13" style="width: 53px;" />
                                            <span class="add-on glyphicons calendar"><i></i></span>
                                        </div>
                                    </div>
                                    <div>
                                        <label>To:</label>
                                        <div class="input-append">
                                            <input type="text" name="to" id="dateRangeTo" class="input-mini" value="08/18/13" style="width: 53px;" />
                                            <span class="add-on glyphicons calendar"><i></i></span>
                                        </div>
                                    </div>
                                    <div>
                                        <label>Min:</label>
                                        <div class="input-append">
                                            <input type="text" name="from" class="input-mini" style="width: 30px;" value="100" />
                                            <span class="add-on glyphicons euro"><i></i></span>
                                        </div>
                                    </div>
                                    <div>
                                        <label>Max:</label>
                                        <div class="input-append">
                                            <input type="text" name="from" class="input-mini" style="width: 30px;" value="500" />
                                            <span class="add-on glyphicons euro"><i></i></span>
                                        </div>
                                    </div>
                                    <div>
                                        <label>Select:</label>
                                        <select name="from" style="width: 80px;">
                                            <option>Some option</option>
                                            <option>Other option</option>
                                            <option>Some other option</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>-->

            <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable" id="order-index-table">
                <thead>
                    <tr>
                        <th rowspan="2" style="width: 1%; vertical-align: middle" class="center">№</th>
                        <th rowspan="2" style="vertical-align: middle">Нэр</th>
                        <th rowspan="2" style="vertical-align: middle" class="center">Код</th>
                        <th rowspan="2" style="vertical-align: middle" class="center">Үнэ</th>
                        <th class="center" colspan="2">Орлого</th>
                        <th class="center" colspan="2">Зарлага</th>
                        <th class="center" colspan="2">Үлдэгдэл</th>
                        <th rowspan="2" class="center" style="width: 60px;vertical-align: middle">Үйлдэл</th>
                    </tr>
                    <tr>
                        <th>Тоо хэмжээ</th>
                        <th>Нийт үнэ</th>
                        <th>Тоо хэмжээ</th>
                        <th>Нийт үнэ</th>
                        <th>Тоо хэмжээ</th>
                        <th style="display: block !important;">Нийт үнэ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 0; $_orlogo_count = 0; $_orlogo_price = 0; $_zarlaga_count = 0;
                    $_zarlaga_price = 0; $_remain_count = 0; $_remain_price = 0;
                    ?>
                    <?php foreach ($shop_products as $product): ?>
                        <?php $counter++; ?>
                        <tr class="selectable">
                            <td class="center"><?php echo $counter ?></td>
                            <td class="important" style="font-weight: normal;"><?php echo$product ?></td>
                            <td class="center"><?php echo $product->code; ?></td>
                            <td class="center"><?php echo number_format($product->getPrice()); ?>₮</td>
                            <td class="center form-inline small">
                                <?php echo (is_null($total_add = $product->total_add)) ? 0 : $total_add; ?>
                                <?php $_orlogo_count += $total_add; ?>
                                <?php $_orlogo_price += $total_add*$product->price ?>
                            </td>
                            <td class="center form-inline small">
                                <?php echo number_format($total_add*$product->price) ; ?>₮
                            </td>
                            <td class="center form-inline small">
                                <?php echo (is_null($total_minus = $product->total_minus)) ? 0 : $total_minus; ?>
                                <?php $_zarlaga_count += $total_minus; ?>
                                <?php $_zarlaga_price += $total_minus*$product->price ?>
                            </td>
                            <td class="center form-inline small">
                                <?php echo number_format($total_minus*$product->price) ; ?>₮
                            </td>
                            <td class="center form-inline small">
                                <?php echo (is_null($stock = $product->stock_count)) ? 0 : $stock; ?>
                                <?php $_remain_count += $stock; ?>
                                <?php $_remain_price += $stock*$product->price ?>
                            </td>
                            <td class="center"><?php echo number_format($product->getPrice()*$stock); ?>₮</td>
                            <td class="center">
                                <a href="<?php echo url_for('shop_product/edit?id=' . $product->id); ?>" class="btn-action glyphicons pencil btn-success"><i></i></a>
                                <a onclick="if (!confirm('Are you sure?')) return false;" href="<?php echo url_for('shop_product/delete?id=' . $product->id); ?>" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tr class="niit-dun">
                    <td colspan="4" style="text-align: right"><b>Нийт:</b></td>
                    <td style="text-align: center">
                        <?php echo $_orlogo_count ?>
                    </td>
                    <td style="text-align: center">
                        <?php echo number_format($_orlogo_price); ?>₮
                    </td>
                    <td style="text-align: center">
                        <?php echo $_zarlaga_count ?>
                    </td>
                    <td style="text-align: center">
                        <?php echo number_format($_zarlaga_price); ?>₮
                    </td>
                    <td style="text-align: center">
                        <?php echo $_remain_count ?>
                    </td>
                    <td style="text-align: center">
                        <?php echo number_format($_remain_price); ?>₮
                    </td>
                    <td></td>
                </tr>

            </table>
            <div class="separator top form-inline small">
                <!--                    <div class="pull-left checkboxs_actions hide">
                                        <label class="strong">With selected:</label>
                                        <select class="selectpicker dropup" data-style="btn-default btn-small">
                                            <option>Action</option>
                                            <option>Action</option>
                                            <option>Action</option>
                                        </select>
                                    </div>-->
                <div class="pagination pagination-small pull-right" style="margin: 0;">
                    <ul>
                        <li <?php echo ($shop_products->getPage() == 1)?'class="disabled"':'';?>><a href="<?php echo url_for('shop_product/index?page=' . $shop_products->getPreviousPage()); ?>">&laquo;</a></li>
                        <?php foreach ($shop_products->getLinks() as $page): ?>
                            <?php if ($shop_products->getPage() == $page): ?>
                                <li class="active"><a href="javascript:void()"><?php echo $page ?></a></li>
                            <?php else: ?>
                                <li><a href="<?php echo url_for('shop_product/index?page=' . $page); ?>"><?php echo $page ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <li <?php echo ($shop_products->getPage() == $shop_products->getCurrentMaxLink())?'class="disabled"':'';?>><a href="<?php echo url_for('shop_product/index?page=' . $shop_products->getNextPage()); ?>">&raquo;</a></li>
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
