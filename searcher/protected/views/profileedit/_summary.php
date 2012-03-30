<div class="sub-head-profile">Summary </div>

<p> Please review your profile to make any corrections/modifications </p>


<table width=750px" height="700px" >
      <col width="200px" />
      <col width="450px" />
      <col width="30px" />
      <tr>
          <td>
          Profile Section    
          </td>
          <td>
              Details
            </td>        
            <td>                
            
            
            </td>                                                    
      </tr>
      <tr>
          <td>
          Personal Info - Basic    
          </td>
          <td>
        <b><?php echo "Nickname: " ?> </b> <?php echo $basicProfile->nickname ?>
        <b><?php echo ", Profile Type: " ?> </b> <?php echo $basicProfile->profile_type ?>        
        <b><?php echo ", HS Graduation Year: " ?> </b> <?php echo $personalProfile->hs_grad_year ?>        
        <b><?php echo ", HS Type: " ?> </b> <?php echo (!empty($basicProfile->highSchoolType)) ? BasicProfile::$HighSchoolTypeArray["$basicProfile->highSchoolType"] : ''; ?>      
        <b><?php echo ", Home Country: " ?> </b> <?php echo ($personalProfile->country_reside !== '' && $personalProfile->country_reside !== NULL) ? $personalProfile->country->name : ''; ?>           
        <b><?php echo ", Home State: " ?> </b> <?php echo (!empty($personalProfile->state)) ? $personalProfile->states->name : ''; ?>         
        <b><?php echo ", Home Zip: " ?> </b> <?php echo $personalProfile->hometown_zipcode ?>                
        <b><?php echo ", Birth Year: " ?> </b> <?php echo ($personalProfile->date_of_birth == '0000-00-00') ? '' :date('Y',strtotime($personalProfile->date_of_birth)); ?>                                                    
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/basic')); ?>                             
            </td>                                                    
      </tr>
      <tr>
          <td>
          Personal Info - Demographics    
          </td>
          <td>
        <b><?php echo "Gender: " ?> </b> <?php echo $basicProfile->gender ?>
        <b><?php echo ", Race: " ?> </b> <?php echo ($basicProfile->race_id !== '' && $basicProfile->race_id !== NULL) ? $basicProfile->race->name : ''; ?>        
        <b><?php echo ", Ethnicity: " ?> </b> <?php echo ($personalProfile->ethnic_origin !== '' && $personalProfile->ethnic_origin !== NULL) ? $personalProfile->ethnicity->name : ''; ?>      
        <b><?php echo ", Citizenship: " ?> </b> <?php echo ($personalProfile->citizenship !== '' && $personalProfile->citizenship !== NULL) ? $personalProfile->citizen->name : ''; ?>     
        <b><?php echo ", Parents' Marital Status: " ?> </b> <?php echo (!empty($personalProfile->parental_status)) ? PersonalProfile::$ParentalStatusArray["$personalProfile->parental_status"] : ''; ?>       
        <b><?php echo ", Household Income: " ?> </b> <?php echo (!empty($personalProfile->income_bracket)) ? PersonalProfile::$IncomeBracketArray["$personalProfile->income_bracket"] : ''; ?>      
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/demographics')    ); ?>                             
            </td>                                                    
      </tr> 
      <tr>
          <td>
          Personal Info - University   
          </td>
          <td>
        <b><?php echo "Current University: " ?> </b> <?php echo $basicProfile->getCurrUniversityName(); ?>
        <b><?php echo ", Reg/Early Admit: " ?> </b> <?php echo $basicProfile->early_regular ?>        
        <b><?php echo ", Transfer Student: " ?> </b> <?php echo $basicProfile->isTransfer ?>        
        <b><?php if ($basicProfile->isTransfer == "Y") echo ", First University: " ?> </b> <?php if ($basicProfile->isTransfer == "Y") echo $basicProfile->getFirstUniversityName() ?>        
        <b><?php echo ", Alumni Connections: " ?> </b> <?php echo $personalProfile->getLegacyConnections(); ?>        
        <b><?php echo ", Current Major: " ?> </b> <?php echo ($personalProfile->current_major !== '' && $personalProfile->current_major !== NULL) ? $personalProfile->major->name : ''; ?>       
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/university')    ); ?>                             
            </td>                                                    
      </tr>
      <tr>
          <td>
          Personal Info - Other Admittances    
          </td>
          <td>
        <b><?php echo "Other Admittances: " ?> </b> <?php echo PersonalProfile::getOtherAdmits($otherSchoolAdmitProfileArray); ?>
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/admittance ')    ); ?>                             
            </td>                                                    
      </tr>      
       <tr>
          <td>
          Personal Info - Languages    
          </td>
          <td>
             <?php echo PersonalProfile::getLanguages($languageProfileArray); ?> 
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/languages')    ); ?>                             
            </td>                                                    
      </tr>     
      <tr>
          <td>
          Test Scores - SAT I / PSAT
          </td>
          <td>
        <b><?php echo "SAT I Math: " ?></b> <?php echo $scoreProfile->SAT_Math.", " ?>
        <b><?php echo "Critical Reading: " ?></b> <?php echo $scoreProfile->SAT_Critical_Read.", " ?>
        <b><?php echo "Writing: " ?></b> <?php echo $scoreProfile->SAT_Writing.", " ?>
        <b><?php echo "Essay: " ?></b> <?php echo $scoreProfile->SAT_Essay.", " ?>
        <b><?php echo "Total: " ?></b> <?php echo $scoreProfile->totalSAT ?> <br>
        <b><?php echo "PSAT I Math: " ?></b> <?php echo $scoreProfile->PSAT_Math.", " ?>
        <b><?php echo "Critical Reading: " ?></b> <?php echo $scoreProfile->PSAT_Verbal.", " ?>
        <b><?php echo "Writing: " ?></b> <?php echo $scoreProfile->PSAT_Writing ?>            
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/sat1')    ); ?>                             
            </td>                                                    
      </tr>      
      <tr>
          <td>
          Test Scores - SAT ACT  
          </td>
          <td>
        <b><?php echo "English: " ?></b> <?php echo $scoreProfile->ACT_English.", " ?>
        <b><?php echo "Math: " ?></b> <?php echo $scoreProfile->ACT_Math.", " ?>
        <b><?php echo "Reading: " ?></b> <?php echo $scoreProfile->ACT_Reading.", " ?>
        <b><?php echo "Science: " ?></b> <?php echo $scoreProfile->ACT_Science.", " ?>
        <b><?php echo "Writing: " ?></b> <?php echo $scoreProfile->ACT_Writing ?> <br>
        <b><?php echo "Composite: " ?></b> <?php echo $scoreProfile->ACT_Composite ?>
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/act')    ); ?>                             
            </td>                                                    
      </tr>
      <tr>
          <td>
          Test Scores - SAT II   
          </td>
          <td>
    <?php
    if ($sat2ProfileArray!==null)
        foreach ($sat2ProfileArray as $sat2Profile): ?>
    <b><?php echo $sat2Profile->sat2->subject.": " ?> </b>
        <?php echo $sat2Profile->score.", "; ?>
    
    <?php endforeach; else echo "None"; ?>  
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/sat2')    ); ?>                             
            </td>                                                    
      </tr>
      <tr>
          <td>
          Test Scores - AP   
          </td>
          <td>
        <?php 
        if ($apProfileArray !== NULL) 
        foreach ($apProfileArray as $apProfile): ?>
         <b><?php echo $apProfile->ap->name.": " ?> </b>
        <?php echo $apProfile->score.", "; ?>  
               <?php endforeach; else echo "None"; ?>     
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/ap')    ); ?>                             
            </td>                                                    
      </tr>
      <tr>
          <td>
          Test Scores - TOEFL / IELTS   
          </td>
          <td>
        <b><?php echo "TOEFL: " ?></b> <?php echo $scoreProfile->toefl.", " ?>
        <b><?php echo "IELTS: " ?></b> <?php echo $scoreProfile->ielts.", " ?>
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/toefl')    ); ?>                             
            </td>                                                    
      </tr>

      <tr>
          <td>
          Academics - Grades    
          </td>
          <td>
        <b><?php echo 'Unweighted GPA: '; ?></b> <?php echo empty($academicProfile->GPA_unweight) ? '' : $numberFormatter->format("0.00",$academicProfile->GPA_unweight).", " ?>
        <b><?php echo 'Weighted GPA: '; ?></b> <?php echo empty($academicProfile->GPA_weight) ? '' : $numberFormatter->format("0.00",$academicProfile->GPA_weight).", " ?>
        <b>
            <?php if (!empty($academicProfile->class_rank_num)): ?>
        <?php echo 'Class Rank: '; ?></b> <?php echo $academicProfile->class_rank_num.", " ?>
            <?php endif; ?>
        
           <?php if (!empty($academicProfile->class_rank_percent)): ?>
        <b><?php echo 'Class Rank Percentile: '; ?></b> <?php echo AcademicProfile::$ClassRankArray[$academicProfile->class_rank_percent].", " ?>
        <?php endif; ?>
       
        <b><?php echo 'Class Size: '; ?></b> 
         <?php if (!empty($academicProfile->class_size)): ?>
        <?php echo $academicProfile->class_size;                
         else: {echo 'N/A';}; 
            endif; ?>
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/grades')    ); ?>                             
            </td>                                                    
      </tr>
      <tr>
          <td>
          Academics - Advanced Subjects   
          </td>
          <td>
    <?php  
    if ($subjectProfileArray !== NULL) 
    foreach ($subjectProfileArray as $subjectProfile): ?>    
         
        <?php echo SubjectProfile::ConvertHonors($subjectProfile->honors_or_AP); ?> 
              <?php echo $subjectProfile->subject->name.", "; ?>
    
    <?php endforeach;else echo "None";  ?>   
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/subjects')    ); ?>                             
            </td>                                                    
      </tr>
      <tr>
          <td>
          Academics - Competitions    
          </td>
          <td>
            <?php  
            if ($competitionProfileArray !== NULL) 
            foreach ($competitionProfileArray as $competitionProfile): ?>    
    
        <b> <?php echo $competitionProfile->name_of_competition.": "; ?> </b>
        <?php echo ": ".($competitionProfile->region !== '' && $competitionProfile->region !== NULL) 
                    ? AwardProfile::$RegionArray[$competitionProfile->region] : ''; ?>
        <?php echo ", ".($competitionProfile->year !== '' && $competitionProfile->year !== NULL) 
                    ? AwardProfile::$AwardDateArray[$competitionProfile->year] : ''.", "; ?> 
        <?php echo ", Rank-".$competitionProfile->rank_or_score."; "; ?>

            <?php endforeach; else echo "None"; ?>  
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/competitions')    ); ?>                             
            </td>                                                    
      </tr>      
         <tr>
          <td>
          Academics - Awards / Honors  
          </td>
          <td>
    <?php  
    if ($awardProfileArray !== NULL) 
    foreach ($awardProfileArray as $awardProfile): ?>    
    
        <b><?php echo $awardProfile->award_name.": "; ?> </b>
        <?php echo ($awardProfile->region !== '' && $awardProfile->region !== NULL) 
                    ? AwardProfile::$RegionArray[$awardProfile->region] : ''.", "; ?> 
        <?php echo ($awardProfile->year !== '' && $awardProfile->year !== NULL) 
                    ? AwardProfile::$AwardDateArray[$awardProfile->year] : ''."), "; ?> 
        
    
    <?php endforeach; else echo "None"; ?>  
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/awardshonors')    ); ?>                             
            </td>                                                    
      </tr>
         <tr>
          <td>
          Extracurriculars - Clubs
          </td>
          <td>
              
    <?php  
        if ($activityProfileArray !== NULL) 
    foreach ($activityProfileArray as $activityProfile): ?> 
       <b><?php echo $activityProfile->name.": "; ?> </b>
        <?php echo ($activityProfile->activity_type_id !== '' && $activityProfile->activity_type_id !== NULL) 
                    ? $activityProfile->activityType->name : ''; ?>               
        <?php echo ActivityProfile::convertLeadership($activityProfile->leadership).", "; ?> 
        
    <?php endforeach; else echo "None"; ?>    
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/clubs')    ); ?>                             
            </td>                                                    
      </tr>  
         <tr>
          <td>
          Extracurriculars - Sports
          </td>
          <td>
    <?php if ($sportProfileArray !== NULL) 
            foreach ($sportProfileArray as $sportProfile): ?>    
    
        <b><?php echo ($sportProfile->sport_id !== '' && $sportProfile->sport_id !== NULL) 
                    ? $sportProfile->sport->name : ''; ?>  </b>
        <?php echo ": ".SportProfile::convertYears($sportProfile->year_begin)." to "; ?> 
        <?php echo SportProfile::convertYears($sportProfile->year_end).", "; ?>
        <?php echo SportProfile::convertLevel($sportProfile->level).", "; ?> 
        <?php echo SportProfile::convertLeader($sportProfile->leadership).", "; ?> 

    <?php endforeach; else echo "None"; ?>    
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/sports')    ); ?>                             
            </td>                                                    
      </tr>        
         <tr>
          <td>
          Extracurriculars - Music
          </td>
          <td>
    <?php  
    if ($musicProfileArray !== NULL) 
    foreach ($musicProfileArray as $musicProfile): ?>    
    
   <b> <?php echo MusicProfile::convertMusic($musicProfile->music).": "; ?> </b>
       <?php echo MusicProfile::convertYears($musicProfile->year_begin)." to "; ?> 
       <?php echo MusicProfile::convertYears($musicProfile->year_end).", "; ?> 
       <?php echo MusicProfile::convertSchoolMusic($musicProfile->school_orchband).", "; ?> 
    
    <?php endforeach;else echo "None";  ?>
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/music')    ); ?>                             
            </td>                                                    
      </tr>        
          <tr>
          <td>
          Extracurriculars - Work
          </td>
          <td>
    <?php      
       if ($workProfileArray !== NULL) 
        foreach ($workProfileArray as $workProfile): ?>    
    
        <b> <?php echo $workProfile->name.": "; ?> </b>
        <?php echo WorkProfile::convertWork($workProfile->work_type).", "; ?> 
        <?php echo WorkProfile::convertYears($workProfile->year_begin)." to "; ?> 
        <?php echo WorkProfile::convertYears($workProfile->year_end).", "; ?> 
        <?php echo WorkProfile::convertTitle($workProfile->title),"; "; ?>  
    
    <?php endforeach;else echo "None";  ?>   

            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/work')    ); ?>                             
            </td>                                                    
      </tr>       
         <tr>
          <td>
          Extracurriculars - Volunteer
          </td>
          <td>
    <?php
     if ($volunteerProfileArray !== NULL) 
    foreach ($volunteerProfileArray as $volunteerProfile): ?>    
    
        <b><?php echo $volunteerProfile->name.": "; ?> </b>
        <?php echo VolunteerProfile::convertVolunteer($volunteerProfile->volunteertype_id).", "; ?> 
        <?php echo VolunteerProfile::convertYears($volunteerProfile->year_begin)." to "; ?> 
        <?php echo VolunteerProfile::convertYears($volunteerProfile->year_end).", "; ?> 
        <?php echo VolunteerProfile::convertLeader($volunteerProfile->leadership)."; "; ?> 
    
    
    <?php endforeach; 
        else echo "None";   ?> 
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/volunteer')    ); ?>                             
            </td>                                                    
      </tr>        
         <tr>
          <td>
          Extracurriculars - Research
          </td>
          <td>
    <?php
     if ($researchProfileArray !== NULL) 
    foreach ($researchProfileArray as $researchProfile): ?>    
   
    
        <b><?php echo $researchProfile->subject.": "; ?> </b>
        <?php echo ($researchProfile->field !== '' 
                    && $researchProfile->field !== NULL) 
                    ? $researchProfile->major->name : ''; ?> 
        <?php echo ", ".ResearchProfile::convertYears($researchProfile->year_begin)." to "; ?>
        <?php echo ResearchProfile::convertYears($researchProfile->year_end); ?> 

    <?php endforeach; 
        else echo "None";   ?> 
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/extracurricular')    ); ?>                             
            </td>                                                    
      </tr>        
         <tr>
          <td>              
          Extracurriculars - Summer
          </td>
          <td>
    <?php
     if ($summerProfileArray !== NULL) 
     foreach ($summerProfileArray as $summerProfile): ?>    
    
        <?php echo $summerProfile->name.": "; ?> 
        <?php echo SummerProfile::convertSummer($summerProfile->summer_id).", "; ?> 
        <?php echo SummerProfile::convertSummerDate($summerProfile->summer_date); ?> 
        
    
    <?php endforeach;  
        else echo "None";   ?> 
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/extracurricular')    ); ?>                             
            </td>                                                    
      </tr>        
         <tr>
          <td>              
          Extracurriculars - Other
          </td>
          <td>
    <?php    if ($otherProfileArray !== NULL) 
        foreach ($otherProfileArray as $otherProfile): ?>    
    
        <b><?php echo $otherProfile->name.": "; ?> </b>
        <?php echo OtherProfile::convertYears($otherProfile->year_begin)." to "; ?> 
        <?php echo OtherProfile::convertYears($otherProfile->year_end)."; "; ?>       
    
    <?php endforeach;else echo "None";  ?>  
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/extracurricular')    ); ?>                             
            </td>                                                    
      </tr>        
         <tr>
          <td>
          Essays
          </td>
          <td>
<?php $essay = EssayProfile::getEssayByUser(); 	?>	
	
		<?php foreach($essay as $e){  ?>
			<?php if(!empty($e->mime)){ ?>
		
			<?php  echo ($e->name).", "; ?>
	
			<?php } ?>
		<?php } ?>

	
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/modEssays')    ); ?>                             
            </td>                                                    
      </tr>        
      
      
      
</table>



        <div class="span-3">	
                    <div class="pbuttons">
		<?php echo CHtml::Button('Previous',array('onclick'=>'window.location="index.php?r=profileinfo/modEssays"')); ?>
            </div>
        </div>
        <div class="span-3 last">
            <div class="buttons">
                <?php $skip= CHtml::submitButton('Next');
    echo CHtml::link($skip, array('profileinfo/consult')) ?>
	</div>
        </div>
<br></br><br></br><br></br><br></br>