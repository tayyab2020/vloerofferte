<?php

namespace App\Http\Controllers;

use App\handyman_quotes;
use App\items;
use App\quotation_invoices_data;
use App\quotation_invoices;
use App\quotes;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\service_types;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Language;
use App\handyman_services;
use App\Generalsetting;
use App\bookings;
use Carbon\Carbon;
use DateTime;
use App\handyman_terminals;
use App\handyman_unavailability;
use App\carts;
use App\invoices;
use Illuminate\Support\Facades\Redirect;
use Crypt;
use App\users;
use App\user_languages;
use App\handyman_temporary;
use App\booking_images;
use App\Sociallink;
use App\sub_services;
use App\cancelled_invoices;
use App\handyman_unavailability_hours;
use File;
use PDF;

class UserController extends Controller
{

      public $lang;
      public $gs;
      public $sl;

    public function __construct()
    {
        $this->middleware('auth:user',['except' => ['UserServices' , 'AddCart' , 'Services' , 'DeleteSubServices', 'UserSubServices' , 'SubServices' ]]);

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }



        $language = user_languages::where('ip','=',$ip_address)->first();
        $this->sl = Sociallink::findOrFail(1);


        if($language == '')
            {

                $language = new user_languages;
                $language->ip = $ip_address;
                $language->lang = 'eng';
                $language->save();
            }


        if($language->lang == 'eng')
        {

            $this->lang = Language::where('lang','=','eng')->first();

        }

        else
        {

            $this->lang = Language::where('lang','=','du')->first();

        }

