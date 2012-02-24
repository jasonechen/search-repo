<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    	<div class="span-7">
             
		<div id="sidebar">
                    <div style="background: #EFEFEF; border-radius: 15px">
         <?php
			$this->beginWidget('zii.widgets.CPortlet');/*, array(
				'title' => 'Refine search',
			));*/
            
			$this->renderPartial('//widgets/filter', array(
                                                       'model' => $this->filterModel
                                                     ));
			$this->endWidget();
		?>
		</div><!-- sidebar -->
             </div>
        </div>
	<div class="span-19 last">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>

</div>
<?php $this->endContent(); ?>