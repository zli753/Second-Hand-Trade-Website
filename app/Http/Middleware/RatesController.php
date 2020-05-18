<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\rates;
use Illuminate\Support\Facades\Input;




class RatesController extends Controller{
	public function createrates(Request $request, $user_id){
    	$this->validate($request,[
            'comments'=>'required|max:1000',
		  'score'=>'required|integer|digits_between:1,10'
        ]);
        $rates=new rates();
        $rates->comment=$request['comments'];
	   $rates->score=$request['score'];
        $rates->users_id=$user_id;
        if($rates->save()){
            $message='comment successfully submitted';
        }
        return redirect()->route('rate.getrates',['user_id' => $good_users_id])->with(['message'=>$message]);
    }
    
    
     public function getrates($good_users_id){
     $rates=rates::where('users_id', $good_users_id)->get();
    	return view('rates',['user_id'=>$good_users_id, 'rate'=>$rates]);
    }
    
    
}