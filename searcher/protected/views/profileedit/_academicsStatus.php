<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr><td> 
	<!-- Smart Wizard -->
			<div id="wizard" class="swMain">
				<ul class="anchor">
					<li>
						<a class="<?php print $grades; ?>" href="<?php print $this->createUrl('profileinfo/grades') ?>">
							<label class="stepNumber">1</label>
							<span class="stepDesc">Grades</span>
						</a>
					</li>
					<li>
						<a class="<?php print $subjects; ?>" href="<?php print $this->createUrl('profileinfo/subjects') ?>">
							<label class="stepNumber">2</label>
							<span class="stepDesc">Subjects</span>
						</a>
					</li>
					<li>
						<a class="<?php print $competitions; ?>" href="<?php print $this->createUrl('profileinfo/competitions') ?>">
							<label class="stepNumber">3</label>
							<span class="stepDesc">Competitions</span>                   
						</a>
					</li>
					<li>
						<a class="<?php print $awardhonours; ?>" href="<?php print $this->createUrl('profileinfo/awardshonors') ?>">
							<label class="stepNumber">4</label>
							<span class="stepDesc">Award/Honours</span>                   
						</a>
					</li>
					
				
				</ul>
			</div>
	<!-- End SmartWizard Content -->  		
			
	</td></tr>
	</table>