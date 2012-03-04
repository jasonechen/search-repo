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
     */
?>
<div id="search-results">

    <div class="clearfix">
        SEARCH CRITERIA: Harvard University AND Male AND New Jersey AND 600-2400 SAT I Combined Score.
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
    <?php
    if($valid)
    {
        if($viewStyle == 'grid')
        {
            $this->renderPartial('/widgets/grid-view',
                array(
                     'dataProvider' => $dataProvider,
                     'model' => $model,
                )
            );
        }
        else
        {
            $this->widget('zii.widgets.CListView',
                array(
                     'dataProvider' => $dataProvider,
                     'itemView' => '/widgets/thumbnail-view',
                )
            );
        }
    }
    else
    {
        echo '<br/><br/>You didn\'t enter any search criteria. Please enter some terms or select some criteria.';
    }
    ?>

    <br/><br/>
</div>

<style type="text/css">
    .pager {
        clear: both;
    }
</style>