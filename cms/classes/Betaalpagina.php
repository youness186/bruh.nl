<?php

class Betaalpagina extends Database
{
    public function send($data)
    {
        $fields = [
            "package_id",
            "user_type",
            "company_name",
            "gender",
            "name",
            "email",
            "password",
            "street",
            "house_number",
            "postal_code",
            "city",
            "phone_number"
        ];

        // Geef elke value in de array een key met die value;
        $i = 0;
        foreach ($fields as $field) {
            if (!isset($data[$field])) {
                return false;
            }
            if (is_int(array_search($field, $fields))) {
                unset($fields[$i]);
            }
            $fields[$field] = $field;
            $i++;
        }

        // Haalt de value 'company_name' uit de arrays als de gebruiker een consument is
        if ($data['user_type'] === '0' && empty($data['company_name'])) {
            unset($fields['company_name']);
            unset($data['company_name']);
        }

        $keys = implode('`, `', $fields);
        $values = implode("', '", $data);

        $current_date = date('Y-m-d H:i:s');
        $next_year_date = date('Y-m-d H:i:s', strtotime('+1 years'));
        return $this->query("INSERT INTO `users` (`{$keys}`, `role`, `start_package`, `end_package`) VALUES ('{$values}', 3, '$current_date', '$next_year_date')");
    }
}