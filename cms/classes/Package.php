<?php

class Package extends Database
{

    public function addPackage($titel, $info, $prijs, $zichtbaar)
    {
        return $this->query("INSERT INTO `packages` (`name`, `info`, `price`, `active`) VALUES ('{$titel}', '{$info}', '{$prijs}', '{$zichtbaar}');");
    }

    public function checkDate()
    {

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
}