<?php
    $blog = new Blog();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($blog->addArticle($_POST['title'], $_POST['content'], $_POST['source'])) {
            header("Location: blog");
        }
    }
?>
<h2>Artikel aanmaken</h2>
<form action="" method="post">
    <div class="form-group row">
        <label for="title" class="col-2 col-form-label">Titel:</label>
        <div class="col-10">
            <input class="form-control" type="text" id="title" name="title" placeholder="Titel" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="content" class="col-2 col-form-label">Inhoud:</label>
        <div class="col-10">
            <textarea class="form-control" id="content" name="content" placeholder="Inhoud" required></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="source" class="col-2 col-form-label">Bron:</label>
        <div class="col-10">
            <input class="form-control" type="text" id="source" name="source" placeholder="Bron" required>
        </div>
    </div>
    <button onclick="location.href = 'blog';" type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-arrow-left"></span> Terug
    </button>
    <button type="submit" class="btn btn-primary">Sla op</button>
</form>