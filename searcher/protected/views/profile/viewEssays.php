<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'View Essays',
);

$this->setViewProfileMenu($profileID);

?>

<h1>View Profile # <?php echo $profileID; ?></h1>
<h2>Essays</h2>

<?php
    if ($essayProfileArray!==null){
        $this->renderPartial('_viewEssays',array('essayProfileArray'=>$essayProfileArray));
    }
?>