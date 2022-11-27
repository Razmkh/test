<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {

        $question = Question::all();
        return view('dashboard.question.index', compact('question'));
    }
    
    public function create()
    {


        return view('dashboard.question.create');
    }
    public function store(Request $request)
    {
        $request->validate([
        
            'question'=>'required',
            'ans'=>'required',
            'a'=>'required|max:500',
            'b'=>'required|max:500',
            'c'=>'required|max:500',
            'd'=>'required|max:500',

            'image'=>'required|mimes:jpeg,jpg,png'
          
           ]);
           $question = new Question();
           $question -> question = $request->input('question') ;
           $question -> ans = $request->input('ans') ;
           $question -> a = $request->input('a') ;
           $question -> b = $request->input('b') ;
           $question -> c = $request->input('c') ;
           $question -> d = $request->input('d') ;

           if($request->hasfile('image'))
           {
             $file = $request->file('image');
             $extention = $file ->getClientOriginalExtension();
             $filename = time().'.'.$extention;
             $file->move('uploads/images/question/' , $filename);
             $question->image = $filename ;
           }
        $question->save();
         
            return redirect()-> back()     ->with('success', 'question created successfully.');
        }

        public function destroy($id)
        {
            $question = Question::find($id);
           
            $question->delete();
            return redirect()-> back() -> with('status', 'Deleted DONE');
        }


}
