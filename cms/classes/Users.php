<?php

class Users extends Database
{
    public function addUser($name, $email, $password, $role)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $this->query("INSERT INTO `users` (`name`, `email`, `password`, `role`) VALUES ('{$name}', '{$email}', '{$password}', '{$role}');");
        header('Location: users');
    }

    public function editUser($name, $email, $password, $role, $user_id)
    {
        if (empty($password)) {
            $this->query("UPDATE `users` SET `name` = '{$name}', `email` = '{$email}', `role` = '{$role}' WHERE `user_id` = '{$user_id}';");
        } else {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $this->query("UPDATE `users` SET `name` = '{$name}', `email` = '{$email}', `password` = '{$password}', `role` = '{$role}' WHERE `user_id` = '{$user_id}';");
        }
        header('Location: users');
    }

    public function deleteUser($user_id)
    {
        if (isset($user_id)) {
            $this->query("DELETE FROM `users` WHERE `user_id` = '{$user_id}';");
        }
    }

    public function showUsers()
    {
        $content = '';
        $result = $this->query("SELECT * FROM `users`");
        while ($row = $result->fetch_assoc()) {
            $roles = array(
                1 => 'Administrator',
                2 => 'Bewerker',
                3 => 'Klant'
            );
            $row['role'] = $roles[$row['role']];
            $content .= "<tr>";
            $content .= "<td>" . htmlspecialchars($row['user_id']) . "</td>";
            $content .= "<td>" . htmlspecialchars($row['name']) . "</td>";
            $content .= "<td>" . htmlspecialchars($row['email']) . "</td>";
            $content .= "<td>" . htmlspecialchars($row['role']) . "</td>";
            $content .= "<td><button class=\"btn btn-default\" type=\"submit\" name=\"edit\" value=\"{$row['user_id']}\">Bewerken</button></td>";
            $content .= "<td><button class=\"btn btn-default\" type=\"submit\" name=\"delete\" value=\"{$row['user_id']}\">Verwijderen</button></td>";
            $content .= "</tr>";
        }
        return $content;
    }
}
?>