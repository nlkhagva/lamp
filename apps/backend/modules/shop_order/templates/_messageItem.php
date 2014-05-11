<li style="border-bottom: 1px dotted #eee;">
    <em><?php echo $message->getSender()->getFirstName(); ?></em>
    <small style="color: #ddd; font-size: 11px">/<?php echo date('Y-m-d'); ?>/</small>: <?php echo $message->message ?>
</li>
