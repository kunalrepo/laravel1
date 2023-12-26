<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Person;
use App\Models\Question;

class PersonController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $person = Person::orderBy('id','desc')->get();

        // $selected_person = Person::where('status',1)->first();

        return view('person.index',compact('person'));
    }


    public function create(){

        return view('person.create');

    }


    public function store(Request $request){

        $data = $request->all();

        Person::create($data);

        return redirect()->back()->with('success','Person added successfully');

    }


    public function select_person(Request $request){
        $data = $request->all();

        try{
        Person::where('status', 1)->update(['status' => 0]);

        $message = 'No person';
        if(!empty($data['person_id'])){

            $data['start_date'] = date("Y-m-d H:i:s", strtotime($data['start_date']));
            $data['end_date'] = date("Y-m-d H:i:s", strtotime($data['end_date']));

            $person = Person::find($data['person_id']);
            $person->update(['status' => 1, 'start_date' => $data['start_date'], 'end_date' => $data['end_date'], 'time_expired' => 0]);
            $message = $person->name.' person';
        }

        return redirect()->back()->with('success', $message.' selected for FAQ activity');

        }catch(Exception $e) {
            return redirect()->back()->with('error', $message.' something went wrong');
        }
    }

    public function delete_person($id){

        $person = Person::findOrFail($id);
        // dd($person);

       $question =  Question::where('person_id',$id)->first();

       if(empty($question) && $person->status == 0){
        $person->delete();
        return redirect()->back()->with('success','Person Deleted successfully');
       }else{
        return redirect()->back()->with('warning','Questions Assigned to this person');
       }


    }

    public function time_exipred(){

        $selected_person = Person::where('status',1)->update(['time_expired' => 1]);

        return response()->json(['success'=>true]);
    }

}
