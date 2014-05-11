<div id="sf_admin_container" class="">
    <?php if ($pid): ?>
        <?php $title = 'Санал асуулга засах' ?>
    <?php else: ?>
        <?php $title = 'Санал асуулга нэмэх' ?>
    <?php endif; ?>

    <h1><?php echo $title ?></h1>

    <?php if ($pid): ?>
        <a href="<?php echo url_for('@poll_new') ?>">Шинэ санал асуулга нэмэх</a>
    <?php else: ?>
        Шинэ санал асуулга нэмэх
    <?php endif; ?>
    | <a href="<?php echo url_for('@poll_list') ?>">Жагсаалт</a><br/>


    <div class="left" style="border-right:1px solid #efefef; padding-right:30px; float: left; width: 48%;">
        <h3>Шинэ хариулт нэмэх</h3>

        <?php if ($sf_user->hasFlash('success')): ?>
            <div class="success">
                <?php echo $sf_user->getFlash('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($form->hasErrors()) : ?>
                <?php echo $form['mn']['answer']->renderError() ?>
                <?php echo $form['en']['answer']->renderError() ?>
                <?php echo $form['order_id']->renderError() ?>
                <?php echo $form->renderGlobalErrors() ?>
        <?php endif; ?>

        <form method="POST" action="">
            <table>
                <input type="hidden" name="id" value="<?php echo $form['id']->getValue() ? $form['id']->getValue() : 0 ?>" />
                <?php echo $form->renderHiddenFields(); ?>

                <tr class="row-filter">
                    <td class="data">Шинэ хариулт:/Монгол/</td>
                    <td class="input" style="float:left;">
                        <?php echo $form['mn']['answer']->render(); ?>
                    </td>
                </tr>
                <tr>
                    <td class="data">Add answer:/English/</td>
                    <td class="input" style="float:left;">
                        <?php echo $form['en']['answer']->render(); ?>
                    </td>
                </tr>
                <tr>
                    <td class="data">Дэс дугаар:</td>
                    <td class="input" style="float:left;">
                        <?php echo $form['order_id']->render(); ?>
                    </td>
                </tr>
                <tr>
                    <td class="data">&nbsp;</td>
                    <td class="input">
                        <input type="submit" value="Нэмэх" class="submit" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="left_30px">&nbsp;</div>
    <div class="left" style="float: right; width: 45%;">
        <h3 style=""><small>Асуулт</small>: <?php echo link_to($poll->getQuestion(), '@poll_edit?id=' . $poll->getId()); ?></h3>

        <table cellpadding="1" cellspacing="1">
            <tr>
                <th width="20">#</th>
                <th width="200">Хариултууд</th>
                <th>Устгах</th>
            </tr>
            <?php if (count($poll->getPollDatas())): ?>
                <?php
                $counter = 1;
                foreach ($poll->getPollDatasOrder('ASC') as $answer):
                    ?>
                    <tr>
                        <td align="center"><?php echo $counter; ?></td>
                        <td><?php echo $answer->getAnswer(); ?></td>
                        <td align="center"><?php echo link_to(image_tag('/sfDoctrinePlugin/images/delete.png', array('border' => 0)), '@removeAnswer?dataId=' . $answer->getId(), array('confirm' => 'Та устгахдаа итгэлтэй байна уу?')) ?></td>
                    </tr>
                    <?php
                    $counter++;
                endforeach;
                ?>
            <?php else: ?>
                Хариулт байхгүй байна
            <?php endif; ?>
        </table>
    </div>

</div>