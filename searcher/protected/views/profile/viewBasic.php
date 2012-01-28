<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'View Basic Info',
);

$this->setViewProfileMenu($profileID);

?>

<h2>Profile # <?php echo $profileID; ?>: Basic Info</h2>


<?php
   
        $this->renderPartial('_viewBasic',array(
                                               'basicProfile' => $basicProfile,
                                               'personalProfile' => $personalProfile,
                                               'profileID' => $profileID,
                                          ));
  
?>
