<?php
    $blog = new Blog();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['blog_id'])) {
        if ($blog->editArticle($_POST['title'], $_POST['content'], $_POST['source'], $_POST['archived'], $_GET['blog_id'])) {
            header("Location: blog");
        }
    }

    $result = $blog->query("SELECT `title` , `content` , `source`,  `archived` FROM `blog` WHERE `blog_id` = '{$_GET['blog_id']}';");
    $items = $result->fetch_assoc();
?>
<h2>Artikel aanpassen</h2>
<form action="" method="post">
    <div class="form-group row">
        <label for="title" class="col-2 col-form-label">Titel:</label>
        <div class="col-10">
            <input class="form-control" type="text" id="title" name="title" value="<?= $items['title']; ?>" placeholder="Titel" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="content" class="col-2 col-form-label">Inhoud:</label>
        <div class="col-10">
            <textarea class="form-control" id="content" name="content" placeholder="Inhoud" required><?= $items['content']; ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="source" class="col-2 col-form-label">Bron:</label>
        <div class="col-10">
            <input class="form-control" type="text" id="source" name="source" value="<?= $items['source']; ?>" placeholder="Bron" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="archived" class="col-2 col-form-label">Gearchiveerd:</label>
        <div class="col-10" id="archived">
            <label class="custom-control custom-radio">
                <input name="archived" type="radio" class="custom-control-input" value="0" required>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Nee</span>
            </label>
            <label class="custom-control custom-radio">
                <input name="archived" type="radio" class="custom-control-input" value="1" required>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Ja</span>
            </label>
        </div>
    </div>
    <button onclick="location.href = 'blog';" type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-arrow-left"></span> Terug
    </button>
    <button type="submit" class="btn btn-primary">Sla op</button>
</form>
<script>
    $('#archived').find('input').eq(<?= $items['archived'] ?>).prop('checked', true);
</script>