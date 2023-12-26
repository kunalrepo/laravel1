<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Person;
use App\Models\Question;

class QuestionController extends Controller
{
    //

    public function new_question(Request $request){

        $selected_person = Person::where('status',1)->first();

        $data = $request->all();
        $data['person_id'] = $selected_person->id;
        //  dd($data);

        Question::create($data);

        return redirect()->back()->with('thanks_msg','Your question has been successfully submitted. Thank you for participating!');


    }


    public function delete_question($id){

        $question = Question::findOrFail($id);

        $question->delete();

        return redirect()->back()->with('success','Question Deleted successfully');

    }


}