        $this->gs = Generalsetting::findOrFail(1);
    }

    public function index()
    {
    	$user = Auth::guard('user')->user();

    	if($user->role_id == 3)
        {
            return redirect()->route('user-login');

        }


        $services = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->where('handyman_services.handyman_id','=',$user->id)->get();

          $no = 0;



            $post = invoices::where('handyman_id','=',$user->id)->where('is_completed',1)->get();

            foreach ($post as $temp) {

                $no = $no + 1;
            }

        return view('user.dashboard',compact('user','services','no'));
    }

    public function QuotationRequests()
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $user_role = $user->role_id;

        $requests = quotes::leftjoin('categories','categories.id','=','quotes.quote_service')->where('quotes.user_id',$user_id)->select('quotes.*','categories.cat_name')->get();


        foreach($requests as $key)
        {
            $invoices[] = quotation_invoices::where('quote_id',$key->id)->where('approved',1)->where('invoice',0)->get();
        }


        return view('user.client_quote_requests',compact('requests','invoices'));
    }

    public function HandymanQuotationRequests()
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $user_role = $user->role_id;

        $requests = handyman_quotes::leftjoin('quotes','quotes.id','=','handyman_quotes.quote_id')->leftjoin('categories','categories.id','=','quotes.quote_service')->where('handyman_quotes.handyman_id',$user_id)->select('quotes.*','categories.cat_name','handyman_quotes.quote_id','handyman_quotes.handyman_id')->get();

        foreach($requests as $key)
        {
            $invoices[] = quotation_invoices::where('quote_id',$key->quote_id)->where('handyman_id',$key->handyman_id)->where('invoice',0)->first();
        }

        return view('user.quote_requests',compact('requests','invoices'));
    }

    public function HandymanQuotations()
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $user_role = $user->role_id;

        $invoices = quotation_invoices::leftjoin('quotes','quotes.id','=','quotation_invoices.quote_id')->leftjoin('users','users.id','=','quotation_invoices.handyman_id')->where('quotation_invoices.handyman_id',$user_id)->where('quotation_invoices.invoice',0)->orderBy('quotation_invoices.created_at','desc')->select('quotes.*','quotation_invoices.id as invoice_id','quotation_invoices.invoice','quotation_invoices.ask_customization','quotation_invoices.approved','quotation_invoices.quotation_invoice_number','quotation_invoices.tax','quotation_invoices.subtotal','quotation_invoices.grand_total','quotation_invoices.created_at as invoice_date','users.name','users.family_name')->get();

        return view('user.quote_invoices',compact('invoices'));
    }

    public function Quotations()
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $user_role = $user->role_id;

        $invoices = quotation_invoices::leftjoin('quotes','quotes.id','=','quotation_invoices.quote_id')->leftjoin('users','users.id','=','quotation_invoices.handyman_id')->where('quotes.user_id',$user_id)->where('quotation_invoices.invoice',0)->where('quotation_invoices.approved',1)->orderBy('quotation_invoices.created_at','desc')->select('quotes.*','quotation_invoices.ask_customization','quotation_invoices.approved','quotation_invoices.id as invoice_id','quotation_invoices.quotation_invoice_number','quotation_invoices.tax','quotation_invoices.subtotal','quotation_invoices.grand_total','quotation_invoices.created_at as invoice_date','users.name','users.family_name')->get();

        return view('user.client_quote_invoices',compact('invoices'));
    }

    public function QuoteRequest($id)
    {
        $request = quotes::leftjoin('categories','categories.id','=','quotes.quote_service')->where('quotes.id',$id)->select('quotes.*','categories.cat_name')->first();

        $services = Category::all();

        return view('user.client_quote_request',compact('request','services'));
    }

    public function DownloadQuoteRequest($id)
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;

        $quote = quotes::where('id',$id)->where('user_id',$user_id)->first();

        if($quote)
        {
            $date = strtotime($quote->created_at);

            $quote_number = date("Y", $date) . "-" . sprintf('%04u', $quote->id);

            $filename = $quote_number.'.pdf';

            $file = public_path().'/assets/quotesPDF/'.$filename;

            if (!file_exists($file)){

                ini_set('max_execution_time', 180);

                $pdf = PDF::loadView('admin.user.pdf_quote',compact('quote'))->setPaper('letter', 'portrait')->setOptions(['dpi' => 140]);

                $pdf->save(public_path().'/assets/quotesPDF/'.$filename);
            }

            return response()->download(public_path("assets/quotesPDF/{$filename}"));
        }
        else
        {
            return redirect('handyman/client-dashboard');
        }
    }

    public function DownloadQuoteInvoice($id)
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $user_role = $user->role_id;

        $invoice = quotation_invoices::where('id',$id)->where('handyman_id',$user_id)->first();

        if(!$invoice)
        {
            return redirect()->route('quotations');
        }

        $quotation_invoice_number = $invoice->quotation_invoice_number;

        $filename = $quotation_invoice_number.'.pdf';

        return response()->download(public_path("assets/quotationsPDF/{$filename}"));
    }

    public function DownloadClientQuoteInvoice($id)
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $user_role = $user->role_id;

        $invoice = quotation_invoices::leftjoin('quotes','quotes.id','=','quotation_invoices.quote_id')->where('quotation_invoices.id',$id)->where('quotes.user_id',$user_id)->first();

        if(!$invoice)
        {
            return redirect()->route('client-quotations');
        }

        $quotation_invoice_number = $invoice->quotation_invoice_number;

        $filename = $quotation_invoice_number.'.pdf';

        return response()->download(public_path("assets/quotationsPDF/{$filename}"));
    }

    public function AskCustomization($id)
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $user_role = $user->role_id;

        $invoice = quotation_invoices::leftjoin('quotes','quotes.id','=','quotation_invoices.quote_id')->leftjoin('users','users.id','=','quotation_invoices.handyman_id')->where('quotation_invoices.id',$id)->where('quotes.user_id',$user_id)->first();

        if(!$invoice)
        {
            return redirect()->back();
        }


        quotation_invoices::where('id',$id)->update(['ask_customization' => 1]);

        $handyman_email = $invoice->email;
        $user_name = $invoice->name . ' ' . $invoice->family_name;

        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Quotation Review Request!";
        $msg = "Dear Mr/Mrs ".$user_name.",<br><br>Mr/Mrs ".$user->name.' '.$user->family_name." submitted review request against your quotation # ".$invoice->quotation_invoice_number."<br>Kindly take further action on this request.<br><br>Kind regards,<br><br>Klantenservice Topstoffeerders";
        mail($handyman_email,$subject,$msg,$headers);



        $admin_email = $this->sl->admin_email;

        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Quotation Review Request!";
        $msg = "A quotation review request has been submitted by Mr/Mrs ".$user->name.' '.$user->family_name." against quotation # ".$invoice->quotation_invoice_number."<br>Handyman: ".$user_name."<br><br>Kind regards,<br><br>Klantenservice Topstoffeerders";
        mail($admin_email,$subject,$msg,$headers);


        Session::flash('success', 'Request submitted successfully!');

        return redirect()->back();
    }

    public function HandymanQuoteRequest($id)
    {
        $request = quotes::leftjoin('categories','categories.id','=','quotes.quote_service')->where('quotes.id',$id)->select('quotes.*','categories.cat_name')->first();

        $services = Category::all();

        return view('user.quote_request',compact('request','services'));
    }

    public function DownloadHandymanQuoteRequest($id)
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;

        $quote = quotes::leftjoin('handyman_quotes','handyman_quotes.quote_id','=','quotes.id')->where('quotes.id',$id)->where('handyman_quotes.handyman_id',$user_id)->select('quotes.*')->first();

        if($quote)
        {
            $date = strtotime($quote->created_at);

            $quote_number = date("Y", $date) . "-" . sprintf('%04u', $quote->id);

            $filename = $quote_number.'.pdf';

            $file = public_path().'/assets/quotesPDF/'.$filename;

            if (!file_exists($file)){

                ini_set('max_execution_time', 180);

                $pdf = PDF::loadView('admin.user.pdf_quote',compact('quote'))->setPaper('letter', 'portrait')->setOptions(['dpi' => 140]);

                $pdf->save(public_path().'/assets/quotesPDF/'.$filename);
            }

            return response()->download(public_path("assets/quotesPDF/{$filename}"));
        }
        else
        {
            return redirect('handyman/dashboard');
        }
    }

    public function CreateQuotation($id)
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;

        $services = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->where('handyman_services.handyman_id',$user_id)->select('categories.*','handyman_services.rate','handyman_services.description')->get();
        $items = items::where('user_id',$user_id)->get();

        $settings = Generalsetting::findOrFail(1);

        $vat_percentage = $settings->vat;

        $quote = quotes::leftjoin('handyman_quotes','handyman_quotes.quote_id','=','quotes.id')->where('quotes.id',$id)->where('handyman_quotes.handyman_id',$user_id)->select('quotes.*')->first();

        if($quote)
        {
            return view('user.create_quotation',compact('quote','services','vat_percentage','items'));
        }
        else
        {
            return redirect('handyman/dashboard');
        }
    }

    public function ViewQuotation($id)
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $user_role = $user->role_id;

        $settings = Generalsetting::findOrFail(1);

        $vat_percentage = $settings->vat;

        $quotation = quotation_invoices::leftjoin('quotation_invoices_data','quotation_invoices_data.quotation_id','=','quotation_invoices.id')->leftjoin('quotes','quotes.id','=','quotation_invoices.quote_id')->where('quotation_invoices.id',$id)->where('quotation_invoices.handyman_id',$user_id)->select('quotation_invoices.*','quotes.id as quote_id','quotes.created_at as quote_date','quotation_invoices_data.id as data_id','quotation_invoices_data.s_i_id','quotation_invoices_data.item','quotation_invoices_data.rate','quotation_invoices_data.qty','quotation_invoices_data.description as data_description','quotation_invoices_data.estimated_date','quotation_invoices_data.amount')->get();

            if(count($quotation) != 0)
            {
                $services = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->where('handyman_services.handyman_id',$user_id)->select('categories.*','handyman_services.rate','handyman_services.description')->get();

                $items = items::where('user_id',$user_id)->get();

                return view('user.quotation',compact('quotation','services','vat_percentage','items'));
            }
            else
            {
                return redirect('handyman/dashboard');
            }

    }

    public function ViewClientQuotation($id)
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $user_role = $user->role_id;

        $settings = Generalsetting::findOrFail(1);

        $vat_percentage = $settings->vat;

        $quotation = quotation_invoices::leftjoin('quotation_invoices_data','quotation_invoices_data.quotation_id','=','quotation_invoices.id')->leftjoin('quotes','quotes.id','=','quotation_invoices.quote_id')->where('quotation_invoices.id',$id)->where('quotes.user_id',$user_id)->select('quotation_invoices.*','quotes.id as quote_id','quotes.created_at as quote_date','quotation_invoices_data.id as data_id','quotation_invoices_data.s_i_id','quotation_invoices_data.item','quotation_invoices_data.service','quotation_invoices_data.rate','quotation_invoices_data.qty','quotation_invoices_data.description as data_description','quotation_invoices_data.estimated_date','quotation_invoices_data.amount')->get();

            if(count($quotation) != 0)
            {
                $services = Category::all();

                $items = items::all();

                return view('user.client_quotation',compact('quotation','services','vat_percentage','items'));
            }
            else
            {
                return redirect('handyman/client-dashboard');
            }
    }

    public function StoreQuotation(Request $request)
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $user_name = $user->name . $user->family_name;

        $services = $request->item;

        $quote = quotes::leftjoin('categories','categories.id','=','quotes.quote_service')->where('quotes.id',$request->quote_id)->select('quotes.*','categories.cat_name')->first();
        $quote->status = 1;
        $quote->save();


        $date = strtotime($quote->created_at);

        $requested_quote_number = date("Y", $date) . "-" . sprintf('%04u', $quote->id);

        $quotation_invoice_number = date("Y", $date) . "-" . str_pad(rand(0, pow(10, 4)-1), 4, '0', STR_PAD_LEFT) . "-0001";

        $filename = $quotation_invoice_number.'.pdf';

        $file = public_path().'/assets/quotationsPDF/'.$filename;

        if (!file_exists($file)){

            ini_set('max_execution_time', 180);

            $pdf = PDF::loadView('user.pdf_quotation',compact('quote','request','quotation_invoice_number','requested_quote_number'))->setPaper('letter', 'portrait')->setOptions(['dpi' => 140]);

            $pdf->save(public_path().'/assets/quotationsPDF/'.$filename);
        }

        $invoice = new quotation_invoices;
        $invoice->quote_id = $request->quote_id;
        $invoice->quotation_invoice_number = $quotation_invoice_number;
        $invoice->handyman_id = $user_id;
        $invoice->vat_percentage = $request->vat_percentage;
        $invoice->tax = $request->tax_amount;
        $invoice->subtotal = $request->sub_total;
        $invoice->grand_total = $request->grand_total;
        $invoice->description = $request->other_info;
        $invoice->save();

        foreach($services as $i => $key)
        {
            if (strpos($services[$i], 'I') > -1) {
                $x = 1;
            }
            else
            {
                $x = 0;
            }

            $invoice_items = new quotation_invoices_data;
            $invoice_items->quotation_id = $invoice->id;
            $invoice_items->s_i_id = (int)$key;
            $invoice_items->item = $x;
            $invoice_items->service = $request->service_title[$i];
            $invoice_items->rate = $request->cost[$i];
            $invoice_items->qty = $request->qty[$i];
            $invoice_items->description = $request->description[$i];
            $invoice_items->estimated_date = $request->date;
            $invoice_items->amount = $request->amount[$i];
            $invoice_items->save();
        }

        $admin_email = $this->sl->admin_email;

        \Mail::send('user.quotation_invoice_mail',
            array(
                'username' => $user_name,
                'quote_number' => $requested_quote_number,
            ), function ($message) use($file,$admin_email,$filename) {
                $message->from('info@topstoffeerders.nl');
                $message->to($admin_email)->subject('Quotation Invoice Created!');

                $message->attach($file, [
                    'as' => $filename,
                    'mime' => 'application/pdf',
                ]);

            });


        Session::flash('success', 'Quotation has been created successfully!');
        return redirect()->route('handyman-quotation-requests');


    }

    public function Invoice($id)
    {

        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $user_role = $user->role_id;

        $invoice = invoices::leftjoin('bookings','bookings.invoice_id','=','invoices.id')->leftjoin('categories','categories.id','=','bookings.service_id')->leftjoin('service_types','service_types.id','=','bookings.rate_id')->where('invoices.id','=',$id)->Select('invoices.id','invoices.handyman_id','invoices.user_id','categories.cat_name','service_types.type','bookings.service_rate','bookings.rate','invoices.booking_date','bookings.total','invoices.is_booked','invoices.is_completed','invoices.pay_req','invoices.is_paid','invoices.is_partial','invoices.status','invoices.total as inv_total','invoices.created_at as inv_date','invoices.invoice_number','invoices.service_fee','invoices.vat_percentage','invoices.is_cancelled','invoices.cancel_req','invoices.amount_refund','invoices.commission_percentage')->get();

        $user = invoices::leftjoin('users','users.id','=','invoices.user_id')->where('invoices.id','=',$id)->first();

        $handyman = invoices::leftjoin('users','users.id','=','invoices.handyman_id')->where('invoices.id','=',$id)->first();

        if($user_role == 2)
        {
            return view('user.invoice',compact('invoice','user','handyman'));
        }
        else
            {
                return view('user.client_invoice',compact('invoice','user','handyman'));
            }

    }


    public function CancelledInvoice($id)
    {

        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $user_role = $user->role_id;



        $invoice = invoices::leftjoin('bookings','bookings.invoice_id','=','invoices.id')->leftjoin('categories','categories.id','=','bookings.service_id')->leftjoin('service_types','service_types.id','=','bookings.rate_id')->where('invoices.id','=',$id)->Select('invoices.id','invoices.handyman_id','invoices.user_id','categories.cat_name','service_types.type','bookings.service_rate','bookings.rate','invoices.booking_date','bookings.total','invoices.is_booked','invoices.is_completed','invoices.pay_req','invoices.is_paid','invoices.is_partial','invoices.status','invoices.total as inv_total','invoices.created_at as inv_date','invoices.invoice_number','invoices.service_fee','invoices.vat_percentage','invoices.is_cancelled','invoices.cancel_req','invoices.amount_refund','invoices.commission_percentage')->get();

        $invoice_number = cancelled_invoices::where('invoice_id',$id)->first();

        $invoice_number = $invoice_number->invoice_number;



        $user = invoices::leftjoin('users','users.id','=','invoices.user_id')->where('invoices.id','=',$id)->first();

        $handyman = invoices::leftjoin('users','users.id','=','invoices.handyman_id')->where('invoices.id','=',$id)->first();

if($user_role == 2)
{

    return view('user.cancelled_invoice',compact('invoice','user','handyman','invoice_number'));
}
else
{

    return view('user.client_cancelled_invoice',compact('invoice','user','handyman','invoice_number'));

}



    }

    public function Images($id)
    {

        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $user_role = $user->role_id;



        $data = bookings::leftjoin('booking_images','booking_images.booking_id','=','bookings.id')->leftjoin('categories','categories.id','=','bookings.service_id')->where('bookings.invoice_id','=',$id)->Select('categories.cat_name','booking_images.image','booking_images.description')->get();



if($user_role == 2)
{

    return view('user.images',compact('data'));
}
else
{

    return view('user.client_images',compact('data'));

}

    }


    public function ClientIndex()
    {
        $user = Auth::guard('user')->user();

        if($user->role_id == 2)
        {
            return redirect()->route('user-login');

        }


        return view('user.client_dashboard',compact('user'));
    }

    public function HandymanBookings()
    {

        $user = Auth::guard('user')->user();
        $user_id = $user->id;

        if($user->role_id == 3)
        {
            return redirect()->route('user-login');
        }

        // $users_bookings = bookings::leftjoin('users','users.id','=','bookings.user_id')->leftjoin('categories','categories.id','=','bookings.service_id')->leftjoin('service_types','service_types.id','=','bookings.rate_id')->where('handyman_id','=',$user_id)->Select('bookings.id','bookings.handyman_id','users.name','users.email','users.photo','users.family_name','categories.cat_name','service_types.type','bookings.service_rate','bookings.rate','bookings.booking_date','bookings.total','bookings.is_booked','bookings.is_completed','bookings.pay_req','bookings.is_paid','bookings.status')->get();

        $users_bookings = invoices::leftjoin('users','users.id','=','invoices.user_id')->where('invoices.handyman_id','=',$user_id)->Select('invoices.id','invoices.user_id','invoices.handyman_id','invoices.invoice_number','invoices.total','users.name','users.email','users.photo','users.family_name','invoices.is_booked','invoices.is_completed','invoices.pay_req','invoices.is_paid','invoices.is_partial','invoices.is_cancelled','invoices.cancel_req','invoices.reply','invoices.status','invoices.created_at as inv_date','invoices.booking_date','invoices.service_fee','invoices.commission_percentage')->orderBy('id', 'desc')->get();


        // $bookings_dates =  array();

        // $i = 0;

        // foreach ($users_bookings as $key) {

        //     $bookings_dates = bookings::where('invoice_id','=',$key->id)->get();

        //     foreach ($bookings_dates as $temp) {

        //          $dates[$i] = array('id' => $temp->invoice_id,'date' => $temp->booking_date);

        //          $i++;
        //         # code...
        //     }




        // }


        return view('user.bookings',compact('users_bookings'));
    }

    public function PurchasedBookings()
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;


        if($user->role_id == 3)
        {
            return redirect()->route('user-login');
        }


        $users_bookings = invoices::leftjoin('users','users.id','=','invoices.handyman_id')->where('invoices.user_id','=',$user_id)->Select('invoices.id','invoices.user_id','invoices.handyman_id','invoices.invoice_number','invoices.total','users.name','users.email','users.photo','users.family_name','invoices.is_booked','invoices.is_completed','invoices.pay_req','invoices.is_paid','invoices.is_partial','invoices.is_cancelled','invoices.cancel_req','invoices.reply','invoices.status','invoices.created_at as inv_date','invoices.booking_date')->orderBy('id', 'desc')->get();

        return view('user.purchased_bookings',compact('users_bookings'));
    }

    public function ClientBookings()
    {

        $user = Auth::guard('user')->user();
        $user_id = $user->id;

        if($user->role_id == 2)
        {
            return redirect()->route('user-login');
        }


        $users_bookings = invoices::leftjoin('users','users.id','=','invoices.handyman_id')->where('invoices.user_id','=',$user_id)->Select('invoices.id','invoices.user_id','invoices.handyman_id','invoices.invoice_number','invoices.total','users.name','users.email','users.photo','users.family_name','invoices.is_booked','invoices.is_completed','invoices.pay_req','invoices.is_paid','invoices.is_partial','invoices.is_cancelled','invoices.cancel_req','invoices.reply','invoices.status','invoices.created_at as inv_date','invoices.booking_date')->orderBy('id', 'desc')->get();


        return view('user.client_bookings',compact('users_bookings'));
    }

    public function HandymanStatusUpdate(Request $request)
    {

        $user = Auth::guard('user')->user();
        $user_id = $user->id;

        $client_email = $request->user_email;

        $client = User::where('email','=',$client_email)->first();

        $client_name = $client->name . " " . $client->family_name;


        $user_name  = $user->name;
        $user_familyname = $user->family_name;

        $name = $user_name . ' ' .$user_familyname;

        $handyman_dash = url('/').'/handyman/dashboard';

        $client_dash = url('/').'/handyman/client-dashboard';


        if($request->statusSelect == 1)
        {

            $post = bookings::where('invoice_id','=',$request->item_id)->update(['is_booked' => 1]);
            $post = invoices::where('id','=',$request->item_id)->update(['is_booked' => 1]);

            if($this->lang->lang == 'eng') // English Email Template
            {

                $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Booking status changed!";
            $msg = "Dear Mr/Mrs ". $client_name .",<br><br>Your requested handyman Mr/Mrs ".$name." recently changed the status regarding your booking. You can see your current booking status by visiting your profile through <a href='".$client_dash."'>here.</a><br><br>Kind regards,<br><br>Klantenservice Topstoffeerders";
            mail($client_email,$subject,$msg,$headers);

            }
            else // Dutch Email Template
            {

                $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Klus status gewijzigd!";
            $msg = "Beste ". $client_name .",<br><br>Je stoffeerder ".$name." heeft de status van je klus gewijzigd. Klik op account om de status van je klus te bekijken <a href='".$client_dash."'>account.</a><br><br>Met vriendelijke groet,<br><br>Klantenservice Topstoffeerders";
            mail($client_email,$subject,$msg,$headers);

            }



             $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Booking status changed!";
            $msg = "Dear Nordin Adoui, Recent Activity: Status changed for handyman Mr/Mrs ".$name.". Kindly visit your admin dashboard to view all bookings statuses.";
            mail($this->sl->admin_email,$subject,$msg,$headers);

        }


        elseif($request->statusSelect == 3)
        {

            $post = bookings::where('invoice_id','=',$request->item_id)->update(['is_booked' => 1,'is_completed' => 1]);
            $post = invoices::where('id','=',$request->item_id)->update(['is_booked' => 1,'is_completed' => 1]);

            if($this->lang->lang == 'eng') // English Email Template
            {

                $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Booking status changed!";
            $msg = "Dear Mr/Mrs ". $client_name .",<br><br>Your handyman Mr/Mrs ".$name." recently changed the status regarding your booking. Current status for the ongoing job is updated as completed by the handyman, If the job has been completed by this handyman than kindly change the status for this job so that we can transfer funds to handyman account. You can see your current booking status by visiting your profile through <a href='".$client_dash."'>here.</a><br><br>Kind regards,<br><br>Klantenservice Topstoffeerders";
            mail($client_email,$subject,$msg,$headers);

            }
            else // Dutch Email Template
            {

                $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Klus status gewijzigd!";
            $msg = "Beste ". $client_name .",<br><br>Je stoffeerder ".$name." heeft de status van je klus gewijzigd. De status is gewijzigd naar afgerond, als je akkoord bent graag ook de status wijzigen naar klus voldaan. Indien, je niet tevreden bent laat dit ons graag binnen 48 uur weten zodat wij contact op kunnen nemen met de stoffeerder. Om de status van je klus te bekijken klik op account <a href='".$client_dash."'>account.</a><br><br>Met vriendelijke groet,<br><br>Klantenservice Topstoffeerders";
            mail($client_email,$subject,$msg,$headers);

            }





            $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Booking status changed!";
            $msg = "Dear Nordin Adoui, Recent activity: Status changed for handyman Mr/Mrs ".$name.". Kindly visit your admin dashboard to view all bookings statuses.";
            mail($this->sl->admin_email,$subject,$msg,$headers);

        }


Session::flash('success', $this->lang->hbsm);

        return redirect()->route('handyman-bookings');


    }


     public function ClientStatusUpdate(Request $request)
    {


        $user = Auth::guard('user')->user();
        $user_id = $user->id;


        $user_name  = $user->name;
        $user_familyname = $user->family_name;

        $name = $user_name . ' ' .$user_familyname;

        $handyman_email = $request->user_email;

        $handyman = User::where('email','=',$handyman_email)->first();

        $handyman_name = $handyman->name . " " . $handyman->family_name;

        $handyman_dash = url('/').'/handyman/dashboard';

        $client_dash = url('/').'/handyman/client-dashboard';




        if($request->statusSelect == 1)
        {

            $post = bookings::where('invoice_id','=',$request->item_id)->update(['is_booked' => 1,'is_completed' => 1,'pay_req' => 1]);

            $post = invoices::where('id','=',$request->item_id)->update(['is_booked' => 1,'is_completed' => 1,'pay_req' => 1, 'rating' => $request->rate]);

            $rating = invoices::where('handyman_id',$request->handyman_id)->where('pay_req',1)->get();
$t_rating = 0;

$i = 0;

foreach ($rating as $key ) {

$t_rating = $t_rating + $key->rating;

$i++;

}

$avg_rating = $t_rating/$i;
$avg_rating = round($avg_rating);

$user = User::where('id',$request->handyman_id)->update(['rating' => $avg_rating]);

if($this->lang->lang == 'eng') // English Email Template
{

    $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Booking status changed!";
            $msg = "Dear Mr/Mrs ". $handyman_name .",<br><br>Your client Mr/Mrs. ".$name." has changed an ongoing job status to Finished. You will get your payment in your account after approval from backoffice in next 48 hours. You can visit your profile dashboard to view your booking status. You can see your current booking status by visiting your profile through <a href='".$handyman_dash."'>here.</a><br><br>Kind regards,<br><br>Klantenservice Topstoffeerders";
            mail($handyman_email,$subject,$msg,$headers);

}
else // Dutch Email Template
{

    $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Klus status gewijzigd!";
            $msg = "Beste ". $handyman_name .",<br><br>Je opdrachtgever ".$name." heeft de status van je klus gewijzigd naar klus voldaan. Je factuur wordt binnen 5 werkdagen uitbetaald. Klik op account om de status van je reservering te bekijken <a href='".$handyman_dash."'>account.</a><br><br>Met vriendelijke groet,<br><br>Klantenservice Topstoffeerders";
            mail($handyman_email,$subject,$msg,$headers);

}





            $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Booking status changed!";
            $msg = "Dear Nordin Adoui, Recent activity: Status changed for handyman Mr/Mrs. ".$name.". Kindly visit your admin dashboard to view all bookings statuses.";
            mail($this->sl->admin_email,$subject,$msg,$headers);

            Session::flash('success', $this->lang->cbsm);

        return redirect()->route('client-bookings');

        }

        if($request->statusSelect == 3)
        {


            $post = invoices::where('id','=',$request->item_id)->first();

$user = users::where('id','=',$post->handyman_id)->first();
$user1 = users::where('id','=',$post->user_id)->first();

$handyman_email = $user->email;
$user_email = $user1->email;

$handyman_name = $user->name. ' ' .$user->family_name;
$user_name = $user1->name. ' ' .$user1->family_name;

$item_id = $request->item_id;

$rem_amount = $post->total - ($post->total * 0.3);
$rem_amount = number_format((float)$rem_amount, 2, '.', '');
$inv_encrypt = Crypt::encrypt($item_id);
$language = $this->lang->lang;

$description = 'Remaining partial payment to admin for Invoice No. ' . $post->invoice_number;

$api_key = Generalsetting::findOrFail(1);

        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey($api_key->mollie);
        $payment = $mollie->payments->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => $rem_amount, // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => $description,
            'webhookUrl' => route('webhooks.last'),
            'redirectUrl' => url('/thankyou/'. $inv_encrypt),
            "metadata" => [
            "invoice_id" => $item_id,
            "user_email" => $user_email,
            "handyman_email" => $handyman_email,
            "client_name" => $user_name,
            "handyman_name" => $handyman_name,
            "language" => $language,


      ],
        ]);

        $payment_url = $payment->getCheckoutUrl();
        $invoice_update = invoices::where('id','=',$item_id)->update(['partial_paymentLink' => $payment_url]);

            return Redirect::to($payment_url);
        }


 if($request->statusSelect == -1)
 {


            $post = invoices::where('id','=',$request->item_id)->update(['cancel_req' => 1,'reason' => $request->reason]);




            $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Booking cancellation request!";
            $msg = "Dear Nordin Adoui, Recent activity: Job cancellation request has been posted for handyman Mr/Mrs. ".$name." due to following reason: ' ".$request->reason." '. Kindly visit your admin dashboard to take further actions.";
            mail($this->sl->admin_email,$subject,$msg,$headers);

            Session::flash('success', $this->lang->cbjcm);

        return redirect()->route('client-bookings');


 }

    }

    public function Services(Request $request)
    {
        $post = Category::query()->where('id', '=', $request->id)->first();
        $service = service_types::query()->where('id', '=', $post->service_type)->first();

        return $service;

    }

    public function GetQuotationData(Request $request)
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;

        $id = $request->id;
        if(strpos($id, 'I'))
        {
            $id = str_replace("I","",$id);
            $post = items::where('id',$request->id)->first();
        }
        else
        {
            $post = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->where('categories.id',$request->id)->where('handyman_services.handyman_id',$user_id)->select('categories.*','handyman_services.rate')->first();
        }


        return $post;

    }

    public function SubServices(Request $request)
    {
        $post = handyman_services::leftjoin('categories','categories.id','=','handyman_services.service_id')->leftjoin('service_types','service_types.id','=','categories.service_type')->where('handyman_services.handyman_id',$request->handyman_id)->where('handyman_services.service_id',$request->id)->where('handyman_services.main_id',$request->main)->select('handyman_services.rate','handyman_services.description','service_types.type','service_types.text','service_types.id as rate_id')->first();

        return $post;

    }

    public function UserServices(Request $request)
    {
        $post = Category::query()->where('id', '=', $request->id)->first();
        $service = service_types::query()->where('id', '=', $post->service_type)->first();

        $service_rate = handyman_services::where('handyman_id','=',$request->h_id)->where('service_id','=',$request->id)->first();

        $data[] = array('service'=>$service,'service_rate'=>$service_rate);


        return $data;

    }

    public function UserSubServices(Request $request)
    {

        $sub_services = handyman_services::leftjoin('categories','categories.id','=','handyman_services.service_id')->leftjoin('service_types','service_types.id','=','categories.service_type')->where('handyman_services.handyman_id',$request->handyman_id)->where('handyman_services.main_id',$request->service)->select('categories.cat_name','categories.cat_slug','categories.id')->get();

        return $sub_services;

    }

    public function DeleteServices(Request $request)
    {

        $service = handyman_services::query()->where('id', '=', $request->id)->delete();

        return 'Success!';

    }

    public function DeleteSubServices(Request $request)
    {

        $service = sub_services::query()->where('id', '=', $request->id)->delete();

        return 'Success!';

    }

    public function AddCart(Request $request)
    {



        if (!empty($_SERVER['HTTP_CLIENT_IP']))
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }

