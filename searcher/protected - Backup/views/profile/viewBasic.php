<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'View Basic Info',
);

$this->setViewProfileMenu($profileID);

?>

<h1>View Profile # <?php echo $profileID; ?></h1>
<h2>Basic Info</h2>

<?php
   
        $this->renderPartial('_viewBasic',array(
                                               'basicProfile' => $basicProfile,
                                               'personalProfile' => $personalProfile,
                                               'profileID' => $profileID,
                                          ));
  
?>
