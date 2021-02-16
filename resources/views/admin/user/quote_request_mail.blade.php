<html>

<body>

@if(Config::get('app.locale') == 'du')

    <p>
        Beste {{$username}},<br><br>Je hebt zojuist een offerte aanvraag ontvangen. De klant wacht op je offerte, dus ga snel naar je dashboard en creëer de offerte. <a href='{{$link}}'>Klik hier</a> om naar je dashboard te gaan.
        <br><br>
        Zo creëer je een offerte vanuit je dashboard: <br><br>
        1. Klik in het menu op Offerte verzoek. Je krijgt nu een overzicht van alle offerte aanvragen, klik op actie en vervolgens op offerte opstellen.
        <br><br>
        2. Vul alle velden in en klik op verzenden.
        <br><br>
        3. Je aanvraag wordt door ons gecontroleerd en alles goed is versturen wij die door naar de klant.
        <br><br>
        Met vriendelijke groet, <br><br>Vloerofferte
    </p>

@else

    <p>
        Dear Mr/Mrs {{$username}},<br><br>You have received a quotation request. Client is waiting for your response. You can go to your dashboard through <a href='{{$link}}'>here.</a><br><br>Kind regards,<br><br>Klantenservice Vloerofferteonline
    </p>

@endif

</body>

</html>
