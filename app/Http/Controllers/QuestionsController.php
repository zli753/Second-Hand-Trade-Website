<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\questions;
use Illuminate\Support\Facades\Input;




class QuestionsController extends Controller{
    public function createquestions(Request $request, $good_id){
    	$this->validate($request,[
            'questions'=>'required|max:1000'
        ]);
        $questions=new questions();
        $questions->question=$request['questions'];
        $questions->goods_id=$good_id;
        if($questions->save()){
            $message='question successfully asked';
        }
        return redirect()->route('question.getquestions',['good_id' => $good_id])->with(['message'=>$message]);
    }
    
     public function getquestions($good_id){
     	$questions=questions::where('goods_id', $good_id)->get();
    	return view('questions',['good_id'=>$good_id, 'questions'=>$questions]);
    }
    
    public function getDeleteQuestion($question_id,$good_id){
    	$questions=questions::where('id', $question_id)->first();
    	$questions->delete();
    	return redirect()->route('question.getquestions',['good_id' => $good_id])->with(['message'=>'delete successfully']);
    }
    
    public function getEditQuestion($question_id, $good_id){
    	$questions=questions::where('id', $question_id)->first();
    	return view('editquestion',['questions'=>$questions,'good_id'=>$good_id]);
    }
    
    public function editquestionAction(Request $request, $question_id, $good_id){
    	$this->validate($request,[
            'questions'=>'required|max:1000'
        ]);
        $questions=questions::where('id', $question_id)->first();
        $questions->question=$request['questions'];       
        if($questions->update()){
        	return redirect()->route('question.getquestions',['good_id' => $good_id])->with(['message'=>'edit successfully']);
        }
    }
}