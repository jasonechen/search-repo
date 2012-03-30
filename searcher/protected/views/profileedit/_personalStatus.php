<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr><td> 
	<!-- Smart Wizard -->
			<div id="wizard" class="swMain">
				<ul class="anchor">
					<li>
						<a class="<?php print $basic; ?>" href="<?php print $this->createUrl('profileinfo/basic') ?>">
							<label class="stepNumber">1</label>
							<span class="stepDesc">Basic</span>
						</a>
					</li>
					<li>
						<a class="<?php print $demographics; ?>" href="<?php print $this->createUrl('profileinfo/demographics') ?>">
							<label class="stepNumber">2</label>
							<span class="stepDesc">Demographics</span>
						</a>
					</li>
					<li>
						<a class="<?php print $university; ?>" href="<?php print $this->createUrl('profileinfo/university') ?>">
							<label class="stepNumber">3</label>
							<span class="stepDesc">University</span>                   
						</a>
					</li>
					<li>
						<a class="<?php print $admittance; ?>" href="<?php print $this->createUrl('profileinfo/admittance') ?>">
							<label class="stepNumber">4</label>
							<span class="stepDesc">Other Admittances</span>                   
						</a>
					</li>
					<li>
						<a class="<?php print $languages; ?>" href="<?php print $this->createUrl('profileinfo/languages') ?>">
							<label class="stepNumber">5</label>
							<span class="stepDesc">Languages</span>                   
						</a>
					</li>
				<!--	<li>
						<a class="disabled" href="#step-6">
							<label class="stepNumber">6</label>
							<span class="stepDesc">Other Admittances</span>                   
						</a>
					</li>-->
				</ul>
			</div>
	<!-- End SmartWizard Content -->  		
			
	</td></tr>
	</table>