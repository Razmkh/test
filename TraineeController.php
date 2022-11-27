<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\Reating;
use App\Models\Trainee;

use App\Models\Trainer;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TraineeController extends Controller
{

  
       
    public function gettest($id)
    {
        $trainee = new Trainee;
        $trainee = trainee::findOrFail($id);
        Session::put("nextq" , "1");
        Session::put("wrongans" , "0");
        Session::put("correctans" , "0");
        $question=  Question::all()->first();
        return view('proTrainee.test' , compact('trainee' , 'question')) ;

    }


    public function submittest(Request $request,$id)
    {
        $trainee = new Trainee;
        $trainee = trainee::findOrFail($id);
          $nextq = Session::get('nextq');
        $wrongans = Session::get('wrongans');
        $correctans = Session::get('correctans');
        $request->validate([
        
            'ans'=>'required',
            'dbans'=>'required',
         
          
           ]);

           $nextq+=1;
        if($request->dbans==$request->ans){
            $correctans+=1;

        }else{
            $wrongans+=1;
        }
        Session::put("nextq" ,  $nextq);
        Session::put("wrongans" ,    $wrongans );
        Session::put("correctans" ,  $correctans );
        $i=0;
        $questions=  Question::all();
        foreach(  $questions as   $question){
            $i++;
            if($questions->count() < $nextq){
                return view('proTrainee.result' , compact('trainee')) ;


            }
            if($i == $nextq){
                return view('proTrainee.test' , compact('trainee'))->with(['question' => $question]) ;


            }
        }
       


    }

    public function getresult($id)
    {
        $trainee = new Trainee;
        $trainee = trainee::findOrFail($id);


        return view('proTrainee.result' , compact('trainee'));



    }


    



    
    
}
