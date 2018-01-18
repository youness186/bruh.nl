<?php
    $blog = new FEBlog();
    $limit = "999";
?>
<ul class="list-group">
    <?= $blog->ShowArticlesFE($limit); ?>
</ul>