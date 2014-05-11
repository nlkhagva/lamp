<div style="padding: 20px;">
    <form action="<?php echo url_for('shop_order/addMessage?id='.$order->id); ?>" id="message_form" method="post">

        <?php echo $form->renderHiddenFields(); ?>
        <?php echo $form['message']->render(array('style'=>'width: 385px', 'cols' => '3')) ?>

        <input type="submit" class="btn btn-warning" value="<?php echo __('Илгээх'); ?>"/> <img src="/images/loading.gif" alt="loading..." id="msg_loader" style="display: none"/>
    </form>
</div>

<!--<div id="output1">test</div>-->

<script type="text/javascript">

    // prepare the form when the DOM is ready
    $(document).ready(function() {
        var options = {
          // target:        '#output1',   // target element(s) to be updated with server response
            beforeSubmit:  showRequest,  // pre-submit callback
            resetForm:     true,
            success:       showResponse  // post-submit callback

            // other available options:
            //url:       url         // override for form's 'action' attribute
            //type:      type        // 'get' or 'post', override for form's 'method' attribute
            //dataType:  null        // 'xml', 'script', or 'json' (expected server response type)
            //clearForm: true        // clear all form fields after successful submit
            //resetForm: true        // reset the form after successful submit

            // $.ajax options can be used here too, for example:
            //timeout:   3000
        };

        // bind form using 'ajaxForm'
        $('#message_form').ajaxForm(options);
    });

    // pre-submit callback
    function showRequest(formData, jqForm, options) {
        $('#msg_loader').show();

        if(!$('#shop_order_message_message').val()){
            $('#msg_loader').hide();
            return false;
        }
        return true;
    }

    // post-submit callback
    function showResponse(responseText, statusText, xhr, $form)  {
        $('#msg_loader').hide();
        if(responseText == "error"){
            alert('<?php echo __('Алдаа гарлаа та дахин оролдож үзнэ үү!'); ?>');
            location.reload();
        }else{
            $('#message-container').append(responseText);
            window.__message_pane.scrollToBottom(222);
        }
    }
</script>