<?php if(Yii::app()->user->isGuest):
    
    $this->beginContent('//layouts/main'); 
    
    else: $this->beginContent('//layouts/main_1'); 

endif; ?> 


<div class="container">

	<div class="span-4 ">
		<div id="sidebarmenu">
		<?php
			//$this->beginWidget('zii.widgets.CPortlet', array(
			//	'title'=>'Section',
			//));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'activeCssClass'=>'menu-active',	
				'submenuHtmlOptions'=> array('class'=>'submenus'),			
				'htmlOptions'=>array('class'=>'operations'),
			));
			//$this->endWidget();
                        
/*			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Section',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
                        
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Section',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget(); */
		?>
		</div><!-- sidebar -->
	</div>
        <div class="span-1">&nbsp </div>
    	<div class="span-20 last">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>

    


</div>
<?php $this->endContent(); ?>