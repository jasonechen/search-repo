<?php if(Yii::app()->user->isGuest):
    
    $this->beginContent('//layouts/main'); 
    
    else: $this->beginContent('//layouts/main_1'); 

endif; ?> 

<div class="container">
    <div class="span-7">
        <div id="sidebar">
            <div style="background: #EFEFEF; border-radius: 15px">
                <?php
                    $this->beginWidget('zii.widgets.CPortlet');
                    $this->renderPartial('//widgets/filter',
                        array(
                             'model' => $this->filterModel,
                        )
                    );
                    $this->endWidget();
                ?>
            </div>
            <hr/>
            <?php
                $this->beginWidget('zii.widgets.CPortlet', array('title' => 'Recently Viewed Profiles'));
                $this->renderPartial('//widgets/recently-viewed-profiles',
                    array(
                         'profiles' => (isset(Yii::app()->request->cookies['recent_profiles'])) ? Yii::app()->request->cookies['recent_profiles']->value : array(),
                    )
                );
                $this->endWidget();
            ?>
        </div>
    </div>
	<div class="span-19 last">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>