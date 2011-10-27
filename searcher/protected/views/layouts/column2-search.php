<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    	<div class="span-5">
		<div id="sidebar">
         <?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title' => 'Filter',
			));
            
			$this->renderPartial('//widgets/filter', array(
                                                       'model' => $this->filterModel
                                                     ));
			$this->endWidget();
		?>
		</div><!-- sidebar -->
	</div>
	<div class="span-19 last">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>

</div>
<?php $this->endContent(); ?>