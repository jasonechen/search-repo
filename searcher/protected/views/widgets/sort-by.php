<?php
    /**
     * @var int $sortBy
     * @var string $sortByUrl
     */
?>

    <div class="phrase">Sort by:</div>

<?php if($sortBy == 0): ?>

    <a href="<?php echo $sortByUrl; ?>2" class="sort-by-button">Gender</a>
    <a href="<?php echo $sortByUrl; ?>1" class="sort-by-button">Home state</a>
    <a href="<?php echo $sortByUrl; ?>3" class="sort-by-button">Home country</a>
    <a href="<?php echo $sortByUrl; ?>0" class="sort-by-button active">School</a>

<?php elseif($sortBy == 1): ?>

    <a href="<?php echo $sortByUrl; ?>2" class="sort-by-button">Gender</a>
    <a href="<?php echo $sortByUrl; ?>1" class="sort-by-button active">Home state</a>
    <a href="<?php echo $sortByUrl; ?>3" class="sort-by-button">Home country</a>
    <a href="<?php echo $sortByUrl; ?>0" class="sort-by-button">School</a>

<?php elseif($sortBy == 2): ?>

    <a href="<?php echo $sortByUrl; ?>2" class="sort-by-button active">Gender</a>
    <a href="<?php echo $sortByUrl; ?>1" class="sort-by-button">Home state</a>
    <a href="<?php echo $sortByUrl; ?>3" class="sort-by-button">Home country</a>
    <a href="<?php echo $sortByUrl; ?>0" class="sort-by-button">School</a>

<?php elseif($sortBy == 3): ?>

    <a href="<?php echo $sortByUrl; ?>2" class="sort-by-button">Gender</a>
    <a href="<?php echo $sortByUrl; ?>1" class="sort-by-button">Home state</a>
    <a href="<?php echo $sortByUrl; ?>3" class="sort-by-button active">Home country</a>
    <a href="<?php echo $sortByUrl; ?>0" class="sort-by-button">School</a>

<?php else: ?>

    <a href="<?php echo $sortByUrl; ?>2" class="sort-by-button">Gender</a>
    <a href="<?php echo $sortByUrl; ?>1" class="sort-by-button">Home state</a>
    <a href="<?php echo $sortByUrl; ?>3" class="sort-by-button">Home country</a>
    <a href="<?php echo $sortByUrl; ?>0" class="sort-by-button active">School</a>

<?php endif; ?>