<?php
$packages_obj = new Package();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($packages_obj->addPackage($_POST['title'], $_POST['content'], $_POST['price'], $_POST['active'])) {
        header("Location: home");
    }
}
?>
<h2>Pakket aanmaken</h2>
<form action="" method="post">
    <div class="form-group row">
        <label for="title" class="col-2 col-form-label">Pakket titel:</label>
        <div class="col-10">
            <input class="form-control" type="text" id="title" name="title" placeholder="Pakket titel" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="content" class="col-2 col-form-label">Pakket informatie:</label>
        <div class="col-10">
            <textarea class="form-control" id="content" name="content" placeholder="Pakket info" required></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="source" class="col-2 col-form-label">Prijs:</label>
        <div class="col-10">
            <input class="form-control" type="text" id="price" name="price" placeholder="Prijs" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="source" class="col-2 col-form-label">Zichtbaar:</label>
        <div class="col-10">
            <input class="form-control" type="text" id="active" name="active" placeholder="1 of 0 (1 is zichtbaar en 0 is niet zichtbaar)" required>
        </div>
    </div>
    <button onclick="location.href = 'home';" type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-arrow-left"></span> Terug
    </button>
    <button type="submit" class="btn btn-primary">Sla op</button>
</form>