<?php
    $blog = new Blog();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete'])) {
            $blog->archiveArticle($_POST['delete']);
        } elseif (isset($_POST['edit'])) {
            header("Location: editarticle?blog_id=" . $_POST['edit']);
        }
    }
?>
<button class="btn btn-default mb-2" onclick="location.href = 'newarticle';">
    <span class="glyphicon glyphicon-plus"></span> Voeg nieuwe artikel toe
</button>
<form method="post">
    <table class="table">
        <thead>
        <tr>
            <th>Titel</th>
            <th>Datum</th>
            <th>Inhoud</th>
            <th>Bron</th>
            <th>Gearchiveerd</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
        </thead>
        <tbody>
            <?= $blog->showArticles() ?>
        </tbody>
    </table>
</form>