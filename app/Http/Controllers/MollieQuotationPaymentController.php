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
use File;
use PDF;


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

            $payment_id = $request->id;
            $payment = $mollie->payments->get($payment_id);
            $customer_id = $payment->metadata->customer_id;

            $data = $payment->metadata;
            $now = date('d-m-Y H:i:s');
            $paid_amount = $data->paid_amount;
            $quotation_invoice_number = $data->quotation_invoice_number;
            $handyman_dash = url('/').'/handyman/dashboard';
            $commission_percentage = $data->commission_percentage;
            $commission = $data->commission;
            $total_receive = $data->total_receive;

            quotation_invoices::where('id','=',$data->invoice_id)->update(['invoice' => 1, 'ask_customization' => 0, 'commission_percentage' => $commission_percentage, 'commission' => $commission, 'total_receive' => $total_receive, 'payment_date' => $now, 'mollie_customer_id' => $customer_id, 'payment_id' => $payment_id]);
            quotes::where('id','=',$data->quote_id)->update(['status' => 3]);

            $handyman = User::where('id','=',$data->handyman_id)->first();
            $name = $handyman->name . ' ' . $handyman->family_name;
            $email = $handyman->email;


            $filename = $quotation_invoice_number . '.pdf';

            $file = public_path() . '/assets/quotationsPDF/HandymanInvoices/' . $filename;

            $type = 'new';
            $commission_invoice = 1;

            if (!file_exists($file)) {

            ini_set('max_execution_time', 180);

            $pdf = PDF::loadView('user.pdf_quotation', compact('quote', 'type', 'commission_invoice', 'request', 'quotation_invoice_number', 'requested_quote_number', 'commission_percentage', 'commission', 'total_receive'))->setPaper('letter', 'portrait')->setOptions(['dpi' => 140]);

            $pdf->save(public_path() . '/assets/quotationsPDF/CommissionInvoices/' . $filename);

            }


            \Mail::send(array(), array(), function ($message) use ($file, $filename, $email, $name, $handyman_dash, $paid_amount, $quotation_invoice_number) {
                $message->to($email)
                    ->from('info@vloerofferteonline.nl')
                    ->subject('Payment Received!')
                    ->setBody("Dear Mr/Mrs ". $name .",<br><br>We have received a total amount of € " . $paid_amount ." for your quotation # " . $quotation_invoice_number . ". This amount will soon be transferred to your account. Below attached is your invoice along with our commission. For further details visit your panel through <a href='".$handyman_dash."'>here.</a><br><br>Kind regards,<br><br>Klantenservice Vloerofferteonline", 'text/html');

                $message->attach($file, [
                    'as' => $filename,
                    'mime' => 'application/pdf',
                ]);
            });


            $admin_email = $sl->admin_email;

            \Mail::send(array(), array(), function ($message) use ($file, $filename, $admin_email, $quotation_invoice_number, $paid_amount) {
                $message->to($admin_email)
                    ->from('info@vloerofferteonline.nl')
                    ->subject('Payment Received!')
                    ->setBody("Payment received for quotation # " . $quotation_invoice_number . "<br>Total amount : €" . $paid_amount . "<br><br>Kind regards,<br><br>Klantenservice Vloerofferteonline", 'text/html');

                $message->attach($file, [
                    'as' => $filename,
                    'mime' => 'application/pdf',
                ]);
            });

        }

    }
}
