    <?php $this->beginWidget('zii.widgets.CPortlet', array('title' => 'Profile Ratings')); ?>

    <ul>
        <?php foreach($comments as $comment): ?>

            <?php if(!empty($comment->comment)): ?>

                <li>
                    <div class="jRatingComments" data="<?php echo $comment['rating']; ?>_1<?php echo $comment->id; ?>" style="float:left;"></div>
                    <em style="padding-left:15px;">rated by <?php echo $comment->userIdCreatedBy->username; ?></em><br/>
                    <?php echo $comment->comment; ?>
                </li>

            <?php endif; ?>

        <?php endforeach; ?>
    </ul>
    <?php $this->endWidget(); ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".jRatingComments").jRating( {
                type: 'small',
                isDisabled: true,
                length : 5,
                bigStarsPath: '<?php echo $bigStarsPath; ?>',
                smallStarsPath: '<?php echo $smallStarsPath; ?>',
                rateMax: 5
            });
        });
    </script>