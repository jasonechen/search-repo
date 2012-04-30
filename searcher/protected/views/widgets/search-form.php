<div class="form-search">
    

        <?php echo CHtml::beginForm(array('search/index'), 'get'); ?>
        
            <fieldset>

                <!--<input class="text span-6" type="text" placeholder="Enter University Name" name="search_q" value="<?php echo $search_q;?>" />-->

                <?php
                    $this->widget('zii.widgets.jui.CJuiAutoComplete',
                        array(
                             'name'        => 'search_q',
                             'value'       => $search_q,
                             'source'      => $this->createURL('profile/suggestUniversity'),
                             'options'     => array(
                                 'minLength' => '2',
                                 'select'    => "js:function(event, ui) {
                                    $('#search_first_university_id').val(ui.item['id']);
                                 }"
                             ),
                             'htmlOptions' => array(
                                 'class'       => 'text span-6',
                                 'placeholder' => "Enter University Name",
                             ),
                        )
                    );
                ?>



                <input class="btn" type="submit" value="SEARCH" id="submit-search" />
            </fieldset>

        <?php echo CHtml::endForm(); ?>

    
</div>

<script type="text/javascript">
    jQuery(function($) {
        /*$('#submit-search').click(function()
        {
            if($('#search_first_university_id').val() == '')
            {
                alert("Please select a university to search");
                return false;
            }
        });*/
    });
</script>