<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Төлбөр төлөлтийн түүх</h3>
</div>

<div class="modal-body">
    <table class="table">
        <tr>
            <th>Утга</th>
            <th>Төлөв</th>
            <th>Хэн?</th>
            <th>Хэзээ?</th>
            <th>Тайлбар</th>
            <th>IP хаяг</th>
        </tr>
        <?php foreach($transactions as $t): ?>
            <tr>
                <td><?php echo number_format($t->amount) ?>₮</td>
                <td><?php echo $t->getStatus() ?></td>
                <td><?php echo $t->getGuardUser()->getEmailAddress() ?></td>
                <td><?php echo date('Y-m-d H:i:s', strtotime($t->created_at))?></td>
                <td><?php echo $t->description ?></td>
                <td><?php echo $t->ip_address ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
