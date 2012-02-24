<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'View Academics',
);

$this->setViewProfileMenu($profileID);

?>

<h1>View Profile # <?php echo $profileID; ?></h1>
<h2>Academics</h2>



<?php
    if ($academicProfile!==null){
        $this->renderPartial('_viewGrades',array('academicProfile'=>$academicProfile, 'profileID' => $profileID, 'numberFormatter'=>$numberFormatter));
    }
?>
</br>
<?php
    if ($subjectProfileArray!==null){
        $this->renderPartial('_viewSubjects',array('subjectProfileArray'=>$subjectProfileArray));
    }
?>
</br>
<?php
    if ($competitionProfileArray!==null){
        $this->renderPartial('_viewCompetitions',array('competitionProfileArray'=>$competitionProfileArray));
    }
?>
</br>
<?php
    if ($awardProfileArray!==null){
        $this->renderPartial('_viewAwards',array('awardProfileArray'=>$awardProfileArray));
    }
?>
