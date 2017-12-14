<?php
$blog = new Blog();
$limit = "3";
?>
<div class="row">
    <div class="col">div 1</div>
    <div class="col">div 2</div>
    <div class="col">div 3</div>
    <div class="col">
        <div class="col"><?= $blog->ShowArticlesFE($limit); ?></div>
        <div class="col"><a class="twitter-timeline" data-lang="nl" data-height="200" data-tweet-limit="3" data-theme="light" data-link-color="#2B7BB9" href="https://twitter.com/TwitterDev/timelines/539487832448843776?ref_src=twsrc%5Etfw"></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> </div>
    </div>
</div>