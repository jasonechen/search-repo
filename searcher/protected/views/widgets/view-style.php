<?php
    /**
     * @var int $viewStyle
     * @var string $viewStyleUrl
     */
?>

    <label for="view-style-selector">View:</label>
    <select onchange="this.options[this.selectedIndex].onclick()" id="view-style-selector">

        <?php if($viewStyle == 'thumbnail'): ?>

            <option selected>Thumbnail</option>
            <option onclick="location.href='<?php echo $viewStyleUrl; ?>1';">Grid</option>

        <?php endif; ?>

        <?php if($viewStyle == 'grid'): ?>

            <option onclick="location.href='<?php echo $viewStyleUrl; ?>0';">Thumbnail</option>
            <option selected>Grid</option>

        <?php endif; ?>

    </select>