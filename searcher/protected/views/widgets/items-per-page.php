<?php
    /**
     * @var int $pageSize
     * @var string $pageSizeUrl
     */
?>

    Items per page:

    <?php echo ($pageSize == 12) ? '12' : '<a href="' . $pageSizeUrl . '12">12</a>'; ?>
    <?php echo ($pageSize == 24) ? '24' : '<a href="' . $pageSizeUrl . '24">24</a>'; ?>
    <?php echo ($pageSize == 36) ? '36' : '<a href="' . $pageSizeUrl . '36">36</a>'; ?>
    <?php echo ($pageSize == 48) ? '48' : '<a href="' . $pageSizeUrl . '48">48</a>'; ?>