<?php foreach($content->getCategories() as $k=>$cat): ?>
    <?php echo ($k==0)?''.$cat:', '.$cat ?>
<?php endforeach; ?>