<?php
    /**
     * @var int $viewStyle
     * @var string $viewStyleUrl
     */
?>


    <select onchange="this.options[this.selectedIndex].onclick()">

        <?php if($viewStyle == 'thumbnail'): ?>

            <option selected>Thumbnail</option>
            <option onclick="location.href='<?php echo $viewStyleUrl; ?>1';">Grid</option>

        <?php endif; ?>

        <?php if($viewStyle == 'grid'): ?>

            <option onclick="location.href='<?php echo $viewStyleUrl; ?>0';">Thumbnail</option>
            <option selected>Grid</option>

        <?php endif; ?>

    </select>