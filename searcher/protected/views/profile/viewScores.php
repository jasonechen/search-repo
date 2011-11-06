<?php
$this->breadcrumbs=array(
	'Profile'=>array('index'),
	'View Scores',
);

$this->setViewProfileMenu($profileID);

?>

<h1>View Profile # <?php echo $profileID; ?></h1>
<h2>Scores</h2>

<?php
    if ($scoreProfile!==null){
        $this->renderPartial('_viewScores',array('scoreProfile'=>$scoreProfile, 'profileID' => $profileID));
    }
?>
<?php
    if ($sat2ProfileArray!==null){
        $this->renderPartial('_viewSat2s',array('sat2ProfileArray'=>$sat2ProfileArray, 'profileID' => $profileID));
    }
?>