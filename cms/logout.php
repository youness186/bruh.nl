<?php
    $userservice = new UserService();
    if ($userservice->logout()) {
        header("Location: /");
    }
?>