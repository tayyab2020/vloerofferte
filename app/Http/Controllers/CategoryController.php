<?php

namespace App\Http\Controllers;

use App\vats;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use Auth;
use App\Generalsetting;
use Mollie\Laravel\Facades\Mollie;
use App\service_types;
use App\sub_services;
use App\handyman_services;
use App\carts;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function preparePayment()
    {


        $api_key = Generalsetting::findOrFail(1);

        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey($api_key->mollie);
        $payment = $mollie->payments->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => '10.00', // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => 'My first API payment',
            'webhookUrl' => route('webhooks.mollie'),
            'redirectUrl' => route('front.index'),
        ]);

        return redirect($payment->getCheckoutUrl(), 303);
    }


    public function index()
    {
        $cats = Category::leftjoin('service_types','service_types.id','=','categories.service_type')->orderBy('id','desc')->select('categories.id','categories.cat_name','categories.cat_slug','categories.photo','categories.description','categories.main_service','service_types.type')->get();

        return view('admin.category.index',compact('cats'));
    }

    public function create()
    {
        $service_types = service_types::all();

        $cats = Category::where('categories.main_service',1)->get();

        $vats = vats::all();

        return view('admin.category.create',compact('service_types','cats','vats'));
    }

    public function store(StoreValidationRequest $request)
    {

        if($request->main_service)
        {
            $request['main_service'] = 1;

        }
        else
        {
            $request['main_service'] = 0;


        }


        $cat = new Category;
        $input = $request->all();
            if ($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
            $input['photo'] = $name;
            }
        $cat->fill($input)->save();

        if(!$request->main_service)
        {


        foreach ($request->sub_service as $key) {

            if($key)
            {

            $sub_services = new sub_services;
            $sub_services->cat_id = $key;
            $sub_services->sub_id = $cat->id;
            $sub_services->save();

            }

        }



        }



        Session::flash('success', 'New Service added successfully.');
        return redirect()->route('admin-cat-index');
    }

    public function edit($id)
    {
        $cat = Category::findOrFail($id);

        $service_types = service_types::all();

        $cats = Category::where('categories.main_service',1)->get();

        $sub_services = sub_services::leftjoin('categories','categories.id','=','sub_services.cat_id')->leftjoin('service_types','service_types.id','=','categories.service_type')->where('sub_id',$cat->id)->select('sub_services.id','sub_services.cat_id','service_types.type')->get();


        return view('admin.category.edit',compact('cat','service_types','cats','sub_services'));
    }

    public function update(UpdateValidationRequest $request, $id)
    {

        if(!$request->main_service)
        {

            $i =0;

        foreach ($request->sub_service as $key) {

            if($request->s_id[$i] != 0)
            {

            $update = sub_services::where('id',$request->s_id[$i])->update(['cat_id'=>$key]);

            }
            else
            {

            $sub_services = new sub_services;
            $sub_services->cat_id = $key;
            $sub_services->sub_id = $id;
            $sub_services->save();

            }

            $i++;

        }



        }

        $cat = Category::findOrFail($id);
        $input = $request->all();
            if ($file = $request->file('photo'))
            {
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($cat->photo != null)
                {
                    unlink(public_path().'/assets/images/'.$cat->photo);
                }
            $input['photo'] = $name;
            }
        $cat->update($input);
        Session::flash('success', 'Service updated successfully.');
        return redirect()->route('admin-cat-index');
    }

    public function destroy($id)
    {

        $cat = Category::findOrFail($id);

        if($cat->main_service){

            $sub = sub_services::where('cat_id',$id)->delete();
            $handyman = handyman_services::where('service_id',$id)->orWhere('main_id',$id)->delete();

        }
        else
        {

            $sub = sub_services::where('sub_id',$id)->delete();
            $handyman = handyman_services::where('service_id',$id)->delete();

        }

        $cart = carts::where('service_id',$id)->delete();


        if($cat->photo == null){
         $cat->delete();
        Session::flash('success', 'Service deleted successfully.');
        return redirect()->route('admin-cat-index');
        }
        unlink(public_path().'/assets/images/'.$cat->photo);
        $cat->delete();
        Session::flash('success', 'Service deleted successfully.');
        return redirect()->route('admin-cat-index');
    }
}
