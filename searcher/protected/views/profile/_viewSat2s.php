<p>
<ul>SAT2 Scores:
    <?php 
    foreach ($sat2ProfileArray as $sat2Profile) {
          echo '<li> ';
          echo $sat2Profile->sat2->subject.": ";
          echo $sat2Profile->score;
          echo '</li>';
    }

    ?>
</p>
</ul>
