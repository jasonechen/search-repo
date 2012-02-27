<div class="form-search">
    <form action="#">

        <?php echo CHtml::beginForm(array('search/index'), 'get'); ?>
        
            <fieldset>

                <?php
                    $this->widget('zii.widgets.jui.CJuiAutoComplete',
                        array(
                             'name' => 'search_first_university_name',
                             'value' => $search_first_university_name,
                             'source' => $this->createURL('profile/suggestUniversity'),
                             'options' => array(
                                 'minLength' => '2',
                                 'select' => "js:function(event, ui) {
                                    $('#search_first_university_id').val(ui.item['id']);
                                 }"
                             ),
                             'htmlOptions' => array(
                                 'class' => 'text span-6',
                                 'placeholder' => "Enter University Name",
                             ),
                        )
                    );
                ?>

                <input type="hidden" name="search_first_university_id" id="search_first_university_id" value="<?php echo $search_first_university_id; ?>" />

                <input class="btn" type="submit" value="SEARCH" id="submit-search" />
            </fieldset>

        <?php echo CHtml::endForm(); ?>

     </form>
</div>

<script type="text/javascript">
    jQuery(function($) {
        /*$('#submit-search').click(function()
        {
            if($('#search_first_university_id').val() == '')
            {
                alert("You should select one of universities from database");
                return false;
            }
        });*/
    });
</script>