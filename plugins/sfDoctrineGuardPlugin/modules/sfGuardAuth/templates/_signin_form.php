<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" class="form-signin" style="max-width: 320px;">
    <?php echo $form->renderHiddenFields() ?>
    <fieldset>
        <label>
            <span class="block input-icon input-icon-right">
<!--                <input type="text" class="span12" placeholder="Username" />-->
                <?php echo $form['username']->render(array('class'=>'span12', 'placeholder'=>'Хэрэглэгчийн нэр')) ?>
                <i class="icon-user"></i>
            </span>
        </label>

        <label>
            <span class="block input-icon input-icon-right">
<!--                <input type="password" class="span12" placeholder="Password" />-->
                <?php echo $form['password']->render(array('class'=>'span12', 'placeholder' => 'Нууц үг')) ?>
                <i class="icon-lock"></i>
            </span>
        </label>

        <div class="space"></div>

        <div class="clearfix">
            <button class="width-35 pull-left btn btn-small btn-primary">
                <i class="icon-key"></i>
                Нэвтрэх
            </button>
        </div>

        <div class="space-4"></div>
    </fieldset>
</form>
