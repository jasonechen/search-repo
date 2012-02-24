<p>
<ul>Essays:
    <?php 
    foreach ($essayProfileArray as $essayProfile) {
          echo '<li> ';
          echo $essayProfile->name.": ";
          echo $essayProfile->data;
          echo '</li>';
    }

    ?>
</p>
</ul>
