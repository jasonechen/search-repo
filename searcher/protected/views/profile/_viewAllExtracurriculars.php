<h2>Extracurriculars</h2>

<?php
    if ($activityProfileArray!==null){
        $this->renderPartial('_viewActivities',array('activityProfileArray'=>$activityProfileArray));
    }
?>
<br>
<?php
    if ($sportProfileArray!==null){
        $this->renderPartial('_viewSports',array('sportProfileArray'=>$sportProfileArray));
    }
?>
<br>
<?php
    if ($musicProfileArray!==null){
        $this->renderPartial('_viewMusic',array('musicProfileArray'=>$musicProfileArray));
    }
?>

<?php
    if ($volunteerProfileArray!==null){
        $this->renderPartial('_viewVolunteer',array('volunteerProfileArray'=>$volunteerProfileArray));
    }
?>
<br>
<?php
    if ($workProfileArray!==null){
        $this->renderPartial('_viewWork',array('workProfileArray'=>$workProfileArray));
    }
?>
<br>
<?php
    if ($researchProfileArray!==null){
        $this->renderPartial('_viewResearch',array('researchProfileArray'=>$researchProfileArray));
    }
?>
<br>
<?php
    if ($summerProfileArray!==null){
        $this->renderPartial('_viewSummer',array('summerProfileArray'=>$summerProfileArray));
    }
?>
<br>
<?php
    if ($otherProfileArray!==null){
        $this->renderPartial('_viewOther',array('otherProfileArray'=>$otherProfileArray));
    }
?>
