<?php

class UserService extends Database
{
    public function login($data)
    {
        if (isset($data['email']) && isset($data['password'])) {
            $email = $data['email'];
            $password = $data['password'];
            $result = $this->query("SELECT * FROM `users` WHERE `email` = '{$this->escape($email)}';");
            $user = $result->fetch_assoc();
            if (isset($user)) {
                if ($user['attempts'] <= 3) {
                    if (password_verify($password, $user['password'])) {
                        $special_token = md5(uniqid(rand(), true));
                        $this->query("UPDATE `users` SET `token` = '{$special_token}', `attempts` = '0' WHERE `user_id` = '{$user['user_id']}';");
                        $_SESSION["user_id"] = $user['user_id'];
                        $_SESSION["token"] = $special_token;
                        return true;
                    }
                    $this->query("UPDATE `users` SET `attempts` = `attempts`+1 WHERE `user_id` = '{$user['user_id']}';");
                }
                echo "Deze gebruiker is geblokkeerd. Neem contact op met de helpdesk.";
            }
        }
        return false;
    }

    public function logout()
    {
        $this->query("UPDATE `users` SET `token` = NULL WHERE `user_id` = '{$_SESSION["user_id"]}';");
        $_SESSION = [];
        session_destroy();
        return true;
    }

    public function resetPassword()
    {

    }

    public function register()
    {

    }

    public function editUser()
    {

    }

    public function deleteUser()
    {

    }

    public function isLoggedIn($data)
    {
        if (isset($data['user_id']) && isset($data['token'])) {
            $query = "SELECT * FROM `users` WHERE `token` = '{$data['token']}';";
            $user = $this->query($query)->fetch_assoc();
            if ($user && $user['user_id'] === $data['user_id']) {
                return true;
            }
        }
//        header('Location: login');
        return false;
    }

    public function permissions()
    {

    }
}

