<?php use_javascripts_for_form($image_form); ?>
<?php use_stylesheets_for_form($image_form); ?>

<ul class="breadcrumb">
    <li><a href="<?php echo url_for('@homepage') ?>" class="glyphicons home"><i></i> Нүүр</a></li>
    <li class="divider"></li>
    <li><a href="<?php echo url_for('shop_product/index'); ?>">Бараа бүтээгдэхүүн</a></li>
    <li class="divider"></li>
    <li>Зураг нэмэх</li>
</ul>
<div class="separator bottom"></div>

<div class="heading-buttons">
    <h3>Зураг оруулах</h3>
    <!--    <div class="buttons pull-right">
            <a href="" class="btn btn-primary btn-icon glyphicons ok_2"><i></i> Save</a>
        </div>-->
</div>
<div class="separator bottom"></div>

<div class="innerLR">
    <div class="widget widget-tabs">
        <div class="widget-body" style="padding: 10px;">
            <?php include_partial('step', array('step' => 3, 'form' => $product)); ?>

            <div class="row">
                <div class="span5">
                    <form method="post" enctype="multipart/form-data" accept-charset="utf-8">
                        <?php echo $image_form->renderHiddenFields(); ?>
                        <?php echo $image_form['img_src']; ?>
                        <input type="hidden" name="sf_method" value="put" />
                    </form>

                </div>

                <style type="text/css">
                    .picture-item .thumbnail{ position: relative; }
                    .picture-item .thumbnail .caption{ position: absolute; bottom: 0; left: 0; display: block; }  
                    .picture-item .thumbnail:hover .caption{ display: block; }  
                    .picture-item .thumbnail .remove-button{ position: absolute; top: 5px; right: 5px; display: none; }
                    .picture-item .thumbnail:hover .remove-button{ display: block; }
                </style>

                <div class="span6">
                    <h4 style="margin-top: -30px;">Pictures <img src="/images/loading.gif" alt="" id="products-loader" style="display: none;"/></h4>
                    <ul class="picture-container thumbnails">
                        <?php foreach ($product->getPhotos() as $key => $photo): ?>
                            <?php include_partial('shop_product/photoItem', array('photo' => $photo, 'product' => $product)); ?>
                            <?php if ($key % 3 == 2): ?><br class="clear" /><?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                    <div id="ajax-output"></div>
                </div>
            </div>


        </div>
    </div>
</div>		



<script type="text/javascript">
    
    document.resetProductImages = function()
    {      
        $('#products-loader').show();
        
        $.ajax({
            url: '<?php echo url_for('shop_product/getImages?id=' . $product->getId()); ?>',
            complete: function(data){
                $('.picture-container').html(data.responseText);
                
                $('#products-loader').hide(); /* hide loader */
            }
        });
    }
    function ajaxLink(_this, _action)
    {
        $this = $(_this);
        
        if(_action == "remove"){
            if(!confirm('Are you sure ?')){
                return false;
            }
        }

        $('#products-loader').show();
        
        $.ajax({
            url : $this.attr('rel'),
            complete: function(data){
                $('#products-loader').hide();
                
                if(data.responseText == "is_cover_photo"){
                    alert('This is cover photo');
                }else{
                    $('#ajax-output').html(data.responseText);

                    if(_action == "activation"){
                        if($this.hasClass('btn-primary')){
                            $this.text('No active');
                            $this.removeClass('btn-primary');
                        }else{
                            $this.text('Active');
                            $this.addClass('btn-primary');
                        }
                    }else if(_action == "coverphoto"){
                        $('.cover-photo').removeClass('btn-primary');
                        $('.cover-photo').find('span').removeClass('icon-white');

                        $this.addClass('btn-primary').addClass('cover-photo');
                        $this.find('span').addClass('icon-white');
                    }else if(_action == "remove"){
                        var __li = $this.parent().parent().fadeOut().remove();
                    }
                }
            }
        });
    }
</script>