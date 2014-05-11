<h3>Санал асуулга</h3>

<a href="<?php echo url_for('@poll_new')?>">Шинэ асуулга нэмэх</a> | Жагсаалт<br/><br/>

<?php if($sf_user->hasFlash('success')): ?>
<div class="success">
	<?php echo $sf_user->getFlash('success'); ?>
</div>
<br class="clear" /><br/>
<?php endif; ?>

<table border="0" cellpadding="2" cellspacing="1">
	<tr>
		<th>#</th>
		<th>Санал асуулгын гарчиг</th>
		<th>Хариултууд</th>
		<th colspan="2">Үйлдэл</th>
	</tr>
	
<?php foreach ($polls as $poll): ?>
	<tr>
			<td width="30" align="center"><?php echo $poll->getId(); ?></td>
			<td width="300">
				<?php echo $poll->getQuestion(); ?>
				
				<?php // foreach ($poll->getPolldata() as $data):?>
					<?php // echo $data->getAnswer();?>
				<?php //endforeach; ?>
			</td>
			<td width="50" align="center"><?php echo link_to('Хариулт','@addAnswer?pollId='.$poll->getId());?></td>
			<td width="50" align="center"><?php echo link_to(image_tag('/sfDoctrinePlugin/images/edit.png', array('border'=>0,'alt'=>'Засах', 'title'=>'Засах' )),'@poll_edit?id='.$poll->getId()) ?> </td>
			<td width="50" align="center"><?php echo link_to(image_tag('/sfDoctrinePlugin/images/delete.png', array('border'=>0,'alt'=>'Устгах', 'title'=>'Устгах' )),'@poll_delete?id='.$poll->getId(),array('confirm'=>'Та устгахдаа итгэлтэй байна уу?'))?></td>
	</tr>
<?php endforeach;?>

</table>