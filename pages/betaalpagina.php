<?php
    $betaalpagina = new FEBetaalpagina();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($betaalpagina->send($_POST)) {
            header("Location: ideal");
        }

        echo "
            <div class=\"alert alert-danger\" role=\"alert\">
                <strong>Sorry!</strong> Er is iets fout gegaan.
            </div>
        ";
    }

    $packages = "";
    $packages .= '<select class="form-control" name="package_id" id="package_id" required>';
    $result = $betaalpagina->query("SELECT * FROM packages");
    while ($row = $result->fetch_assoc()) {
        $packages .= "<option value='{$row['package_id']}'>{$row['name']}</option>";
    }
    $packages .= '</select>';
?>
<form action="" method="post">
    <div class="form-group row">
        <label for="package_id" class="col-3 col-form-label">Pakket</label>
        <div class="col-9">
            <?= $packages ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="user_type" class="col-3 col-form-label">Gebruiker type</label>
        <div class="col-9">
            <select class="form-control" name="user_type" id="user_type" required>
                <option value="0">Consument</option>
                <option value="1">Zakelijk</option>
            </select>
        </div>
    </div>
    <div class="form-group row" style="display: none;">
        <label for="company_name" class="col-3 col-form-label">Bedrijfsnaam</label>
        <div class="col-9">
            <input class="form-control" type="text" id="company_name" name="company_name">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3 col-form-label">Aanhef</label>
        <div class="col-9" id="gender">
            <label class="custom-control custom-radio">
                <input name="gender" type="radio" class="custom-control-input" value="0" required>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Man</span>
            </label>
            <label class="custom-control custom-radio">
                <input name="gender" type="radio" class="custom-control-input" value="1" required>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Vrouw</span>
            </label>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-3 col-form-label">Naam</label>
        <div class="col-9">
            <input class="form-control" type="text" id="name" name="name" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-3 col-form-label">Email</label>
        <div class="col-9">
            <input class="form-control" type="email" id="email" name="email" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-3 col-form-label">Wachtwoord</label>
        <div class="col-9">
            <input class="form-control" type="password" id="password" name="password" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="street" class="col-3 col-form-label">Straat</label>
        <div class="col-9">
            <input class="form-control" type="text" id="street" name="street" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="house_number" class="col-3 col-form-label">Huisnummer</label>
        <div class="col-9">
            <input class="form-control" type="number" id="house_number" name="house_number" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="postal_code" class="col-3 col-form-label">Postcode</label>
        <div class="col-9">
            <input class="form-control" type="text" id="postal_code" name="postal_code"  required>
        </div>
    </div>
    <div class="form-group row">
        <label for="city" class="col-3 col-form-label">Woonplaats</label>
        <div class="col-9">
            <input class="form-control" type="text" id="city" name="city"  required>
        </div>
    </div>
    <div class="form-group row">
        <label for="phone_number" class="col-3 col-form-label">Telefoonnummer</label>
        <div class="col-9">
            <input class="form-control" type="tel" id="phone_number" name="phone_number" required>
        </div>
    </div>
    <input class="btn btn-primary float-right" type="submit" value="Verzenden">
</form>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Haalt pakket ID uit de URL en selecteer het pakket gelinkt aan die ID
        const packageURL = new URL(window.location.href).searchParams.get('packages');
        if (packageURL) $('#package_id').val(packageURL).attr('readonly', true);

        $('#user_type').change(() => {
            // $('#user_type').val();
            // const fields = $('#gender input, #name, #company_name');
            // fields.each(function (index, value) {
            //     // console.log($(field).attr('required'));
            //     const field = $(value);
            //
            //
            //     field.attr('required', (!field.attr('required')));
            //     field.parents('.form-group').toggle();
            // });


            const toggleableFields = [
                $('#gender').find('input'),
                $('#name'),
                $('#company_name')
            ];

            toggleableFields.forEach((field) => {
                field.attr('required', (!field.attr('required')))
                    .parents('.form-group').toggle();
            });
        });
    });
</script>