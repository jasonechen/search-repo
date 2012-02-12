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
    <a href="<?php echo $sortByUrl; ?>0" class="sort-by-button active">School</a>

<?php endif; ?>

<?php if($sortBy == 1): ?>

    <a href="<?php echo $sortByUrl; ?>2" class="sort-by-button">Gender</a>
    <a href="<?php echo $sortByUrl; ?>1" class="sort-by-button active">Home state</a>
    <a href="<?php echo $sortByUrl; ?>0" class="sort-by-button">School</a>

<?php endif; ?>

<?php if($sortBy == 2): ?>

    <a href="<?php echo $sortByUrl; ?>2" class="sort-by-button active">Gender</a>
    <a href="<?php echo $sortByUrl; ?>1" class="sort-by-button">Home state</a>
    <a href="<?php echo $sortByUrl; ?>0" class="sort-by-button">School</a>

<?php endif; ?>