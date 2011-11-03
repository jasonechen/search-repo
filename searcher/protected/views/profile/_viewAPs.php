<p>
<ul>AP Scores:
    <?php 
    foreach ($apProfileArray as $apProfile) {
          echo '<li> ';
          echo $apProfile->ap->name.": ";
          echo $apProfile->score;
          echo '</li>';
    }

    ?>
</p>
</ul>
