<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr><td> 
	<!-- Smart Wizard -->
			<div id="wizard" class="swMain">
				<ul class="anchor">
					<li>
						<a class="<?php print $consult; ?>" href="<?php print $this->createUrl('profileinfo/consult') ?>">
							<label class="stepNumber">1</label>
							<span class="stepDesc">Consultation</span>
						</a>
					</li>

                                        
                                      
					<li>
						<a class="<?php print $verify; ?>" href="<?php print $this->createUrl('profileinfo/verify') ?>">
							<label class="stepNumber">2</label>
							<span class="stepDesc">Verification</span>
						</a>
					</li>
					<li>
						<a class="<?php print $exclusivity; ?>" href="<?php print $this->createUrl('profileinfo/exclusivity') ?>">
							<label class="stepNumber">3</label>
							<span class="stepDesc">Exclusivity</span>                   
						</a>
					</li>
                                    
                                        <li>
						<a class="<?php print $referrals; ?>" href="<?php print $this->createUrl('profileinfo/referrals') ?>">
							<label class="stepNumber">4</label>
							<span class="stepDesc">Referrals</span>
						</a>
					</li>


					
				
				</ul>
			</div>
	<!-- End SmartWizard Content -->  		
			
	</td></tr>
	</table>