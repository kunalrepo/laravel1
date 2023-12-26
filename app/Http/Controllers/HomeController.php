<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Person;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd($selected_person);
        $selected_person = Person::where('status',1)->first();

        $questions = [];
        if(isset($selected_person) && !empty($selected_person)){

            $questions = Question::where('person_id',$selected_person->id)->orderBy('id','desc')->get();

        }


        return view('home', compact('questions'));
    }


    public function generatePDF()
    {

        $selected_person = Person::where('status',1)->first();

        $questions = [];
        if(isset($selected_person) && !empty($selected_person)){

            $questions = Question::where('person_id',$selected_person->id)->get();

        }

        $data = [
            'title' => 'Questions For '.$selected_person->name,
            'date' => date('m/d/Y'),
            'questions' => $questions
        ];

        $file_name = 'questions for '.$selected_person->name.'.pdf';


        $pdf = PDF::loadView('questionsPDF', $data);
        return $pdf->download($file_name);

    }


}
