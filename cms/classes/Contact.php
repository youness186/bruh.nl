<?php

class Contact
{
    public function contactForm($data)
    {
        $naam = $telefoonnummer = $email = $vraag = "";

        // alle velden controleren of ze bestaan isset

        if (isset($data["verzend"])) {
            $naam = $data["naam"];
            $telefoonnummer = $data["telefoonnummer"];
            $email = $data["email"];
            $vraag = $data["vraag"];


            if ((empty($naam)) || (empty($telefoonnummer)) || (empty($email)) || (empty($vraag))) {
                return '<div class="col-sm-12 form-group error">U heeft niet alle velden ingevuld.</div>';
            }

            else if (!filter_var($email, FILTER_VALIDATE_EMAIL) === true) {
                return '<div class="col-sm-12 form-group error">Uw email adres is niet geldig.</div>';
            }

            else {
                return '<div class="col-sm-12 form-group succes">Uw bericht is verzonden!</div>';
            }
        }

    }
};
?>