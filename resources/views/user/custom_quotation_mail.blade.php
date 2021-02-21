<html>

<body>

@if($type == 'new')

    <p>
        Hi {{$client}},<br><br>You have received a quotation <b>(QUO# {{$quotation_invoice_number}})</b> by Mr./Mrs. <b>{{$username}}</b>. PDF file is attached below. Quotation is waiting for your approval.<br><br>Kind regards,<br><br>Klantenservice<br><br> Vloerofferteonline
    </p>

@elseif($type == 'edit client')

    <p>
        Hi {{$client}},<br><br>Recent activity: Updates have been made to quotation <b>(QUO# {{$quotation_invoice_number}})</b> by Mr./Mrs. <b>{{$username}}</b>. PDF file is attached below.<br><br>Kind regards,<br><br>Klantenservice<br><br> Vloerofferteonline
    </p>

@elseif($type == 'invoice client')

    <p>
        Hi {{$client}},<br><br>Recent activity: An Invoice <b>(INV# {{$quotation_invoice_number}})</b> has been generated by Mr./Mrs. <b>{{$username}}</b>. PDF file is attached below.<br><br>Kind regards,<br><br>Klantenservice<br><br> Vloerofferteonline
    </p>

@elseif($type == 'direct-invoice')

    <p>
        Hi {{$client}},<br><br>Recent activity: A Direct Invoice <b>(INV# {{$quotation_invoice_number}})</b> has been generated by Mr./Mrs. <b>{{$username}}</b>. PDF file is attached below.<br><br>Kind regards,<br><br>Klantenservice<br><br> Vloerofferteonline
    </p>

@endif

</body>

</html>
