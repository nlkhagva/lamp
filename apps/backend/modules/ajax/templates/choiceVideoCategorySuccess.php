<select name="video[category_id]" id="video_category_id">
	<?php foreach ($categories as $category) :?>
		<option value="<?php echo $category->getId() ?>" <?php echo ($category->getId() == $c_id)? 'selected': '' ?> ><?php echo $category->getName() ?></option>
	<?php endforeach; ?>
</select>