$img_desc = $request->file('file');
$size = 0;
$no = 0;
$uploadedFiles = array (); // return value



if($img_desc)
{

 foreach( $img_desc as $img )
 {
    $no = $no + 1;

    if($img->getSize() == '') // Size of single image from list is greater than 2mb
    {

        $msg = $this->lang->tpe;

                        $type = 1;

                        $cart = carts::where('user_ip','=',$ip_address)->get();

         $cart_count = count($cart);

                        $data  = array('msg' => $msg , 'type' => $type , 'count' => $cart_count);

        return $data;

    }

    $size = $img->getSize() + $size;


        /* Location */
$location = public_path().'/assets/bookingImages/'.$img->getClientOriginalName();
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png","pdf");
/* Check file extension */

if( !in_array(strtolower($imageFileType),$valid_extensions) ) {

     $msg = $this->lang->fte;

                        $type = 1;

                        $cart = carts::where('user_ip','=',$ip_address)->get();

         $cart_count = count($cart);

                        $data  = array('msg' => $msg , 'type' => $type , 'count' => $cart_count);

        return $data;


    }

 }

if($no > 5)
{

    $msg = $this->lang->mie;

                        $type = 1;

                        $cart = carts::where('user_ip','=',$ip_address)->get();

         $cart_count = count($cart);

                        $data  = array('msg' => $msg , 'type' => $type , 'count' => $cart_count);

        return $data;

}

if($size > '2097152‬')
{

    $msg = $this->lang->tpe;

                        $type = 1;

                        $cart = carts::where('user_ip','=',$ip_address)->get();

         $cart_count = count($cart);

                        $data  = array('msg' => $msg , 'type' => $type , 'count' => $cart_count);

        return $data;

}

foreach( $img_desc as $img )
{

    $fileName = date('YmdHis',time()).mt_rand().'.'.pathinfo( $img->getClientOriginalName(), PATHINFO_EXTENSION );

   /* Upload file */
   $img->move( public_path().'/assets/bookingImages/', $fileName );

     array_push( $uploadedFiles, $fileName );

}



}





