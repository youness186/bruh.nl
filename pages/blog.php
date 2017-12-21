<?php
    $blog = new Blog();
    $limit = "999";
?>
<ul class="list-group">
    <?= $blog->ShowArticlesFE($limit); ?>
</ul>