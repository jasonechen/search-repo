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
<?php
    if ($apProfileArray!==null){
        $this->renderPartial('_viewAPs',array('apProfileArray'=>$apProfileArray, 'profileID' => $profileID));
    }
?>