$check = carts::where('user_ip','=',$ip_address)->first();


if($check)
{

    if( $check->handyman_id == $request->handyman_id )

{

    $to_update = carts::where('user_ip','=',$ip_address)->where('service_id','=',$request->service)->where('handyman_id','=',$request->handyman_id)->first();

    if($to_update)
    {
        $qty = $to_update->rate + $request->rate;

        $update = carts::where('user_ip','=',$ip_address)->where('service_id','=',$request->service)->where('handyman_id','=',$request->handyman_id)->update(['rate'=>$qty]);

        $sub_service = $request->sub_service;

        if($sub_service)
        {
            $i = 0;

            $date = new DateTime($request->date);

        $date = $date->format('Y-m-d H:i');

            foreach ($sub_service as $key ) {

                $cart = new carts;
                $cart->user_ip = $ip_address;
                $cart->handyman_id = $request->handyman_id;
                $cart->service_id = $key;
                $cart->main_id = $request->service;
                $cart->rate_id = $request->sub_rate_id[$i];
                $cart->rate = $request->sub_rate[$i];
                $cart->service_rate = $request->sub_service_rate[$i];
                $cart->booking_date = $date;

                $cart->save();

                $i++;
            }

        }



          if(!empty($_FILES ['file']))
        {

$x = 0;


             foreach( $img_desc as $img )
             {



                 $images = new booking_images;
                 $images->cart_id = $to_update->id;
                 $images->image = $uploadedFiles[$x];
                 $images->description = $request->description;

                 $images->save();

                 $x++;
             }

        }
        else
        {
            if($request->description)
            {

                $images = new booking_images;
                 $images->cart_id = $to_update->id;
                 $images->description = $request->description;

                 $images->save();

            }
        }



    }
    else
    {

        $date = new DateTime($request->date);

        $date = $date->format('Y-m-d H:i');


        $post = new carts();

        $post->user_ip = $ip_address;

        $post->handyman_id = $request->handyman_id;

        $post->service_id = $request->service;

        $post->rate_id = $request->rate_id;

        $post->rate = $request->rate;

        $post->service_rate = $request->service_rate;

        $post->booking_date = $date;


        $post->save();

        $sub_service = $request->sub_service;

        if($sub_service)
        {
            $i = 0;

            $date = new DateTime($request->date);

        $date = $date->format('Y-m-d H:i');

            foreach ($sub_service as $key ) {

                $cart = new carts;
                $cart->user_ip = $ip_address;
                $cart->handyman_id = $request->handyman_id;
                $cart->service_id = $key;
                $cart->main_id = $request->service;
                $cart->rate_id = $request->sub_rate_id[$i];
                $cart->rate = $request->sub_rate[$i];
                $cart->service_rate = $request->sub_service_rate[$i];
                $cart->booking_date = $date;

                $cart->save();

                $i++;
            }

        }

          if(!empty($_FILES ['file']))
        {

$x = 0;


             foreach( $img_desc as $img )
             {



                 $images = new booking_images;
                 $images->cart_id = $post->id;
                 $images->image = $uploadedFiles[$x];
                 $images->description = $request->description;

                 $images->save();

                 $x++;
             }

        }
        else
        {
            if($request->description)
            {

                $images = new booking_images;
                 $images->cart_id = $post->id;
                 $images->description = $request->description;

                 $images->save();

            }
        }


    }



         $type = 0;


         // $msg = 'Service added to cart successfully!';

         $msg = $this->lang->acm;


}

else
{

    // $msg = 'Sorry, You can only add multiple services of same handyman into your cart!';

    $msg = $this->lang->ace;
    $type = 1;
}

}

