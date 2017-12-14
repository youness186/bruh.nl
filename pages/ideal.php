<div class="alert alert-success" role="alert" style="display: none">
    <strong>Bedankt!</strong> Je betaling is gelukt.
</div>
<form action="" method="post" id="ideal">
    <div class="form-group row">
        <div class="col-10">
            <select class="form-control" name="bank" id="bank" required>
                <option value="ABN AMRO">ABN AMRO</option>
                <option value="ING">ING</option>
                <option value="Rabobank">Rabobank</option>
                <option value="SNS">SNS</option>
                <option value="ASN Bank">ASN Bank</option>
                <option value="RegioBank">RegioBank</option>
                <option value="bunq">bunq</option>
                <option value="Knab">Knab</option>
                <option value="Triodos Bank">Triodos Bank</option>
                <option value="Van Lanschot">Van Lanschot</option>
            </select>
        </div>
        <div class="col-2">
            <button class="btn btn-primary mx-auto d-block" type="submit">
                Betaal!
            </button>
        </div>
    </div>
</form>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#ideal').submit(function (e) {
            e.preventDefault();
            $('.alert').css('display', 'block');
        });
    });

    // HIER VERDER GAAN VOLGENDE KEER
</script>