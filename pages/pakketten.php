<?php
    $packages_obj = new Package();
    $packages = $packages_obj->readPackages();
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
</div>