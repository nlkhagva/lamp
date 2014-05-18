<script type="text/javascript">
    var sec_id = 0;
    var cont_id = 0;


    <?php if(!$form->getObject()->isNew()):?>
        sec_id = <?php echo $form->getObject()->getSectionId(); ?>;
        cont_id = <?php echo $form->getObject()->getId(); ?>;
    <?php endif; ?>

    function ajaxFun(id, cCon, ajaxDiv)
    {
            $(ajaxDiv).html('<img src="/images/loading20x20.gif" style="height: 15px; margin: 5px;">');
            $(ajaxDiv).load('<?php echo url_for('ajax/choiceCategory'); ?>', "id="+id+"&c_id="+cCon );  
    }

    jQuery(function($) {
        ajaxFun(sec_id, cont_id, '#category_ajax');

        $('#content_section_id').change(function (){
            ajaxFun($(this).val(), cont_id, '#category_ajax');
        });
     });
</script>

<?php echo $form['section_id']->renderRow(); ?>

<div class="control-group ">
    <label for="content_categories_list" class="control-label">Ангиллууд</label>
    <div class="controls control-type-boolean" id="category_ajax">
    </div>
</div>
