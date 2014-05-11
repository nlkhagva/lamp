<div class="modal-header">
	<a class="close" data-dismiss="modal">&times;</a>
	<h3>Төлбөр төлөлт</h3>
</div>

<div class="modal-body">
    <form action="<?php echo url_for('shop_order/saveTransaction?id='.$order->id); ?>" method="post">
        <?php echo $form; ?>
    </form>
</div>

<div class="modal-footer" style="text-align: left;">
	<a class="btn btn-primary" onclick="$('.modal-body > form').submit();">Хадгалах</a>
	<a class="btn" data-dismiss="modal">Хаах</a>
</div>