<?php if(Yii::app()->user->isGuest):
    
    $this->beginContent('//layouts/main'); 
    
    else: $this->beginContent('//layouts/main_1'); 

endif; ?> 


<div class="container">

	<div class="span-3 ">
&nbsp 
	</div>
        <div class="span-1">&nbsp </div>
    	<div class="span-20 last">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>

    


</div>
<?php $this->endContent(); ?>