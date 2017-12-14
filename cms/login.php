<?php
    require_once __DIR__ . '/../init.php';
    $userservice = new UserService();

    if ($userservice->isLoggedIn($_SESSION)) {
        header("Location: home");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($userservice->login($_POST)) {
            header("Location: home");
        } else {
            echo "Verkeerde gebruikersnaam of wachtwoord";
        }
    }
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <form method="post" class="mx-auto p-3 w-50">
        <h1 class="text-center">Inloggen</h1>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Wachtwoord">
        </div>
        <button type="submit" class="btn btn-primary float-right">Log in</button>
    </form>
</div>
</body>
</html>