<br>
<div id="wizard-wrapper">
	<div class="demoHead">
		<a href="<?php print $this->createUrl('profileinfo/basic') ?>" class="<?php print $personalinfoTab; ?>">Personal Info</a>
		<a href="<?php print $this->createUrl('profileinfo/sat1') ?>" class="<?php print $testscoreTab; ?>">Test Scores</a>
                <a href="<?php print $this->createUrl('profileinfo/grades') ?>" class="<?php print $academicsTab; ?>">Academics</a> 
		<a href="<?php print $this->createUrl('profileinfo/clubs') ?>" class="<?php print $ecTab; ?>">Extracurriculars</a>
		<a href="<?php print $this->createUrl('profileinfo/modEssays') ?>" class="<?php print $essayTab; ?>">Essays</a>
		<a href="<?php print $this->createUrl('profileinfo/summary') ?>" class="<?php print $summaryTab; ?>">Summary</a>                
                <a href="<?php print $this->createUrl('profileinfo/consult') ?>" class="<?php print $finishTab; ?>">Finish</a>                
		<!--<a href="#" class="btn">Go Home</a>
		<a href="#" class="btn">Documentation</a>-->
	</div>	
	<?php $this->renderPartial($Tab,array(
			'basic'=>$basic,
			'demographics'=>$demographics,
			'university'=>$university,
			'admittance'=>$admittance,
			'languages'=>$languages,
			
			'Academics'=>$Academics,
			'grades'=>$grades,
			'subjects'=>$subjects,
			'competitions'=>$competitions,
			'awardhonours'=>$awardhonours,
			
			'sat1'=>$sat1,
			'act'=>$act,
			'sat2'=>$sat2,
			'ap'=>$ap,
                        'toefl'=>$toefl,
			
			'clubs'=>$clubs,
			'sports'=>$sports,
			'music'=>$music,
                        'work'=>$work,
                        'volunteer'=>$volunteer,
			'extracurricular'=>$extracurricular,
			
			'essayStatus'=>$essayStatus,
                        
                        'summary'=>$summary,            
            
                        'consult'=>$consult,
                        'verify'=>$verify,
			'exclusivity'=>$exclusivity,
                        'referrals'=>$referrals,
                        
		)
	); ?>
</div> 	