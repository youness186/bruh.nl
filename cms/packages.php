<?php
    $packages = new Package();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete'])) {
            $packages->archivePackage($_POST['delete']);
        } elseif (isset($_POST['edit'])) {
            header("Location: editpackage?package_id=" . $_POST['edit']);
        }
    }
?>
<button class="btn btn-default mb-2" onclick="location.href = 'newpackage';">
    <span class="glyphicon glyphicon-plus"></span> Voeg nieuw pakket toe
</button>
<form method="post">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Beschrijving</th>
                <th>Prijs</th>
                <th>Actief</th>
                <th>Gearchiveerd</th>
                <th>Bewerken</th>
                <th>Verwijderen</th>
            </tr>
        </thead>
        <tbody>
            <?= $packages->showPackages() ?>
        </tbody>
    </table>
</form>