<?php if(Yii::app()->user->isGuest):
    
    $this->beginContent('//layouts/main'); 
    
    else: $this->beginContent('//layouts/main_1'); 

endif; ?> 

<div class="container">
	
            
  	
            
		<?php echo $content; ?>
                
            
	
  	
	
</div>
<?php $this->endContent(); ?>