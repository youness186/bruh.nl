<?php
$blog = new Blog();
$limit = "3";
//$packages = new Package();
//$packages->readPackages();
?>
<div class="row">
    <div class="col">
        <p class="package package_mt">
            <a href="/betaalpagina?packages=<?= $packages[0]['package_id']; ?>"><?= $packages[0]['name']; ?></a>
            <br>
            PRIJS: <?= $packages[0]['price']; ?>
        </p>
    </div>
    <div class="col">
        <p class="package">
            <a href="/betaalpagina?packages=<?= $packages[1]['package_id']; ?>"><?= $packages[1]['name']; ?></a>
            <br>
            PRIJS: <?= $packages[1]['price']; ?>
        </p>
    </div>
    <div class="col">
        <p class="package package_mt">
            <a href="/betaalpagina?packages=<?= $packages[2]['package_id']; ?>"><?= $packages[2]['name']; ?></a>
            <br>
            PRIJS: <?= $packages[2]['price']; ?>
        </p>
    </div>
    <div class="col">
        <div class="col"><?= $blog->ShowArticlesFE($limit); ?></div>
        <div class="col"><a class="twitter-timeline" data-lang="nl" data-height="200" data-tweet-limit="3" data-theme="light" data-link-color="#2B7BB9" href="https://twitter.com/TwitterDev/timelines/539487832448843776?ref_src=twsrc%5Etfw"></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> </div>
    </div>
</div>