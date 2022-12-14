<?php

namespace App\Providers;

use App\all_categories;
use App\Brand;
use App\Category;
use App\Products;
use App\Service;
use App\documents;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Generalsetting;
use App\Blog;
use App\Sociallink;
use App\Seotool;
use App\Pagesetting;
use App\Language;
use App\Advertise;
use App\user_languages;
use Auth;
use App\how_it_works;
use App\reasons_to_book;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);

        view()->composer('*',function($settings){

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

            if($language == '')
            {
                $language = new user_languages;
                $language->ip = $ip_address;
                $language->lang = 'du';
                $language->save();

                \App::setLocale('du');
            }
            else
            {
                if($language->lang == 'du')
                {
                    \App::setLocale('du');
                }
                else
                {
                    \App::setLocale('en');
                }
            }

            $user = Auth::guard('user')->user();

            // if (Auth::check()) {
            //     $settings->with('currentUser', Auth::user());
            // }else {
            //     $settings->with('currentUser', null);
            // }

            $settings->with('gs', Generalsetting::where('backend',0)->first());
            $settings->with('gs1', Generalsetting::where('backend',1)->first());

            if(\Route::currentRouteName() == 'front.index' || \Route::currentRouteName() == 'front.products' || \Route::currentRouteName() == 'front.product' || \Route::currentRouteName() == 'front.services' || \Route::currentRouteName() == 'front.service')
            {
                $floor_category = all_categories::where('cat_name','LIKE', '%Floors%')->orWhere('cat_name','LIKE', '%Vloeren%')->pluck('id')->first();
                $quote_cats = Category::where('parent_id',$floor_category)->get();
                $quote_products = Products::leftjoin('categories as t1','t1.id','=','products.category_id')->leftjoin('categories as t2','t2.id','=','products.sub_category_id')->leftjoin('brands','brands.id','=','products.brand_id')->leftjoin('models','models.id','=','products.model_id')->where(function($query) {
                    $query->where('t1.cat_name','LIKE', '%Floors%')->orWhere('t1.cat_name','LIKE', '%Vloeren%');
                })->with('colors')->with('models')->select('products.id','products.user_id','products.sub_category_id as cat_id','products.brand_id','products.model_id','products.title','t1.cat_name','t2.cat_name as category','brands.cat_name as brand','models.cat_name as type')->get();
                
                $quote_services = Service::where('show_vloerofferte',1)->get();

                $settings->with('quote_cats', $quote_cats);
                $settings->with('quote_products', $quote_products);
                $settings->with('quote_services', $quote_services);
            }

            $settings->with('sl', Sociallink::find(1));
            $settings->with('seo', Seotool::find(1));
            $settings->with('ps', Pagesetting::find(1));
            $settings->with('lang', Language::where('lang','=',$language->lang)->first());
            $settings->with('hiw', how_it_works::findOrFail(1));
            $settings->with('rtb', reasons_to_book::findOrFail(1));
            $settings->with('lblogs', Blog::orderBy('created_at', 'desc')->limit(4)->get());
            $settings->with('ad728x90', Advertise::inRandomOrder()->where('size','728x90')->where('status',1)->first());
            $settings->with('ad300x250', Advertise::inRandomOrder()->where('size','300x250')->where('status',1)->first());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
