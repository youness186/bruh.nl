<?php
    $users = new Users();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['user_id'])) {
        $users->editUser($_POST['name'], $_POST['email'], $_POST['password'], $_POST['role'], $_GET['user_id']);
    }

    $result = $users->query("SELECT `name`, `email`, `role` FROM `users` WHERE `user_id` = {$_GET['user_id']}");
    $items = $result->fetch_assoc();
?>
<form action="" method="post">
    <div class="form-group row">
        <label for="name" class="col-2 col-form-label">Naam:</label>
        <div class="col-10">
            <input class="form-control" value="<?= $items['name'] ?>" type="text" id="name" name="name" placeholder="Naam" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-2 col-form-label">Email:</label>
        <div class="col-10">
            <input class="form-control" value="<?= $items['email'] ?>" type="email" id="email" name="email" placeholder="Email" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-2 col-form-label">Wachtwoord:</label>
        <div class="col-10">
            <input class="form-control" type="password" id="password" name="password" placeholder="Wachtwoord">
        </div>
    </div>
    <div class="form-group row">
        <label for="role" class="col-2 col-form-label">Rol:</label>
        <div class="col-10">
            <select class="form-control" name="role" id="role" required>
                <option value="1">Admin</option>
                <option value="2">Bewerker</option>
                <option value="3">Klant</option>
            </select>
        </div>
    </div>
    <button onclick="location.href = 'blog';" type="button" class="btn btn-default">
        <span class="glyphicon glyphicon-arrow-left"></span> Terug
    </button>
    <button type="submit" class="btn btn-primary">Sla op</button>
</form>
<script>
    $('#role').val(<?= $items['role'] ?>);
</script>