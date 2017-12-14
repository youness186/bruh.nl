<?php
    require_once __DIR__ . '/init.php';
    if (!isset($_GET['url'])) header("Location: home");

    $noPageFound = !file_exists("pages/{$_GET['url']}.php");
    $page = ($noPageFound)
        ? "pages/error/404.php"
        : "pages/{$_GET['url']}.php";
    $title = ($noPageFound)
        ? "Pagina niet gevonden"
        : ucwords(str_replace('_', ' ', $_GET['url'])) . " | KrasHosting";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/stylesheet.css">
</head>
<body class="<?= $_GET['url'] ?>">
    <div class="banner"></div>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
        <a class="navbar-brand" href="/">Krashosting</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="/pakketten">Pakketten</a></li>
                <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="/over_ons">Over Ons</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?php include $page ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
        $('nav .navbar-nav li').each(function() {
            const url = $(this).find('a').attr('href').substring(1);
            if (url === "<?= $_GET['url'] ?>") {
                $(this).find('a').addClass('active');
            }
        });
    </script>
</body>
</html>