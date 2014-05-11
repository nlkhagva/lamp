<script type="text/javascript">
    var sec_id = 0;
    var cont_id = 0;


    <?php if(!$form->getObject()->isNew()):?>
        sec_id = <?php echo $form->getObject()->getSectionId(); ?>;
        cont_id = <?php echo $form->getObject()->getId(); ?>;
    <?php endif; ?>

    function ajaxFun(id, cCon, ajaxDiv)
    {
            $(ajaxDiv).html('<img src="/images/loading20x20.gif">');  
            $(ajaxDiv).load('<?php echo url_for('ajax/choiceCategory'); ?>', "id="+id+"&c_id="+cCon );  
    }

    jQuery(function($) {
        alert();
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
      <label for="content_categories_list">Ангиллууд</label>
      <div class="content" id="category_ajax">
      </div>
  </div>
</div>