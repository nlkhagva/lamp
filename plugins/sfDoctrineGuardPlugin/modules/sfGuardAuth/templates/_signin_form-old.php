<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" class="form-signin" style="max-width: 320px;">
    <h3 class="glyphicons unlock form-signin-heading"><i></i> Нэвтрэх</h3>
    <table>
        <tbody>
            <?php echo $form ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="btn btn-large btn-primary" value="<?php echo __('Signin', null, 'sf_guard') ?>" />

                    <?php $routes = $sf_context->getRouting()->getRoutes() ?>
                    <?php if (isset($routes['sf_guard_forgot_password'])): ?>
                        <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
                    <?php endif; ?>

                    <?php if (isset($routes['sf_guard_register'])): ?>
                        &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
                    <?php endif; ?>
                </td>
            </tr>
        </tfoot>
    </table>
</form>
