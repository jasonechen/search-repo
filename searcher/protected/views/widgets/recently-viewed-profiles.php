<?php
    /**
     * @var CController $this
     * @var array $profiles
     */
?>

<?php if(!empty($profiles)): ?>

    <ol>

        <?php foreach($profiles as $profileId): ?>

            <?php $profile = BasicProfile::model()->findByPk($profileId); ?>

            <?php if(!empty($profile)): ?>

                <li>
                    <?php
                        echo CHtml::link
                        (
                            $profile->getFirstUniversityName() . ' ' . ($profile->gender == 'M' ? 'Male' : 'Female'),
                            $this->createUrl(
                                'profile/viewProfile',
                                array(
                                     'profileID' => $profileId,
                                )
                            )
                        );
                    ?>
                </li>

            <?php endif; ?>

        <?php endforeach; ?>

    </ol>



<?php endif; ?>