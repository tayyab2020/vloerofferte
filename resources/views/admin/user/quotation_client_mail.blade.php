<html>

<body>

@if(\Config::get('app.locale') == 'du')

    <p>
        Beste {{$client}}<br><br>Je hebt een nieuwe offerte ontvangen voor je verzoek (QUO# {{$quotation_invoice_number}}). Zie bijlage voor de offerte. Wil je de offerte accepteren of wil je een verzoek indienen voor een aanpassing, <a href='{{$client_link}}'>klik hier</a> om naar je account te gaan.<br><br>Met vriendelijke groet,<br><br>Klantenservice Vloerofferte
    </p>

@else

    <p>
        Dear Mr/Mrs {{$client}}<br><br>You have received a quotation (QUO# {{$quotation_invoice_number}}) against your request # ({{$requested_quote_number}}). PDF file is attached below. For further information you can go to your dashboard through <a href='{{$client_link}}'>here.</a><br><br>Kind regards,<br><br>Klantenservice Vloerofferteonline
    </p>

@endif

</body>

</html>
