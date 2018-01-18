<?php

class Package extends Database
{
    public function showPackages()
    {
        $content = '';
        $result = $this->query("SELECT * FROM `packages`");
        while ($row = $result->fetch_assoc()) {
            $row['active'] = (boolval($row['active'])) ? 'Ja' : 'Nee';
            $row['archived'] = (boolval($row['archived'])) ? 'Ja' : 'Nee';
            $content .= "<tr>";
            $content .= "<td>" . htmlspecialchars($row['package_id']) . "</td>";
            $content .= "<td>" . htmlspecialchars($row['name']) . "</td>";
            $content .= "<td>" . htmlspecialchars($row['description']) . "</td>";
            $content .= "<td>€" . htmlspecialchars($row['price']) . "</td>";
            $content .= "<td>" . htmlspecialchars($row['active']) . "</td>";
            $content .= "<td>" . htmlspecialchars($row['archived']) . "</td>";
            $content .= "<td><button class=\"btn btn-default\" type=\"submit\" name=\"edit\" value=\"{$row['package_id']}\">Bewerken</button></td>";
            $content .= "<td><button class=\"btn btn-default\" type=\"submit\" name=\"delete\" value=\"{$row['package_id']}\">Verwijderen</button></td>";
            $content .= "</tr>";
        }
        return $content;
    }

    public function readPackages()
    {
        $result = $this->query("SELECT * FROM `packages` WHERE active = 1;");
        $new = [];
        while ($row = $result->fetch_assoc()) {
           $new[] = $row;
        }
        return $new;
    }

    public function addPackage($title, $description, $price, $active)
    {
        return $this->query("INSERT INTO `packages` (`name`, `description`, `price`, `active`) VALUES ('{$title}', '{$description}', '{$price}', '{$active}');");
    }

    public function editPackage($name, $description, $price, $active, $archived, $package_id)
    {
        return $this->query("UPDATE `packages` SET `name` = '{$name}', `description` = '{$description}', `price` = '{$price}', `active` = '{$active}', `archived` = '{$archived}' WHERE `package_id` = '{$package_id}';");
    }

    public function archivePackage($package_id)
    {
        return -$this->query("UPDATE `packages` SET `archived` = 1 WHERE `package_id` = {$package_id};");
    }
}