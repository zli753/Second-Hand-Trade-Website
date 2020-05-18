<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\goods;
use Illuminate\Support\Facades\Input;




class GoodController extends Controller{
    public function getDashboard(){
    	$Goods=goods::all();
        return view('dashboard',['Goods'=>$Goods]);
    }
    
    public function getMainboard(){
    	$Goods=goods::all();
        return view('mainboard',['Goods'=>$Goods]);
    }
    
    public function getFurniture(){
    	$fur = "furniture";
    	$Goods=goods::where('cate', $fur)->get();
    	return view('mainboard',['Goods'=>$Goods]);
    }
    public function getElectronics(){
    	$ele = "electronics";
    	$Goods=goods::where('cate', $ele)->get();
    	return view('mainboard',['Goods'=>$Goods]);
    }
    public function getBook(){
    	$book = "book";
    	$Goods=goods::where('cate', $book)->get();
    	return view('mainboard',['Goods'=>$Goods]);
    }
    public function getOther(){
    	$other = "other";
    	$Goods=goods::where('cate', $other)->get();
    	return view('mainboard',['Goods'=>$Goods]);
    }
    public function getSearchedGood(Request $request){
    	$this->validate($request,[
            'search'=>'required|max:1000'
        ]);
        $keyword = $request['search'];
    	$temp=goods::where('goodname', 'RLIKE', $keyword);
    	$Goods=goods::where('description', 'RLIKE', $keyword)->union($temp)->get();
    	
    	return view('mainboard',['Goods'=>$Goods]);
    }
    
    public function getGoodMap($good_address){
    	return view('map',['good_address'=>$good_address]);
    }
    
    public function getDeleteGoods($good_id){
    	$Goods=goods::where('id', $good_id)->first();
    	if(Auth::user() != $Goods->users){
    		return redirect()->back();
    	}
    	$Goods->delete();
    	return redirect()->route('mainboard')->with(['message'=>'delete successfully']);
    }
    
    public function getEditGoods($good_id){
    	$Goods=goods::where('id', $good_id)->first();
    	if(Auth::user() != $Goods->users){
    		return redirect()->back();
    	}
    	return view('edit',['Goods'=>$Goods]);
    }
    
    
    public function goodCreateGood (Request $request){
        $this->validate($request,[
            'goodname'=>'required|max:100',
            'description'=>'required|max:1000',
            'address'=>'required|max:100',
            'contact'=>'required|max:100',
            'cate'=>'required|max:100',
            'picture'=>'required'
        ]);
        $file = Input::file("picture");
        $file = $file->move(public_path(), "/img/".$file->getClientOriginalName());
        $filename=$request->file('picture')->getClientOriginalName();
        $goods=new goods();
        $goods->goodname=$request['goodname'];
        $goods->description=$request['description'];
        $goods->picture=$filename;
        $goods->address=$request['address'];
        $goods->contact=$request['contact'];
        $goods->cate=$request['cate'];
        $message='There was an error';
        if($request->user()->good()->save($goods)){
            $message='Good successfully created';
        }
        return redirect()->route('dashboard')->with(['message'=>$message]);
    }
    
    public function editgoodAction(Request $request, $good_id){
    	$this->validate($request,[
            'goodname'=>'required|max:100',
            'description'=>'required|max:1000',
            'address'=>'required|max:100',
            'contact'=>'required|max:100',
            'cate'=>'required|max:100',
            'picture'=>'required'
        ]);
        $file = Input::file("picture");
        $file = $file->move(public_path(), "/img/".$file->getClientOriginalName());
        $filename=$request->file('picture')->getClientOriginalName();
        $Goods=goods::where('id', $good_id)->first();
        $Goods->goodname=$request['goodname'];
        $Goods->description=$request['description'];
        $Goods->picture=$filename;
        $Goods->address=$request['address'];
        $Goods->contact=$request['contact'];
        $Goods->cate=$request['cate'];
        if($Goods->update()){
        	return redirect()->route('mainboard')->with(['message'=>'edit successfully']);
        }
        
    }
    
}