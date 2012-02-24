<h2>Basic Info</h2>

<?php
   
    $this->renderPartial('_viewBasic',array(
                                           'basicProfile' => $basicProfile,
                                           'personalProfile' => $personalProfile,
                                           'otherSchoolAdmitProfileArray' => $otherSchoolAdmitProfileArray,
                                           'languageProfileArray' => $languageProfileArray,
                                           'profileID' => $profileID,
                                      ));

?>
