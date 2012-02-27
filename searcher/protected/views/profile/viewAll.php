<?php
    $this->breadcrumbs=array(
            'Profile'=>array('index'),
            'View Profile',
    );

    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.cookie.js');
$this->setAdminMenu();
?>

<?php echo CHtml::link('<--Back to Purchased Profiles', array('profile/browseMine')); ?>
<br></br>

<h2>Profile # <?php echo $profileID; ?></h2>

Overall Rating: <br/>
<?php
    $this->widget('application.components.widgets.StarRatingWidget',
                  array(
                       'cssClassName' => 'jRatingForViewedUser',
                       'user_id' => $buyProfileForm->profile_id,
                       'enableComments' => false,
                       'isDisabled' => true,
                  )
    );
?>



<?php if(!$disableRating): ?>

    <?php
        echo CHtml::link('Rate this profile', '#', array('onclick' => '$("#rate-user-dialog").dialog("open"); return false;'));
    ?>

    <?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog',
                       array(
                            'id' => 'rate-user-dialog',
                            'options' => array(
                                'title' => 'Rate Profile',
                                'autoOpen' => false,
                                'modal' => true,
                                'width' => 500,
                                'height' => 250,
                            ),
                       )
        );
    ?>
    <br/>
    <?php
        $this->widget('application.components.widgets.StarRatingWidget',
                          array(
                              'user_id' => $buyProfileForm->profile_id,
                              'enableComments' => true,
                              'enableCommentsId' => '#rating-comment',
                              'enableCommentsSubmitId' => '#rating-submit',
                              'noStartingRate' => true,
                          )
        );
    ?>

    <?php $this->endWidget();?>

<?php endif; ?>


    <br> </br>

<?php

    $myTabsArray = array();
    if($profileAccessArray['l1']==1) {
        $myTabsArray['Basic'] = $this->renderPartial('_viewAllBasic',
                                                     array('profileID' => $profileID,
                                                            'basicProfile' => $basicProfile,
                                                            'personalProfile' => $personalProfile,
                                                            'otherSchoolAdmitProfileArray' => $otherSchoolAdmitProfileArray,
                                                            'languageProfileArray' => $languageProfileArray,                                    
                                                        ),true
                                             );
        $myTabsArray['Scores'] = $this->renderPartial('_viewAllScores',
                                                     array('profileID'=>$profileID,
                                                            'scoreProfile'=>$scoreProfile,
                                                            'sat2ProfileArray'=>$sat2ProfileArray,
                                                            'apProfileArray'=>$apProfileArray,
                                                        ),true
                                             );
        $myTabsArray['Academics'] = $this->renderPartial('_viewAllAcademics',
                                                        array('profileID'=>$profileID,
                                                        'academicProfile'=>$academicProfile,
                                                        'subjectProfileArray'=>$subjectProfileArray,
                                                        'competitionProfileArray'=>$competitionProfileArray,
                                                        'awardProfileArray'=>$awardProfileArray,
                                                        'numberFormatter'=>$numberFormatter,
                                                        ),true
                                             );
    }
    else{
        $myTabsArray['Basic'] = $this->renderPartial('_viewNoAccess',
                                                    array('profileID'=>$profileID,
                                                    ),true
                                                );
        $myTabsArray['Scores'] = $this->renderPartial('_viewNoAccess',
                                                    array('profileID'=>$profileID,
                                                    ),true
                                                    );
        $myTabsArray['Academics'] = $this->renderPartial('_viewNoAccess',
                                                    array('profileID'=>$profileID,
                                                    ),true
                                                    );
    }
    if($profileAccessArray['l2']==1) {
        $myTabsArray['Extracurriculars'] = $this->renderPartial('_viewAllExtracurriculars',
                                                array('profileID'=>$profileID,
                                                    'activityProfileArray'=>$activityProfileArray,
                                                    'sportProfileArray'=>$sportProfileArray,
                                                    'musicProfileArray'=>$musicProfileArray,
                                                    'volunteerProfileArray'=>$volunteerProfileArray,
                                                    'workProfileArray'=>$workProfileArray,
                                                    'researchProfileArray'=>$researchProfileArray,
                                                    'summerProfileArray'=>$summerProfileArray,
                                                    'otherProfileArray'=>$otherProfileArray, 
                                                ),true
                                     );
        
    }
    else{
        $myTabsArray['Extracurriculars'] = $this->renderPartial('_viewNoAccess',
                                                    array('profileID'=>$profileID,
                                                ),true
                                     ); 
    }
    if($profileAccessArray['l3']==1) {
        $myTabsArray['Essays'] = $this->renderPartial('_viewAllEssays',
                                                        array('profileID'=>$profileID,
                                                              'essayProfileArray'=>$essayProfileArray,
                                                        ),true
                                             );
    }
    else{
        $myTabsArray['Essays'] = $this->renderPartial('_viewNoAccess', array('profileID'=>$profileID,
                                                        ),true
                                             );
    }

    $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs'=>$myTabsArray,
        'options'=>array(
        'collapsible'=>false,
        'selected'=>"js: $.cookie($profileCookieID) || 0 ",
        'select'=>"js:function(event, ui) {
        $.cookie($profileCookieID, ui.index); 
        }",
    ),
    'htmlOptions'=>array(
        'style'=>'width:810px;'
    ),
));

?>
<br></br><br></br>