<script type="text/javascript">
    var sec_id = 0;
    var gall_id = 0;

    <?php if(!$form->getObject()->isNew()):?>
        sec_id = <?php echo $form->getObject()->getSectionId(); ?>;
        gall_id = <?php echo $form->getObject()->getId(); ?>;
    <?php endif; ?>

    
    $(document).ready(function(){
        ajaxFunction( $('#gallery_section_id').val(), gall_id); 
        
        $('#gallery_section_id').change(function (){
           ajaxFunction($(this).val(), gall_id); 
        });
    });
    
    function ajaxFunction(__id, __gall_id)
    {
        $('#loader').show();

        $.ajax({
            url: '<?php echo url_for('ajax/choiceGalleryCategory') ?>'+'?id='+__id+'&g_id='+__gall_id,
            complete: function(data){
                $('#loader').hide();
                $('#category_ajax').html(data.responseText);
            }
        });
    }
</script>

<?php echo $form['section_id']->renderRow(); ?>


<div class="control-group">
    <div>
      <label class="control-label" for="gallery_category_id">Ангилал</label>

      <div class="controls" id="category_ajax">
      </div>
      <img src="/images/loading.gif" alt="" id="loader" style="display: none;" />

  </div>
</div>