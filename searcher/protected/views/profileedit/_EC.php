<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr><td> 
	<!-- Smart Wizard -->
			<div id="wizard" class="swMain">
				<ul class="anchor">
					<li>
						<a class="<?php print $clubs; ?>" href="<?php print $this->createUrl('profileinfo/clubs') ?>">
							<label class="stepNumber">1</label>
							<span class="stepDesc">Clubs</span>
						</a>
					</li>
					<li>
						<a class="<?php print $sports; ?>" href="<?php print $this->createUrl('profileinfo/sports') ?>">
							<label class="stepNumber">2</label>
							<span class="stepDesc">Sports</span>
						</a>
					</li>
					<li>
						<a class="<?php print $music; ?>" href="<?php print $this->createUrl('profileinfo/music') ?>">
							<label class="stepNumber">3</label>
							<span class="stepDesc">Music</span>                   
						</a>
					</li>

                                        <li>
						<a class="<?php print $work; ?>" href="<?php print $this->createUrl('profileinfo/work') ?>">
							<label class="stepNumber">4</label>
							<span class="stepDesc">Work/Jobs</span>                   
						</a>
					</li>

                                        <li>
						<a class="<?php print $volunteer; ?>" href="<?php print $this->createUrl('profileinfo/volunteer') ?>">
							<label class="stepNumber">5</label>
							<span class="stepDesc">Volunteer</span>                   
						</a>
					</li>                                        
                                        
                                        <li>
						<a class="<?php print $extracurricular; ?>" href="<?php print $this->createUrl('profileinfo/extracurricular') ?>">
							<label class="stepNumber">6</label>
							<span class="stepDesc">Other Activities</span>                   
						</a>
					</li>
					
				
				</ul>
			</div>
	<!-- End SmartWizard Content -->  		
			
	</td></tr>
	</table>