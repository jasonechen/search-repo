<?php
    /**
     * @var boolean $valid
     * @var CActiveDataProvider $dataProvider
     * @var BasicProfile $model
     * @var string $viewStyle
     * @var int $pageSize
     * @var int $sortBy
     * @var string $pageSizeUrl
     * @var string $viewStyleUrl
     * @var string $sortByUrl
     * @var string $searchCriteriaText
     */
?>
<div id="search-results">

    <div class="clearfix">
        <?php echo $searchCriteriaText; ?>
    </div>

    <div class="search-bar-page-size">
        <?php
            $this->renderPartial('/widgets/items-per-page',
                array(
                     'pageSize' => $pageSize,
                     'pageSizeUrl' => $pageSizeUrl,
                )
            );
        ?>
    </div>

    <div class="search-bar-grey clearfix">
        <div class="search-bar-sort-by">
            <?php
                $this->renderPartial('/widgets/sort-by',
                    array(
                         'sortBy' => $sortBy,
                         'sortByUrl' => $sortByUrl,
                    )
                );
            ?>
        </div>
        <div class="search-bar-view-style">
            <?php
                $this->renderPartial('/widgets/view-style',
                    array(
                         'viewStyle' => $viewStyle,
                         'viewStyleUrl' => $viewStyleUrl,
                    )
                );
            ?>
        </div>
    </div>
    <h4b>
    <?php    
        echo '<br/><br/>Please enter a school name above or select some filter criteria to begin your search.';    
    ?>
    </h4b>
    <br/><br/>
</div>

<style type="text/css">
    .pager {
        clear: both;
    }
</style>