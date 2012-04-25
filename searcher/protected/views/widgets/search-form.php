<div class="form-search">
    

        <?php echo CHtml::beginForm(array('search/index'), 'get'); ?>
        
            <fieldset>

                <input class="text span-6" type="text" placeholder="Enter School Name" name="search_q" value=" <?php echo $search_q; ?>" />                




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