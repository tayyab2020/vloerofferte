<html>

<body>

@if($type == 'new')

    <p>
        Hi {{$client}},<br><br>Recent activity: A quotation <b>(QUO# {{$quotation_invoice_number}})</b> has been created by Mr./Mrs. <b>{{$username}}</b>. PDF file is attached below. Quotation is waiting for your approval.<br><br>Kind regards,<br><br>Klantenservice Topstoffeerders
    </p>

@endif

</body>

</html>
