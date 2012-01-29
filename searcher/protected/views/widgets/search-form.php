<div class="form-search">
             <form action="#">
        <?php echo CHtml::beginForm(array('search/index'), 'get'); ?>
        
            <fieldset>
                <input class="text span-6" type="text" placeholder="Enter University Name" name="search_q" value=" <?php echo $search_q; ?>" />                
                <input class="btn" type="submit" value="SEARCH" />
            </fieldset>
              <?php echo Yii::app()->getRequest()->getCsrfToken(); ?>
    <?php echo CHtml::endForm(); ?>
 
     </form>
				
</div>