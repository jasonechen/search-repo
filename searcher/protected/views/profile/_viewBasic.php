
<ul> University Info:
    <li> Current University: <?php echo $basicProfile->getCurrUniversityName(); ?></li>
     <li> First University: <?php echo $basicProfile->getFirstUniversityName(); ?></li>
</ul>

<p> Race: <?php echo $basicProfile->race->name ?> </p>

<p> Gender: <?php echo $basicProfile->gender=='M' ? 'Male':'Female' ?> </p>

<h2> User rating</h2>

    <?php
        $this->widget('application.components.widgets.StarRatingWidget',
                      array(
                          'user_id' => $profileID,
                          'enableComments' => true,
                          'enableCommentsId' => '#rating-comment',
                          'enableCommentsSubmitId' => '#rating-submit',
                      )
        );
    ?>