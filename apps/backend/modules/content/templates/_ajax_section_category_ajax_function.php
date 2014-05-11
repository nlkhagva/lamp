<script type="text/javascript">
    var sec_id = 0;
    var cont_id = 0;


    <?php if(!$form->getObject()->isNew()):?>
        sec_id = <?php echo $form->getObject()->getSectionId(); ?>;
        cont_id = <?php echo $form->getObject()->getId(); ?>;
    <?php endif; ?>

    function ajaxFun(id, cCon, ajaxDiv)
    {
            $(ajaxDiv).html('<ul class="checkbox_list"><li><img src="/images/loading20x20.gif"></li></ul>');  
            $.ajax({  
                type: "POST",  
                url: "<?php echo url_for('ajax/choiceCategory'); ?>",  
                data: "id="+id+"&c_id="+cCon,  
                success: function(result){  
                    $(ajaxDiv).html(result);  
                }  
            });  
    }

    jQuery(function($) {
        ajaxFun(sec_id, cont_id, '#category_ajax');

        $('#content_section_id').change(function (){
            ajaxFun($(this).val(), cont_id, '#category_ajax');
        });
        
     });
</script>


<div class="sf_admin_form_row">
  <label>Секци</label>
  <?php echo $form['section_id']->render() ?>
</div>

<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_categories_list">
    <div>
      <label for="content_categories_list">Ангилалууд</label>
      <div class="content" id="category_ajax">
      </div>
  </div>
</div>