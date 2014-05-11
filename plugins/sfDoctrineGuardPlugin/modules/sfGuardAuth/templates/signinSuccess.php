<?php use_helper('I18N') ?>


<div class="login-container">
    <div class="row-fluid">
        <div class="center">
            <h1>
                <i class="icon-leaf green"></i>
                <span class="white">Удирдах хэсэг</span>
            </h1>
            <h4 class="blue">&copy; LAMP </h4>
        </div>
    </div>

    <div class="space-6"></div>

    <div class="row-fluid">
        <div class="position-relative">
            <div id="login-box" class="login-box visible widget-box no-border">
                <div class="widget-body">
                    <div class="widget-main">
                        <?php if($form->hasErrors()): ?>
                        <div class="alert alert-error alert-block">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4 style="margin-bottom: 5px;">Warning!</h4>
                            <p><?php echo $form['username']->renderError().' '. $form['password']->renderError()?></p>
                        </div>
                        <?php endif; ?>

                        <div class="space-6"></div>
                        <?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>

                    </div><!--/widget-main-->

                </div><!--/widget-body-->
            </div><!--/login-box-->

        </div><!--/position-relative-->
    </div>
</div>
