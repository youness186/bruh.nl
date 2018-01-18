<?php

class FEPackage extends Database
{
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