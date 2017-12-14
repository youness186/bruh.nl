<?php
    $users = new Users();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete'])) {
            $users->deleteUser($_POST['delete']);
        } elseif (isset($_POST['edit'])) {
            header("Location: edituser?user_id=" . $_POST['edit']);
        }
    }
?>
<button class="btn btn-default mb-2" onclick="location.href = 'newuser';">
    <span class="glyphicon glyphicon-plus"></span> Voeg nieuwe gebruiker toe
</button>
<form method="post">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Bewerken</th>
                <th>Verwijderen</th>
            </tr>
        </thead>
        <tbody>
            <?= $users->showUsers() ?>
        </tbody>
    </table>
</form>