<?php
    $package = new Package();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($package->addPackage($_POST['name'], $_POST['description'], $_POST['price'], $_POST['active'])) {
            header("Location: packages");
        }
    }
?>
<h2>Pakket aanmaken</h2>
<form action="" method="post">
    <div class="form-group row">
        <label for="title" class="col-2 col-form-label">Naam:</label>
        <div class="col-10">
            <input class="form-control" type="text" id="name" name="name" placeholder="Naam" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-2 col-form-label">Beschrijving:</label>
        <div class="col-10">
            <textarea class="form-control" id="description" name="description" placeholder="Beschrijving" required></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="source" class="col-2 col-form-label">Prijs:</label>
        <div class="col-10">
            <input class="form-control" type="text" id="price" name="price" placeholder="Prijs" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="active" class="col-2 col-form-label">Actief:</label>
        <div class="col-10" id="active">
            <label class="custom-control custom-radio">
                <input name="active" type="radio" class="custom-control-input" value="0" required>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Nee</span>
            </label>
            <label class="custom-control custom-radio">
                <input name="active" type="radio" class="custom-control-input" value="1" required>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Ja</span>
            </label>
        </div>
    </div>
    <button onclick="location.href = 'home';" type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-arrow-left"></span> Terug
    </button>
    <button type="submit" class="btn btn-primary">Sla op</button>
</form>