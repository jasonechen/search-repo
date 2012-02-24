<h2>Essays</h2>

<?php
    if ($essayProfileArray!==null){
        $this->renderPartial('_viewEssays',array('essayProfileArray'=>$essayProfileArray));
    }
?>