<script type="text/javascript">
    var sec_id = 0;
    var gall_id = 0;

    <?php if(!$form->getObject()->isNew()):?>
        sec_id = <?php echo $form->getObject()->getSectionId(); ?>;
        gall_id = <?php echo $form->getObject()->getId(); ?>;
    <?php endif; ?>

    $(document).ready(function(){
        ajaxFunction( $('#video_section_id').val(), gall_id); 
        
        $('#video_section_id').change(function (){
           ajaxFunction($(this).val(), gall_id); 
        });
    });
    
    function ajaxFunction(__id, __gall_id)
    {
        $('#category_ajax').html('<img src="/images/loading20x20.gif" style="height: 15px; margin: 5px;">');

        $.ajax({
            url: '<?php echo url_for('ajax/choiceVideoCategory') ?>'+'?id='+__id+'&g_id='+__gall_id,
            complete: function(data){
                $('#loader').hide();
                $('#category_ajax').html(data.responseText);
            }
        });
    }
</script>


<?php echo $form['section_id']->renderRow(); ?>

<div class="control-group ">
    <label for="video_category_id" class="control-label">Ангиллууд</label>
    <div class="controls control-type-boolean" id="category_ajax">
    </div>
</div>