else
{



    $date = new DateTime($request->date);

        $date = $date->format('Y-m-d H:i');



        $post = new carts();

        $post->user_ip = $ip_address;

        $post->handyman_id = $request->handyman_id;

        $post->service_id = $request->service;

        $post->rate_id = $request->rate_id;

        $post->rate = $request->rate;

        $post->service_rate = $request->service_rate;

        $post->booking_date = $date;


        $post->save();

        $sub_service = $request->sub_service;

        if($sub_service)
        {
            $i = 0;

            $date = new DateTime($request->date);

        $date = $date->format('Y-m-d H:i');

            foreach ($sub_service as $key ) {

                $cart = new carts;
                $cart->user_ip = $ip_address;
                $cart->handyman_id = $request->handyman_id;
                $cart->service_id = $key;
                $cart->main_id = $request->service;
                $cart->rate_id = $request->sub_rate_id[$i];
                $cart->rate = $request->sub_rate[$i];
                $cart->service_rate = $request->sub_service_rate[$i];
                $cart->booking_date = $date;

                $cart->save();

                $i++;
            }

        }

           if(!empty($_FILES ['file']))
        {

$x = 0;


             foreach( $img_desc as $img )
             {



                 $images = new booking_images;
                 $images->cart_id = $post->id;
                 $images->image = $uploadedFiles[$x];
                 $images->description = $request->description;

                 $images->save();

                 $x++;
             }

        }
        else
        {
            if($request->description)
            {

                $images = new booking_images;
                 $images->cart_id = $post->id;
                 $images->description = $request->description;

                 $images->save();

            }
        }


         $type = 0;

         // $msg = 'Service added to cart successfully!';

         $msg = $this->lang->acm;


}




        $cart = carts::where('user_ip','=',$ip_address)->get();

         $cart_count = count($cart);


        $data  = array('msg' => $msg , 'type' => $type , 'count' => $cart_count);

        return $data;


    }

    public function BookHandyman(Request $request)
    {
        $user = Auth::guard('user')->user();
        $user_id = Auth::guard('user')->user()->id;

        if($request->handyman_id == $user_id)
        {

            Session::flash('unsuccess', $this->lang->pdc);
            return redirect()->back();
        }


        $language = $this->lang->lang;

        $payment_option = $request->payment_option;

        $service_rate = $request->service_rate;
        $service_rate1 = $request->service_rate;
        $service_rate = json_encode($service_rate);


        $handyman_id = $request->handyman_id;
        $counter = Generalsetting::findOrFail(1);
        $min_amount = $counter->min_amount;

        $t_amount = $request->sub_total;


        if($min_amount != '')
        {
            if($min_amount > $t_amount)
            {

                Session::flash('unsuccess', $this->lang->ma.$min_amount.'!');
                    return redirect()->back();

            }
        }
        $counter= $counter->counter;

        $invoice_no =  sprintf('%04u', $counter);

        $description = 'Payment for Invoice No. ' . $invoice_no;


        $rate_id = $request->rate_id;
        $rate_id = json_encode($rate_id);

        $cart_id = $request->cart_id;
        $cart_id = json_encode($cart_id);

        $service_id = $request->service_id;
        $service_id = json_encode($service_id);

        $rate = $request->rate;
        $rate1 = $request->rate;
        $rate = json_encode($rate);


        $service_total = $request->service_total;

        for($i=0; $i<count($service_rate1); $i++) {
            $service_rate1[$i] = $service_rate1[$i];
            $rate1[$i] = $rate1[$i];
            $service_total1[$i] =  $service_rate1[$i] * $rate1[$i];

        }

        $service_total = json_encode($service_total1);

        $service_fee = $request->service_fee;
        $vat_percentage = $request->vat_percentage;

        if($payment_option == 2)
        {
            $total1 = $request->total_payment1;
            $total = $request->sub_total;
            $total_mollie = number_format((float)$total1, 2, '.', '');
        }

        else
        {
            $total = $request->sub_total;
            $total_mollie = number_format((float)$total, 2, '.', '');

        }

        $paid_amount = str_replace('.', ',', number_format($total_mollie,2));

        $date = $request->date;
        $date = json_encode($date);

        $commission_percentage = $this->gs->commission_percentage;
        // $date = new DateTime($request->date);

        // $date = $date->format('Y-m-d H:m');

        $msg_encrypt = Crypt::encrypt($handyman_id);

        $api_key = Generalsetting::findOrFail(1);

        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey($api_key->mollie);
        $payment = $mollie->payments->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => $total_mollie, // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => $description,
            'webhookUrl' => route('webhooks.mollie'),
            'redirectUrl' => url('/thankyou-page/'. $msg_encrypt),
            "metadata" => [
            "user_id" => $user_id,
            "handyman_id" => $handyman_id,
            "service_id" => $service_id,
            "rate_id" => $rate_id,
            "rate" => $rate,
            "date" => $date,
            "service_rate" => $service_rate,
            "service_total" => $service_total,
            "total" => $total,
            "invoice_no" => $invoice_no,
            "ip" => $request->ip,
            "payment_option" => $payment_option,
            "language" => $language,
            "service_fee" => $service_fee,
            "vat_percentage" => $vat_percentage,
            "commission_percentage" => $commission_percentage,
            "cart_id" => $cart_id,
            "paid_amount" => $paid_amount,


      ],
        ]);

        return redirect($payment->getCheckoutUrl(), 303);


        // $date = new DateTime($request->date);



        // $post = new bookings;
        // $post->user_id = $user_id;
        // $post->handyman_id = $request->handyman_id;
        // $post->is_booked = 1;
        // $post->service_id = $request->service;
        // $post->rate_id = $request->rate_id;
        // $post->rate = $request->rate;
        // $post->booking_date = $date;
        // $post->service_rate = $service_rate;
        // $post->total = $total;
        // $post->save();

        // Session::flash('success', 'Handyman booked successfully!');
        // return redirect()->back();

    }

    public function profile()
    {
    	$user = Auth::guard('user')->user();
    	$user_id = Auth::guard('user')->user()->id;

        if($user->role_id == 3)
        {
            return redirect()->route('user-login');
        }

        $cats = Category::all();
        $services_selected = handyman_services::query()->where('handyman_id','=', $user_id)->get();

        $services = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->where('handyman_services.handyman_id','=',$user_id)->get();



        return view('user.profile',compact('user','cats','services_selected','services'));
    }

    public function AvailabilityManager()
    {
        $user = Auth::guard('user')->user();
        $user_id = Auth::guard('user')->user()->id;

        if($user->role_id == 3)
        {
            return redirect()->route('user-login');
        }

        $post = handyman_unavailability::where('handyman_id','=',$user_id)->select('date')->get();


        $unavailable_dates = $post->pluck('date')->implode(',');


        $hours = handyman_unavailability_hours::where('handyman_id','=',$user_id)->get();

        $services = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->where('handyman_services.handyman_id','=',$user_id)->get();




        return view('user.availability_management',compact('user','services','unavailable_dates','hours'));
    }

    public function RadiusManagement()
    {
        $user = Auth::guard('user')->user();
        $user_id = Auth::guard('user')->user()->id;

        if($user->role_id == 3)
        {
            return redirect()->route('user-login');
        }


        $services = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->where('handyman_services.handyman_id','=',$user_id)->get();



        $terminal = handyman_terminals::where('handyman_id','=',$user_id)->first();


        return view('user.radius_management',compact('user','services','terminal'));
    }

    public function ClientProfile()
    {
        $user = Auth::guard('user')->user();
        $user_id = Auth::guard('user')->user()->id;

        if($user->role_id == 2)
        {
            return redirect()->route('user-login');
        }

        $cats = Category::all();



        return view('user.client_profile',compact('user','cats'));
    }

    public function MyServices()
    {
        $user = Auth::guard('user')->user();
        $user_id = Auth::guard('user')->user()->id;

        if($user->role_id == 3)
        {
            return redirect()->route('user-login');
        }


        $cats = Category::all();
        $services_selected = handyman_services::query()->where('handyman_id','=', $user_id)->where('main_id',0)->get();


        $services[] = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->leftjoin('service_types','service_types.id','=','categories.service_type')->where('handyman_services.handyman_id','=',$user_id)->Select('categories.id as id','categories.cat_name as cat_name','handyman_services.rate','service_types.type')->get();


        return view('user.my_services',compact('user','cats','services_selected','services'));
    }

    public function MyItems()
    {
        $user = Auth::guard('user')->user();
        $user_id = Auth::guard('user')->user()->id;

        if($user->role_id == 3)
        {
            return redirect()->route('user-login');
        }

        $items = items::where('user_id',$user_id)->get();

        return view('user.my_items',compact('user_id','items'));
    }

    public function CreateItem()
    {
        return view('user.create_item');
    }

    public function StoreItem(Request $request)
    {

        $user_id = Auth::guard('user')->user()->id;
        $item = new items;
        $photo = '';

        if ($file = $request->file('photo'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/item_images',$name);
            $photo = $name;
        }

        $item->user_id = $user_id;
        $item->cat_name = $request->item;
        $item->photo = $photo;
        $item->description = $request->description;
        $item->rate = $request->rate;
        $item->save();


        Session::flash('success', 'Item added successfully.');
        return redirect()->route('user-items');
    }

    public function EditItem($id)
    {
        $user = Auth::guard('user')->user();
        $user_id = Auth::guard('user')->user()->id;

        if($user->role_id == 3)
        {
            return redirect()->route('user-login');
        }

        $item = items::where('id',$id)->where('user_id',$user_id)->first();


        return view('user.edit_item',compact('item'));
    }

    public function UpdateItem(Request $request, $id)
    {

        $item = items::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('photo'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/item_images',$name);
            if($item->photo != null)
            {
                unlink(public_path().'/assets/item_images/'.$item->photo);
            }
            $input['photo'] = $name;
        }
        else
        {
            if($item->photo != null)
            {
                unlink(public_path().'/assets/item_images/'.$item->photo);
            }

            $input['photo'] = '';
        }

        $item = items::where('id',$id)->update(['cat_name' => $request->item, 'photo' => $input['photo'], 'description' => $request->description, 'rate' => $request->rate]);

        Session::flash('success', 'Item updated successfully.');
        return redirect()->route('user-items');
    }

    public function DestroyItem($id)
    {
        $item = items::findOrFail($id);

        if($item->photo == null){
            $item->delete();
            Session::flash('success', 'Item deleted successfully.');
            return redirect()->route('user-items');
        }

        unlink(public_path().'/assets/item_images/'.$item->photo);
        $item->delete();
        Session::flash('success', 'Item deleted successfully.');
        return redirect()->route('user-items');
    }

    public function MySubServices()
    {
        $user = Auth::guard('user')->user();
        $user_id = Auth::guard('user')->user()->id;

        if($user->role_id == 3)
        {
            return redirect()->route('user-login');
        }


        // $sub_cats = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->leftjoin('sub_services','sub_services.sub_id','=','handyman_services.service_id')->where('handyman_services.handyman_id',$user_id)->where('categories.main_service',0)->select('categories.id','categories.cat_name','sub_services.cat_id','sub_services.sub_id','handyman_services.rate','handyman_services.description')->get();

        $main_cats_selected = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->where('handyman_services.handyman_id',$user_id)->where('categories.main_service',1)->select('categories.id','categories.cat_name','handyman_services.service_id')->get();

        foreach ($main_cats_selected as $key => $value) {


            $sub_cats[$value->id] = Category::leftjoin('sub_services','sub_services.sub_id','=','categories.id')->where('sub_services.cat_id',$value->id)->select('categories.id','categories.cat_name','sub_services.cat_id','sub_services.sub_id')->get();

            $sub_selected[$value->id] = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->leftjoin('service_types','service_types.id','=','categories.service_type')->where('handyman_services.handyman_id',$user_id)->where('handyman_services.main_id',$value->id)->select('categories.id','categories.cat_name','handyman_services.id as h_id','handyman_services.rate','handyman_services.description','handyman_services.main_id','service_types.type')->get();

            # code...
        }



        return view('user.my_subservices',compact('user','sub_cats','main_cats_selected','sub_selected'));
    }

    public function GetID(Request $request)
    {



        $user = Auth::guard('user')->user();
        $user_id = Auth::guard('user')->user()->id;


            $sub_cats = Category::leftjoin('sub_services','sub_services.sub_id','=','categories.id')->where('sub_services.cat_id',$request->id)->select('categories.id','categories.cat_name','sub_services.cat_id','sub_services.sub_id')->get();



        return $sub_cats;

    }

    public function CompleteProfile()
    {
        $user = Auth::guard('user')->user();
        $user_id = Auth::guard('user')->user()->id;

        if($user->role_id == 3)
        {
            return redirect()->route('user-login');
        }

        $cats = Category::all();

        $services_selected = handyman_services::query()->where('handyman_id','=', $user_id)->get();

        $services = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->where('handyman_services.handyman_id','=',$user_id)->get();


        return view('user.complete_profile',compact('user','cats','services_selected','services'));
    }

    public function ExperienceYears()
    {
        $user = Auth::guard('user')->user();
        $user_id = Auth::guard('user')->user()->id;

        if($user->role_id == 3)
        {
            return redirect()->route('user-login');
        }

        $cats = Category::all();

               $services_selected = handyman_services::query()->where('handyman_id','=', $user_id)->get();

        $services = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->where('handyman_services.handyman_id','=',$user_id)->get();


        return view('user.experience_years',compact('user','services_selected','services','cats'));
    }

    public function Insurance()
    {
        $user = Auth::guard('user')->user();
        $user_id = Auth::guard('user')->user()->id;

        if($user->role_id == 3)
        {
            return redirect()->route('user-login');
        }

        $cats = Category::all();

               $services_selected = handyman_services::query()->where('handyman_id','=', $user_id)->get();

        $services = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->where('handyman_services.handyman_id','=',$user_id)->get();


        return view('user.insurance',compact('user','services_selected','services','cats'));
    }

    public function resetform()
    {
        $user = Auth::guard('user')->user();
        $user_role = Auth::guard('user')->user()->role_id;

        if($user_role == 2)
        {

            $services = Category::leftjoin('handyman_services','handyman_services.service_id','=','categories.id')->where('handyman_services.handyman_id','=',$user->id)->get();

        }
        else
        {
            $services = "";
        }

        return view('user.reset',compact('user','services','user_role'));
    }

    public function reset(Request $request)
    {
        $input = $request->all();
        $user = Auth::guard('user')->user();
        if ($request->cpass){
            if (Hash::check($request->cpass, $user->password)){
                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    Session::flash('unsuccess', $this->lang->cpnm);
                    return redirect()->back();
                }
            }else{
                Session::flash('unsuccess', $this->lang->cpnm);
                return redirect()->back();
            }
        }
        $user->update($input);
        Session::flash('success', $this->lang->suyp);
        return redirect()->back();
    }

    public function TemporaryProfileUpdate(Request $request)
    {
        $input = $request->all();

        $user = Auth::guard('user')->user();

        $check = handyman_temporary::where('handyman_id',$user->id)->first();





            if(strpos($request->address,'&')===true)
            {
                $input['address'] = str_replace("&","and",$request->address);
            }

        if (!empty($request->special))
         {
            $input['special'] = implode(',', $request->special);
         }

        if (empty($request->special))
         {
            $input['special'] = null;
         }



        if($check)
        {

            if($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/temporary_images',$name);

                if($check->photo)
                {
                    unlink(public_path().'/assets/temporary_images/'.$check->photo);

                }



            $input['photo'] = $name;
            }
            else
            {

                $input['photo'] = $check->photo;

            }

            $temp = handyman_temporary::where('handyman_id',$user->id)->update(['handyman_id' => $user->id, 'email' => $user->email, 'name' => $input['name'], 'family_name' => $input['family_name'], 'photo' => $input['photo'], 'description' => $input['description'], 'language' => $input['language'], 'education' => $input['education'],  'profession' => $input['profession'], 'city' => $input['city'], 'address' => $input['address'], 'phone' => $input['phone'], 'web' => $input['web'], 'special' => $input['special'], 'registration_number' => $input['registration_number'], 'company_name' => $input['company_name'], 'tax_number' => $input['tax_number'], 'bank_account' => $input['bank_account'], 'postcode' => $input['postcode'] ]);

        }
        else
        {

            if($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/temporary_images',$name);



            $input['photo'] = $name;
            }
            else
            {

                $input['photo'] = null;

            }

            $post = new handyman_temporary;
            $post->handyman_id = $user->id;
            $post->email = $user->email;
            $post->name = $input['name'];
            $post->family_name = $input['family_name'];
            $post->photo = $input['photo'];
            $post->description = $input['description'];
            $post->language = $input['language'];
            $post->education = $input['education'];
            $post->profession = $input['profession'];
            $post->city = $input['city'];
            $post->address = $input['address'];
            $post->phone = $input['phone'];
            $post->web = $input['web'];
            $post->special = $input['special'];
            $post->registration_number = $input['registration_number'];
            $post->company_name = $input['company_name'];
            $post->tax_number = $input['tax_number'];
            $post->bank_account = $input['bank_account'];
            $post->postcode = $input['postcode'];

            $post->save();

        }

         $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Profile Update Requested!";
            $msg = "Dear Nordin Adoui, Recent activity: A handyman Mr/Mrs. ".$input['name']." ".$input['family_name']." requested for profile update, kindly visit your admin dashboard in order to take further actions.";
            mail($this->sl->admin_email,$subject,$msg,$headers);





        Session::flash('success', $this->lang->pusm);
        return redirect()->route('user-profile');
    }

    public function profileupdate(Request $request)
    {
        $input = $request->all();

        $user = Auth::guard('user')->user();




            if($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($user->photo != null)
                {
                    unlink(public_path().'/assets/images/'.$user->photo);
                }
            $input['photo'] = $name;
            }
            if(strpos($request->address,'&')===true)
            {
                $input['address'] = str_replace("&","and",$request->address);
            }

        if (!empty($request->special))
         {
            $input['special'] = implode(',', $request->special);
         }

        if (empty($request->special))
         {
            $input['special'] = null;
         }

        $user->update($input);






        Session::flash('success', $this->lang->success);
        return redirect()->route('user-profile');
    }

    public function AvailabilityUpdate(Request $request)
    {
        $input = $request->all();


        $user = Auth::guard('user')->user();




$handyman_unavailability = handyman_unavailability::where('handyman_id','=',$user->id)->delete();


if($request->multiple_dates != '')
{
    $myArray = explode(',', $request->multiple_dates);



foreach ($myArray as $key ) {


$handyman_unavailability = new handyman_unavailability();
$handyman_unavailability->handyman_id = $user->id;
$handyman_unavailability->date = $key;
$handyman_unavailability->save();


}

}

$handyman_unavailability_hours = handyman_unavailability_hours::where('handyman_id','=',$user->id)->delete();

if($request->hours != '')
{


foreach ($request->hours as $key ) {


$handyman_unavailability_hours = new handyman_unavailability_hours();
$handyman_unavailability_hours->handyman_id = $user->id;
$handyman_unavailability_hours->hour = $key;
$handyman_unavailability_hours->save();


}

}


        Session::flash('success', $this->lang->success);
        return redirect()->route('user-availability');
    }

    public function RadiusUpdate(Request $request)
    {
        $input = $request->all();

        $user = Auth::guard('user')->user();

        $post = handyman_terminals::where('handyman_id','=',$user->id)->first();

        if($post == '')
        {
            $post = new handyman_terminals();
            $post->handyman_id = $user->id;
            $post->zipcode = $input['postal_code'];
            $post->longitude = $input['longitude'];
            $post->latitude = $input['latitude'];
            $post->radius = $input['radius'];
            $post->city = $input['terminal_city'];
            $post->save();
        }
        else
        {

           $post = handyman_terminals::where('handyman_id','=',$user->id)->update(['zipcode' => $input['postal_code'] , 'longitude' => $input['longitude'] , 'latitude' => $input['latitude'] , 'radius' => $input['radius'] , 'city' => $input['terminal_city']]);

        }

        $user_update = users::where('id','=',$user->id)->update(['postcode' => $input['postal_code']]);


        Session::flash('success', $this->lang->success);
        return redirect()->route('radius-management');
    }

      public function InsuranceUpload(Request $request)
    {
        $input = $request->all();

        $user = Auth::guard('user')->user();




            if($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/InsurancePod',$name);
                if($user->photo != null)
                {
                    unlink(public_path().'/assets/InsurancePod/'.$user->photo);
                }
            $input['photo'] = $name;
            }

$post = User::where('id','=',$user->id)->update(['insurance_pod' => $input['photo']]);


$user_name  = $user->name;
        $user_familyname = $user->family_name;

        $name = $user_name . ' ' .$user_familyname;





             $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Insurance POD Uploaded!";
            $msg = "Dear Nordin Adoui, Recent activity: A handyman Mr/Mrs. ".$name." uploaded a pod for his/her insurance, kindly visit your admin dashboard in order to take further actions.";
            mail($this->sl->admin_email,$subject,$msg,$headers);




        Session::flash('success', $this->lang->success);
        return redirect()->route('insurance');
    }

    public function ClientProfileUpdate(Request $request)
    {
        $input = $request->all();

        $user = Auth::guard('user')->user();


            if($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($user->photo != null)
                {
                    unlink(public_path().'/assets/images/'.$user->photo);
                }
            $input['photo'] = $name;
            }
            if(strpos($request->address,'&')===true)
            {
                $input['address'] = str_replace("&","and",$request->address);
            }

        if (!empty($request->special))
         {
            $input['special'] = implode(',', $request->special);
         }

        if (empty($request->special))
         {
            $input['special'] = null;
         }

        $user->update($input);





        Session::flash('success', $this->lang->success);
        return redirect()->route('client-profile');
    }

    public function MyServicesUpdate(Request $request)
    {
        $input = $request->all();

        $user_id = Auth::guard('user')->user()->id;

        $post = handyman_services::query()->where('handyman_id','=', $user_id)->first();



        if($post != "")
        {
            for($i = 0; $i<sizeof($input['title']); $i++) {
                if($input['hs_id'][$i] == 0)
                {
                    $post = new handyman_services();
                    $post->handyman_id = $user_id;
                    $post->service_id = $input['title'][$i];
                    $post->rate = $input['details'][$i];
                    $post->description = $input['description'][$i];

                    $post->save();
                }
                else
                {

                    $post = handyman_services::query()->where('id', '=', $input['hs_id'][$i])->update(['service_id' => $input['title'][$i] , 'rate' => $input['details'][$i] , 'description' => $input['description'][$i] ]);

                }


            }

        }
        else{

            for($i = 0; $i<sizeof($input['title']); $i++)
            {
                $post = new handyman_services();
                $post->handyman_id = $user_id;
                $post->service_id = $input['title'][$i];
                $post->rate = $input['details'][$i];
                $post->description = $input['description'][$i];

                $post->save();

            }




        }





        Session::flash('success', $this->lang->success);
        return redirect()->route('user-services');
    }


    public function MySubServicesUpdate(Request $request)
    {
        $input = $request->all();

        $user_id = Auth::guard('user')->user()->id;

                   for($i = 0; $i<sizeof($input['title']); $i++) {
                if($input['hs_id'][$i] == 0)
                {
                    $check = handyman_services::where('handyman_id',$user_id)->where('service_id',$input['title'][$i])->where('main_id',$input['main_id'][$i])->first();

                    if($check)
                    {

                        $post = handyman_services::query()->where('id', '=', $check->id)->update(['service_id' => $input['title'][$i] , 'rate' => $input['details'][$i] , 'description' => $input['description'][$i] ]);

                    }
                    else
                    {
                       $post = new handyman_services();
                    $post->handyman_id = $user_id;
                    $post->service_id = $input['title'][$i];
                    $post->main_id = $input['main_id'][$i];
                    $post->rate = $input['details'][$i];
                    $post->description = $input['description'][$i];

                    $post->save();

                    }



                }
                else
                {

                    $post = handyman_services::query()->where('id', '=', $input['hs_id'][$i])->update(['service_id' => $input['title'][$i] , 'rate' => $input['details'][$i] , 'description' => $input['description'][$i] ]);

                }


            }






        Session::flash('success', $this->lang->success);
        return redirect()->route('user-subservices');
    }

    public function PostExperienceYears(Request $request)
    {
        $input = $request->all();

        $user_id = Auth::guard('user')->user()->id;



        $post = User::query()->where('id', '=', $user_id)->update(['experience_years' => $request->years]);






        Session::flash('success', $this->lang->success);
        return redirect()->route('experience-years');
    }


     public function CompleteProfileUpdate(Request $request)
    {

        $input = $request->all();

        $registration_fee = $this->gs->registration_fee;

        if($registration_fee == '' || $registration_fee == 0)
        {
            $registration_fee = "0.01";
        }
        else
        {

            $registration_fee = number_format((float)$registration_fee, 2, '.', '');

        }


        $consumerName = $input['full_name'];
        $current_date = date("Y-m-d");


        $user = Auth::guard('user')->user();
        $user_id = Auth::guard('user')->user()->id;
        $api_key = Generalsetting::findOrFail(1);
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey($api_key->mollie);

        $customer = $mollie->customers->create([
      "name" => $consumerName,
      "email" => $input['email'],
]);

//         $mandate = $mollie->customers->get($customer->id)->createMandate([
//    "method" => \Mollie\Api\Types\MandateMethod::DIRECTDEBIT,
//    "consumerName" => "John Doe",
//    "consumerAccount" => "NL55INGB0000000000",
// ]);



          $payment = $mollie->customers->get($customer->id)->createPayment([
    "amount" => [
       "currency" => "EUR",
       "value" => $registration_fee,
    ],
    "method" => "ideal",

    "description" => "Registration Fee Payment",
    "sequenceType" => "first",
    "redirectUrl" => route('user-complete-profile'),
    "webhookUrl" => route('webhooks.first'),
    "metadata" => [
            "customer_id" => $customer->id,
            "consumer_name" => $consumerName,
            "user_id" => $user_id,

      ],
]);

        return redirect($payment->getCheckoutUrl(), 303);

    }

    public function publish()
    {
        $user = Auth::guard('user')->user();
        $user->status = 1;
        $user->active = 1;
        $user->update();
        return redirect(route('user-dashboard'))->with('success','Successfully Published The Profile.');
    }

    public function feature()
    {
        $user = Auth::guard('user')->user();
        $user->is_featured = 1;
        $user->featured = 1;
        $user->update();
        return redirect(route('user-dashboard'))->with('success','Successfully Featured The Profile.');
    }

    public function Ratings()
    {

        $user = Auth::guard('user')->user();
        $user_id = $user->id;

        if($user->role_id == 3)
        {
            return redirect()->route('user-login');
        }


        $ratings = invoices::leftjoin('users','users.id','=','invoices.user_id')->where('invoices.handyman_id','=',$user_id)->where('invoices.pay_req',1)->Select('invoices.id','invoices.user_id','invoices.handyman_id','invoices.invoice_number','invoices.total','users.name','users.family_name','invoices.rating as client_rating','users.email','users.photo','users.family_name','invoices.is_booked','invoices.is_completed','invoices.pay_req','invoices.is_paid','invoices.is_partial','invoices.is_cancelled','invoices.cancel_req','invoices.reply','invoices.status','invoices.created_at as inv_date','invoices.booking_date')->get();



        return view('user.ratings',compact('ratings'));
    }

}
