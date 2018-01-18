<?php
$result = "";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $contact = new FEContact();
    $contact->contactForm($_POST);

}
?>

<div class="row">
    <div class="col-md-9 col-md-push-3">
        <h1>Contact formulier</h1>
        <?php
            echo $result;
        ?>
        <form method="post">
            <div class="form-group">
                <label for="bedrijfsnaam">Bedrijfsnaam</label><br />
                <input type="text" name="bedrijfsnaam" id="bedrijfsnaam" class="form-control"><br>
            </div>
            <div class="form-group">
                <label for="naam">Naam*</label><br />
                <input type="text" name="naam" id="naam" class="form-control" required><br />
            </div>
            <div class="form-group">
                <label for="telefoonnummer">Telefoonnummer*</label><br />
                <input type="tel" name="telefoonnummer" id="telefoonnummer" class="form-control" required><br />
            </div>
            <div class="form-group">
                <label for="email">Email*</label><br />
                <input type="email" name="email" id="email" class="form-control" required><br />
            </div>
            <div class="form-group">
                <label for="vraag">Uw vraag*</label><br />
                <input type="text" name="vraag" id="vraag" class="form-control" required><br />
            </div>
            <br />
            <input type="submit" value="Verzenden" class="btn btn-primary">
        </form>
    </div>
    <div class="col-md-3 col-md-pull-9">
        <div>
            <h2>Adresgegevens</h2>
            <div><strong>Kras Hosting</strong></div>
            <div>Kasteeldreef 122</div>
            <div>1234 BE, Tilburg</div>
            <div>Nederland</div><br /><br />
        </div>
        <div id="map" style="
        width: 100%;
        height: 400px;
        background-color: grey;">
        </div>
        <script>
            function initMap() {
                var uluru = {lat: 51.5738058, lng: 5.077993099999958};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: uluru
                });
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOpSSV49kfu3iCTojUvHPpoqboxEyXF0w&callback=initMap">
        </script>
    </div>
</div>