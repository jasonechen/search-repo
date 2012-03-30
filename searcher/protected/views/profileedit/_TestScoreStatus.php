<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr><td> 
	<!-- Smart Wizard -->
			<div id="wizard" class="swMain">
				<ul class="anchor">
					<li>
						<a class="<?php print $sat1; ?>" href="<?php print $this->createUrl('profileinfo/sat1') ?>">
							<label class="stepNumber">1</label>
							<span class="stepDesc">SAT 1</span>
						</a>
					</li>
					<li>
						<a class="<?php print $act; ?>" href="<?php print $this->createUrl('profileinfo/act') ?>">
							<label class="stepNumber">2</label>
							<span class="stepDesc">ACT</span>
						</a>
					</li>
					<li>
						<a class="<?php print $sat2; ?>" href="<?php print $this->createUrl('profileinfo/sat2') ?>">
							<label class="stepNumber">3</label>
							<span class="stepDesc">SAT 2</span>                   
						</a>
					</li>
					<li>
						<a class="<?php print $ap; ?>" href="<?php print $this->createUrl('profileinfo/ap') ?>">
							<label class="stepNumber">4</label>
							<span class="stepDesc">AP</span>                   
						</a>
					</li>

                                        <li>
						<a class="<?php print $toefl; ?>" href="<?php print $this->createUrl('profileinfo/toefl') ?>">
							<label class="stepNumber">5</label>
							<span class="stepDesc">TOEFL/IELTS</span>                   
						</a>
					</li>
				
				</ul>
			</div>
	<!-- End SmartWizard Content -->  		
			
	</td></tr>
	</table>