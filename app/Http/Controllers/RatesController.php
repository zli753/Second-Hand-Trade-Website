<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\rates;
use App\users;
use Illuminate\Support\Facades\Input;




class RatesController extends Controller{
	public function createrates(Request $request, $user_id){
    	$this->validate($request,[
            'comments'=>'required|max:1000',
		    'score'=>'required|integer|between:1,10'
        ]);
        $rates=new rates();
        $rates->comment=$request['comments'];
	   $rates->score=$request['score'];
        $rates->users_id=$user_id;
        if($rates->save()){
            $message='comment successfully submitted';
        }
        return redirect()->route('rate.getrates',['user_id' => $user_id])->with(['message'=>$message]);
    }
    
    
     public function getrates($good_userid){
       $rates=rates::where('users_id', $good_userid)->get();
	   $value=0;
	   $count=0;
	   foreach ($rates as $rate) {
         $value = $value + $rate['score'];
		 $count=$count+1;
       }
	   if ($count==0){
		$average=0;
	   } else{
		$average=$value/$count;
	   }
	   $seller=users::where('id', $good_userid)->get();
	   $sellername=$seller[0]['username'];
    	return view('rates',['user_id'=>$good_userid, 'rates'=>$rates, 'average'=>$average, 'sellername'=>$sellername]);
    }
    
    
}