<?php
namespace App\Http\Controllers;

use App\quotation_invoices;
use App\quotes;
use App\User;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use App\Generalsetting;
use App\bookings;
use App\invoices;
use DateTime;
use App\carts;
use App\users;
use App\booking_images;
use Crypt;
use App\Sociallink;
use App\user_languages;


class MollieQuotationPaymentController extends Controller {

    public function handle(Request $request) {

        if (! $request->has('id')) {
            return;
        }

        $api_key = Generalsetting::findOrFail(1);
        $sl = Sociallink::findOrFail(1);

        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey($api_key->mollie);

        $payment = $mollie->payments->get($request->id);

        if ($payment->isPaid()) {

            $data = $payment->metadata;
            quotation_invoices::where('id','=',$data->invoice_id)->update(['invoice' => 1, 'ask_customization' => 0]);
            $now = date('d-m-Y H:i:s');
            $paid_amount = $data->paid_amount;
            $quotation_invoice_number = $data->quotation_invoice_number;
            $handyman_dash = url('/').'/handyman/dashboard';

            quotation_invoices::where('id','=',$data->invoice_id)->update(['invoice' => 1, 'ask_customization' => 0, 'payment_date' => $now]);
            quotes::where('id','=',$data->quote_id)->update(['status' => 3]);

            $handyman = User::where('id','=',$data->handyman_id)->first();
            $name = $handyman->name . ' ' . $handyman->family_name;
            $email = $handyman->email;


            \Mail::send(array(), array(), function ($message) use ($email, $name, $handyman_dash, $paid_amount, $quotation_invoice_number) {
                $message->to($email)
                    ->from('info@vloerofferteonline.nl')
                    ->subject('Payment Received!')
                    ->setBody("Dear Mr/Mrs ". $name .",<br><br>We have received a total amount of € " . $paid_amount ." for your quotation # " . $quotation_invoice_number . ". This amount will soon be transferred to your account. For further details visit your panel through <a href='".$handyman_dash."'>here.</a><br><br>Kind regards,<br><br>Klantenservice Vloerofferteonline", 'text/html');
            });

            $admin_email = $sl->admin_email;

            \Mail::send(array(), array(), function ($message) use ($admin_email, $quotation_invoice_number, $paid_amount) {
                $message->to($admin_email)
                    ->from('info@vloerofferteonline.nl')
                    ->subject('Payment Received!')
                    ->setBody("Payment received for quotation # " . $quotation_invoice_number . "<br>Total amount : €" . $paid_amount . "<br><br>Kind regards,<br><br>Klantenservice Vloerofferteonline", 'text/html');
            });

        }

    }
}
