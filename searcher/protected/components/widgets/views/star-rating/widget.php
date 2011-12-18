<?php
    /**
     * @var string $cssClassName
     * @var string $phpPath
     * @var boolean $enableComments
     * @var string $enableCommentsId
     * @var string $enableCommentsSubmitId
     * @var int $forUser
     * @var int $byUser
     * @var boolean $isDisabled
     * @var boolean $smallStars
     * @var array $data
     * @var boolean $showOnlyComments
     */
?>

<?php if(!$showOnlyComments): ?>

    <div class="<?php echo $cssClassName; ?>" data="<?php echo $data['averageRating']; ?>_1"></div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".<?php echo $cssClassName; ?>").jRating( {
                phpPath: '<?php echo $phpPath; ?>',
                csrfToken: '<?php echo Yii::app()->getRequest()->getCsrfToken(); ?>',
                <?php if($enableComments): ?>
                    enableComments: true,
                    enableCommentsId: '<?php echo $enableCommentsId; ?>',
                    enableCommentsSubmitId: '<?php echo $enableCommentsSubmitId; ?>',
                    forUser: '<?php echo $forUser; ?>',
                    byUser: '<?php echo $byUser; ?>',
                <?php endif; ?>
                <?php if($isDisabled): ?>
                    isDisabled: true,
                <?php endif; ?>
                <?php if($smallStars): ?>
                    type:'small',
                <?php endif; ?>
                length : 5,
                bigStarsPath: '<?php echo $data['bigStarsPath']; ?>',
                smallStarsPath: '<?php echo $data['smallStarsPath']; ?>',
                rateMax: 5,
                step: true
            });
        });
    </script>

<?php else: ?>

    <?php if($enableComments): ?>
        <br/>

        <?php if(!$showOnlyComments): ?>

            <div class="form">
                <div class="row">
                    <label for="rating-comment">Your comment to user rating</label>
                    <input type="text" id="rating-comment"/>
                    <input type="submit" id="rating-submit" value="Submit your vote" style="font-size:11px;"/>
                </div>
            </div>

        <?php endif; ?>

        <br/>
        <?php if ($data['ratingObject'] !== NULL) $this->render('star-rating/_comments',
            array(
                 'comments' => $data['ratingObject'],
                 'bigStarsPath' => $data['bigStarsPath'],
                 'smallStarsPath' => $data['smallStarsPath'],
            )
        );
        ?>

    <?php endif; ?>

<?php endif; ?>