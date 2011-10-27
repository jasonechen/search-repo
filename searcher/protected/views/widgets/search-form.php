<form action="<?php echo $this->createUrl('search/index');?>" method="post">
    <label for="search_q">Search for:</label>
    <input type="text" id="search_q" name="search_q" size="30" value="<?php echo $search_q; ?>" />
    <input type="submit" value="Go" />
</form>