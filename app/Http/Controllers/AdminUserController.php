<?php

namespace App\Http\Controllers;

use App\Category;
use App\handyman_terminals;
use App\handyman_unavailability;
use App\quotes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use Auth;
use App\bookings;
use App\handyman_services;
use App\users;
use App\service_types;
use App\invoices;
use App\handyman_temporary;
use File;
use PDF;


class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::where('role_id','=',2)->orderBy('created_at','desc')->get();

        foreach ($users as $key) {

             $categories[] = handyman_services::leftjoin('categories','categories.id','=','handyman_services.service_id')->where('handyman_services.handyman_id',$key->id)->select('categories.cat_name')->get();


        }

        return view('admin.user.index',compact('users','categories'));
    }


    public function QuotationRequests()
    {
        $requests = quotes::leftjoin('categories','categories.id','=','quotes.quote_service')->orderBy('quotes.created_at','desc')->select('quotes.*','categories.cat_name')->get();

        return view('admin.user.quote_requests',compact('requests'));
    }

    public function QuoteRequest($id)
    {
        $request = quotes::leftjoin('categories','categories.id','=','quotes.quote_service')->where('quotes.id',$id)->select('quotes.*','categories.cat_name')->first();

        $services = Category::where('main_service',1)->get();

        return view('admin.user.quote_request',compact('request','services'));
    }

    public function SendQuoteRequest($id)
    {
        $request = quotes::leftjoin('categories','categories.id','=','quotes.quote_service')->where('quotes.id',$id)->select('quotes.*','categories.cat_name')->first();

        $search = $request->quote_zipcode;

        $url = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBNlftIg-4OOM7dicTvWaJm46DgD-Wz61Q&address=".urlencode($search).",+Netherlands&sensor=false";

        $result_string = file_get_contents($url);
        $result = json_decode($result_string, true);


        if(($result['status']) != 'ZERO_RESULTS' )
        {
            $user_latitude = $result['results'][0]['geometry']['location']['lat'];
            $user_longitude = $result['results'][0]['geometry']['location']['lng'];

            $array[] = "";
            $array1[] = "";
            $i = 0;

            $post = handyman_terminals::all();

            foreach ($post as $key ) {

                $lat = $key->latitude;
                $lng = $key->longitude;

                $theta = $lng - $user_longitude;
                $dist = sin(deg2rad($lat)) * sin(deg2rad($user_latitude)) +  cos(deg2rad($lat)) * cos(deg2rad($user_latitude)) * cos(deg2rad($theta));
                $dist = acos($dist);
                $dist = rad2deg($dist);
                $miles = $dist * 60 * 1.1515;
                $distance = $miles * 1.609344;

                $array[$i] = array('handyman_id'=>$key->handyman_id);
                $array1[$i] = array('handyman_distance'=>$distance);
                $i = $i + 1;

            }


            $handymen = handyman_services::leftjoin('users','users.id','=','handyman_services.handyman_id')->whereIn('users.id', $array)->where('users.active',1)->where('handyman_services.service_id','=', $request->quote_service)->select('users.*')->get();

        }

        else
        {
            $handymen = '';
        }

        return view('admin.user.send_quote',compact('request','handymen','array1'));
    }

    public function SendQuoteRequestHandymen(Request $request)
    {
        $handyman = $request->action;

        $quote = quotes::leftjoin('categories','categories.id','=','quotes.quote_service')->where('quotes.id',$request->quote_id)->select('quotes.*','categories.cat_name')->first();

        $pdf = PDF::loadView('admin.user.pdf_quote',compact('quote'))->setPaper('letter', 'portrait')->setOptions(['dpi' => 140]);

        $date = strtotime($quote->created_at);

        $quote_number = date("Y", $date) . "-" . sprintf('%04u', $quote->id);

        ini_set('max_execution_time', 180);

        $filename = $quote_number.'.pdf';

        $pdf->save(public_path().'/assets/quotesPDF/'.$filename);

        foreach ($handyman as $key)
        {
            $user = users::where('id',$key)->first();
            $email = $user->email;

            $user_name = $user->name. ' ' .$user->family_name;

            $handyman_dash = url('/').'/handyman/dashboard';

            $path = public_path().'/assets/quotesPDF/';
            $file = $path . "/" . $filename;

            $link = url('/').'/handyman/client-dashboard';

            $msg = "Dear Mr/Mrs ".$user_name.",<br><br>You have received a quotation request. You can take further action from your dashboard through <a href='".$link."'>here.</a><br><br>Kind regards,<br><br>Klantenservice Topstoffeerders";

            \Mail::raw($msg, function ($message) use($file,$email,$filename){
                $message->from('info@topstoffeerders.nl');
                $message->to($email)->subject('Quotation Request!');

                        $message->attach($file, [
                            'as' => $filename,
                            'mime' => 'application/pdf',
                        ]);

            });

        }


    }

    public function Clients()
    {
        $users = User::where('role_id','=',3)->orderBy('created_at','desc')->get();

        foreach ($users as $key) {

             $categories[] = handyman_services::leftjoin('categories','categories.id','=','handyman_services.service_id')->where('handyman_services.handyman_id',$key->id)->select('categories.cat_name')->get();


        }

        return view('admin.user.clients',compact('users','categories'));
    }

    public function UserBookings()
    {
        $users_bookings = invoices::leftjoin('users','users.id','=','invoices.user_id')->Select('users.name','users.family_name','users.email','invoices.booking_date','invoices.total','invoices.status','invoices.id','invoices.handyman_id','invoices.is_booked','invoices.is_completed','invoices.pay_req','invoices.is_partial','invoices.is_cancelled','invoices.cancel_req','invoices.reason','invoices.reply','invoices.is_paid','invoices.created_at as inv_date','invoices.invoice_number','invoices.user_id')->orderBy('id', 'desc')->get();

        $handymans_booked = invoices::leftjoin('users','users.id','=','invoices.handyman_id')->orderBy('invoices.id', 'desc')->get();

        $data[] = array('users'=>$users_bookings,'handymans'=>$handymans_booked);




        return view('admin.user.bookings',compact('data'));
    }

    public function UserRequests()
    {
        $users_requests = handyman_temporary::leftjoin('users','users.id','=','handyman_temporary.handyman_id')->Select('users.name','users.family_name','users.email','handyman_temporary.created_at as Date','handyman_temporary.updated_at as UpdateDate','users.photo','handyman_temporary.handyman_id')->orderBy('handyman_temporary.id', 'desc')->get();

        return view('admin.user.requets',compact('users_requests'));
    }

    public function UserRequest($id)
    {
        $user = handyman_temporary::where('handyman_id','=',$id)->first();
        return view('admin.user.request',compact('user'));
    }

     public function RequestProfileUpdate(Request $request)
    {
        $input = $request->all();

        $user_id = $input['handyman_id'];

        $user = users::where('id',$user_id)->first();

        if($input['photo'])
        {
            $old_path =  public_path().'/assets/temporary_images/'. $input['photo'];

            $new_path =  public_path().'/assets/images/'. $input['photo'];

            $move = File::move($old_path, $new_path);

            if($user->photo != null)
                {
                    unlink(public_path().'/assets/images/'.$user->photo);
                }
        }
        else
        {

            $input['photo'] = $user->photo;

        }


        $update = users::where('id',$user_id)->update(['name' => $input['name'], 'family_name' => $input['family_name'], 'photo' => $input['photo'], 'description' => $input['description'], 'language' => $input['language'], 'education' => $input['education'], 'profession' => $input['profession'], 'city' => $input['city'], 'address' => $input['address'], 'phone' => $input['phone'],  'web' => $input['web'], 'special' => $input['special'], 'registration_number' => $input['registration_number'], 'company_name' => $input['company_name'], 'tax_number' => $input['tax_number'], 'bank_account' => $input['bank_account'], 'postcode' => $input['postcode'] ]);

        $delete = handyman_temporary::where('handyman_id',$user_id)->delete();

        $user = User::findOrFail($user_id);

        $email = $user->email;

        $user_name = $user->name. ' ' .$user->family_name;

        $handyman_dash = url('/').'/handyman/dashboard';


        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Profile Information Updated Successfully!";
        $msg = "Dear Mr/Mrs ". $user_name .",<br><br>Your profile information update request has been approved. For further details visit your handyman panel through <a href='".$handyman_dash."'>here.</a><br><br>Kind regards,<br><br>Klantenservice Topstoffeerders";
        mail($email,$subject,$msg,$headers);


        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Profiel informatie is geupdate";
        $msg = "Beste". $user_name .",<br><br>je wijziging in je profiel is goeggekeurd. Klik op account om de status van je klus te bekijken <a href='".$handyman_dash."'>account.</a><br><br>Met vriendelijke groet,<br><br>Klantenservice Topstoffeerders";
        mail($email,$subject,$msg,$headers);

        Session::flash('success', 'Profile Updated Successfully');

        return redirect()->route('admin-user-requests');
    }


  public function status($id1,$id2)
    {

        $user = User::findOrFail($id1);
        $user->active = $id2;
        $user->featured = $id2;
        $user->update();
        Session::flash('success', 'Status updated Successfully');

        return redirect()->route('admin-user-index');
    }

    public function create()
    {
        $cats = Category::all();
        return view('admin.user.create',compact('cats'));
    }

    public function store(StoreValidationRequest $request)
    {

        $user = new User;
        $input = $request->all();
            if ($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
            $input['photo'] = $name;
            }

            if($request->featured == "")
            {
                $input['featured'] = 0;
            }

            if(in_array(null, $request->title) || in_array(null, $request->details))
            {
                $input['title'] = null;
                $input['details'] = null;
            }
            else
            {
                $input['title'] = implode(',', $request->title);
                $input['details'] = implode(',', $request->details);
            }
            if(strpos($request->address,'&')===true)
            {
                $input['address'] = str_replace("&","and",$request->address);
            }
        if (!empty($request->special))
         {
            $input['special'] = implode(',', $request->special);
         }
        $input['password'] = bcrypt($request['password']);
        $user->fill($input)->save();
        Session::flash('success', 'New User added successfully.');
        return redirect()->route('admin-user-index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $cats = Category::all();
        if($user->title!=null && $user->details!=null)
        {
            $title = explode(',', $user->title);
            $details = explode(',', $user->details);
        }
        if($user->special != null)
        {
            $specials = explode(',', $user->special);
        }
        return view('admin.user.edit',compact('user','cats','title','details','specials'));
    }

    public function update(UpdateValidationRequest $request,$id)
    {
        $input = $request->all();
        $user = User::findOrFail($id);
        if(!in_array(null, $request->title) && !in_array(null, $request->details))
        {
            $input['title'] = implode(',', $request->title);
            $input['details'] = implode(',', $request->details);
        }
        else
        {
            if(in_array(null, $request->title) || in_array(null, $request->details))
            {
                $input['title'] = null;
                $input['details'] = null;
            }
            else
            {
                $title = explode(',', $user->title);
                $details = explode(',', $user->details);
                $input['title'] = implode(',', $title);
                $input['details'] = implode(',', $details);
            }
        }
            if ($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($user->photo != null)
                {
                    unlink(public_path().'/assets/images/'.$user->photo);
                }
            $input['photo'] = $name;
            }
        if (!empty($request->special))
         {
            $input['special'] = implode(',', $request->special);
         }
        if (empty($request->special))
         {
            $input['special'] = null;
         }
        if(!empty($input['password'])){
        $input['password'] = bcrypt($request['password']);

        }
        else{
         $input['password'] = $user->password;
        }
        if($request->featured == "")
        {
            $input['featured'] = 0;
        }
        $ck = strpos($request->address,'&');

            if($ck !== false)
            {
                $input['address'] = str_replace("&","and",$request->address);
            }

        $user->update($input);
        Session::flash('success', 'Successfully updated the User');
        return redirect()->route('admin-user-index');
    }

     public function InsuranceUpdate(Request $request)
    {



        $post = User::where('id','=',$request->handyman_id)->update(['insurance' => 1]);


$user = User::findOrFail($request->handyman_id);

$email = $user->email;

$user_name = $user->name. ' ' .$user->family_name;

$handyman_dash = url('/').'/handyman/dashboard';


             $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Insurance POD Approved!";
            $msg = "Dear Mr/Mrs ". $user_name .",<br><br>Your insurance pod has been approved. For further details visit your handyman panel through <a href='".$handyman_dash."'>here.</a><br><br>Kind regards,<br><br>Klantenservice Topstoffeerders";
            mail($email,$subject,$msg,$headers);



            $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From: Topstoffeerders <info@topstoffeerders.nl>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = "Verzekering!";
            $msg = "Beste". $user_name .",<br><br>je verzekering status is goedgekeurd. Klik op account om de status van je wijziging te bekijken <a href='".$handyman_dash."'>account.</a><br><br>Met vriendelijke groet,<br><br>Klantenservice Topstoffeerders";
            mail($email,$subject,$msg,$headers);


        Session::flash('success', 'Successfully updated the User');
        return redirect()->route('admin-user-index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->photo == null){
         $user->delete();
        Session::flash('success', 'Successfully deleted your User');
        return redirect()->route('admin-user-index');
        }

        unlink(public_path().'/assets/images/'.$user->photo);
        $user->delete();
        Session::flash('success', 'Successfully deleted your User');
        return redirect()->route('admin-user-index');
    }

    public function Insurance($id)
    {
        $user = User::findOrFail($id);
        $cats = Category::all();

        return view('admin.user.insurance',compact('user','cats'));
    }

    public function Details($id)
    {
        $user = User::findOrFail($id);

        $no = 0;



            $post = invoices::where('handyman_id','=',$id)->where('is_completed',1)->get();

            foreach ($post as $temp) {

                $no = $no + 1;
            }



        return view('admin.user.details',compact('user','no'));
    }

    public function ClientDetails($id)
    {
        $user = User::findOrFail($id);


        return view('admin.user.client_details',compact('user'));
    }
}


