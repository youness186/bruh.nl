<?php
    $blog = new Blog();
    $limit = "999";
?>
<ul>
    <?= $blog->ShowArticlesFE($limit); ?>
</ul>