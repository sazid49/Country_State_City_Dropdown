<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
Use App\Models\Country;
Use App\Models\State;
Use App\Models\City;

class CountryStateCity extends Controller
{
    function index()
    {
       $data['country']=DB::table('countries')->get();
       return view('index',$data);
    }

    function getState(Request $req)
    {
       $cid = $req->post('cid');
       $states=DB::table('states')->where('country_id',$cid)->get();
         $html='<option value="">Select state</option>';
       
         foreach ($states as  $value) {
         $html.='<option value=" '.$value->id.' ">'.$value->state.'</option>';  
         }

         echo $html;
       
    }
    function getCity(Request $req)
    {
       $sid = $req->post('sid');
       $cities = DB::table('cities')->where('state_id',$sid)->get();
         $html='<option value="">Select state</option>';
       
         foreach ($cities as  $item) {
         $html.='<option value=" '.$item->id.' ">'.$item->city.'</option>';  
         }

         echo $html;
       
    }
}
