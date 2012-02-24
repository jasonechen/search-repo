<?php
class RbacCommand extends CConsoleCommand
{
   
    private $_authManager;
 
    public function getHelp()
	{
		return <<<EOD
USAGE
  rbac

DESCRIPTION
  This command generates an initial RBAC authorization hierarchy.

EOD;
	}

	
	/**
	 * Execute the action.
	 * @param array command line parameters specific for this command
	 */
	public function run($args)
	{
		//ensure that an authManager is defined as this is mandatory for creating an auth heirarchy
		if(($this->_authManager=Yii::app()->authManager)===null)
		{
		    echo "Error: an authorization manager, named 'authManager' must be con-figured to use this command.\n";
			echo "If you already added 'authManager' component in application con-figuration,\n";
			echo "please quit and re-enter the yiic shell.\n";
			return;
		}  
		
		//provide the oportunity for the use to abort the request
		echo "This command will create three roles: Owner, Member, and Reader and the following premissions:\n";
		echo "create, read, update and delete user\n";
		echo "create, read, update and delete project\n";
		echo "create, read, update and delete issue\n";
		echo "Would you like to continue? [Yes|No] ";
	   
	    //check the input from the user and continue if they indicated yes to the above question
	    if(!strncasecmp(trim(fgets(STDIN)),'y',1)) 
		{
		     //first we need to remove all operations, roles, child relationship and as-signments
			 $this->_authManager->clearAll();

                         
			 //create the lowest level operations for users
			 $this->_authManager->createOperation("readUser","read user profile in-formation"); 
			 $this->_authManager->createOperation("updateUser","update a users in-formation"); 
			 $this->_authManager->createOperation("deleteUser","remove a user from a project"); 

			 $this->_authManager->createOperation("modBasic","modBasic"); 
                         $this->_authManager->createOperation("modScores","modScores");
                         $this->_authManager->createOperation("modSubjects","modSubjects");
                         $this->_authManager->createOperation("modSat2","modSat2");
                         $this->_authManager->createOperation("modSports","modSports");
                         $this->_authManager->createOperation("modAp","modAp");
                         $this->_authManager->createOperation("modExtracurriculars","modExtracurriculars");
                         $this->_authManager->createOperation("modCompetitions","modCompetitions");
                         $this->_authManager->createOperation("modEssays","modEssays");
                         
                         $this->_authManager->createOperation("deleteSubject","deleteSubject");
                         $this->_authManager->createOperation("deleteSat2","deleteSat2");
                         $this->_authManager->createOperation("deleteSport","deleteSport");
                         $this->_authManager->createOperation("deleteAp","deleteAp");
                         $this->_authManager->createOperation("deleteExtracurricular","deleteExtracurricular");
                         $this->_authManager->createOperation("deleteCompetition","deleteCompetition");
                         $this->_authManager->createOperation("deleteEssay","deleteEssay");
                         
                         
                         $this->_authManager->createOperation("viewEssay","viewEssay");
                         
                         $this->_authManager->createOperation("viewLevel1","viewLevel1");
                         $this->_authManager->createOperation("viewLevel2","viewLevel2");
                         $this->_authManager->createOperation("viewLevel3","viewLevel3");

                         $this->_authManager->createOperation("deleteProfile","deleteProfile");
                         

                         $role=$this->_authManager->createRole("user"); 
			 $role->addChild("readUser");
			 $role->addChild("updateUser");  
                         
			 $role=$this->_authManager->createRole("buyerLevel1"); 
			 $role->addChild("user");
			 $role->addChild("viewLevel1"); 

                         $role=$this->_authManager->createRole("buyerLevel2"); 
			 $role->addChild("user");
			 $role->addChild("viewLevel2"); 
                         
                         $role=$this->_authManager->createRole("buyerLevel3"); 
			 $role->addChild("user");
			 $role->addChild("viewLevel3"); 
                         
                         
			 $role=$this->_authManager->createRole("seller"); 
                         $role->addChild("user");
			 $role->addChild("buyerLevel1"); 
                         $role->addChild("buyerLevel2"); 
                         $role->addChild("buyerLevel3"); 
			 $role->addChild("modBasic"); 
                         $role->addChild("modScores");
                         $role->addChild("modSubjects");
                         $role->addChild("modSat2");
                         $role->addChild("modSports");
                         $role->addChild("modAp");
                         $role->addChild("modExtracurriculars");
                         $role->addChild("modCompetitions");
                         $role->addChild("modEssays");
                         
                         $role->addChild("deleteSubject");
                         $role->addChild("deleteSat2");
                         $role->addChild("deleteSport");
                         $role->addChild("deleteAp");
                         $role->addChild("deleteExtracurricular");
                         $role->addChild("deleteCompetition");
                         $role->addChild("deleteEssay");
                         
                         
                         $role->addChild("viewEssay","viewEssay");
                         
			 //create the owner role, and add the appropriate permissions, as well as both the reader and member roles as children
			 $role=$this->_authManager->createRole("admin"); 
                         $role->addChild("user");
			 $role->addChild("buyerLevel1"); 
                         $role->addChild("buyerLevel2"); 
                         $role->addChild("buyerLevel3"); 
			 $role->addChild("seller");    
			 $role->addChild("deleteUser");  
			 $role->addChild("deleteProfile"); 	
		
		     //provide a message indicating success
		     echo "Authorization hierarchy successfully generated.";
        } 
    }
}
