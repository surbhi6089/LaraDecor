<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\WebsiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Exception;
use GuzzleHttp\Psr7\Response;
use MailchimpMarketing\ApiClient;
use newsletter;

class WebsiteController extends Controller
{

    public function redirect(Request $request)
    {

        $user = Auth::user();
        if($user==null){
            return view('/welcome');
        }
        if($user != null){
            if($user->name == 'SurbhiAdmin' || $user->name == 'Jane'){
                return view('/welcome');
            }
            else{
                $products = Product::latest()->take(8)->get();
                return view('home', compact('products'));
            }
        }
    }

    public function aboutus(Request $request)
    {
        $url = $request->url();
        $infos = cache()->rememberForever($url, function(){
            return  WebsiteInfo::all();
        });
        return view('aboutus', compact('infos'));
    }


    public function contactus(Request $request)
    {
        $url = $request->url();
        $infos = cache()->rememberForever($url, function(){
            return  ContactInfo::all();
        });
        return view('contactus', compact('infos'));
    }


    public function newsletter(Request $request)
    {
        $email = $request->input('email');
        // dd($email);
        request()->validate(['email' => 'required|email']);

        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us10'
        ]);


        try{
            $response = $mailchimp->lists->addListMember('c8e9fffccb', [
                'email_address' => $email,
                'status' =>'subscribed'
            ]);
        }
        catch(Exception $e){

        }
        return redirect('/home');
        // dd($response);
    }
}
