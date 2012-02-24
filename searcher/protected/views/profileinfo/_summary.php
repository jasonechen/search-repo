<?php 	$this->progressbar('Summary','summary'); ?>
<div class="sub-head-profile">Summary </div>

<p> Please review your profile to make any corrections/modifications </p>


<table width=750px" height="700px" >
      <col width="200px" />
      <col width="450px" />
      <col width="30px" />
      <tr>
          <td>
          Personal Info - Basic    
          </td>
          <td>
        <?php ?>
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/basic')    ); ?>                             
            </td>                                                    
      </tr>
      <tr>
          <td>
          Personal Info - Demographics    
          </td>
          <td>
        <?php ?>
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
        <?php ?>
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
        <?php ?>
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
        <?php ?>
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/languages')    ); ?>                             
            </td>                                                    
      </tr>     
      <tr>
          <td>
          Test Scores - SAT I    
          </td>
          <td>
        <?php ?>
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
        <?php ?>
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
        <?php ?>
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
        <?php ?>
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
        <?php ?>
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
        <?php ?>
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
        <?php ?>
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
        <?php ?>
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
        <?php ?>
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
        <?php ?>
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
        <?php ?>
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
        <?php ?>
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
        <?php ?>
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
        <?php ?>
            </td>        
            <td>    
            <?php echo CHtml::link('Edit',array('profileinfo/volunteer')    ); ?>                             
            </td>                                                    
      </tr>        
         <tr>
          <td>
          Extracurriculars - Other
          </td>
          <td>
        <?php ?>
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
        <?php ?>
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