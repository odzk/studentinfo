<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\ManageStudentsModel;

class ManageStudentsController extends Controller
{

    public function __construct()
    {
    $this->middleware('auth');
    }

    public function index(Request $request){
        $students = ManageStudentsModel::where('status', 'active')
            ->get();
        $request->user()->authorizeRoles(['student', 'teacher', 'manager']);
        $button = 'Show All Students';
        $url = 'manage/index/all';
        return view('manage/index', compact('students', 'button', 'url'));

    }

    public function all(Request $request){
        $students = ManageStudentsModel::all();
        $button = 'Hide Completed/Pending Students';
        $url = 'manage/';
        $request->user()->authorizeRoles(['student', 'teacher', 'manager']);
        return view('manage/index', compact('students', 'button', 'url'));
    }

    public function create(Request $request){
        $request->user()->authorizeRoles(['teacher', 'manager']);
        return view('manage/create');
    }

    public function store() {

        $input = Input::all();
        $validator = Validator::make($input, ManageStudentsModel::$rules);

        if ($validator->fails()) {
            return redirect('manage/create')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('message', 'Please check the following errors.');

        }



        // Check for duplicates
        if (ManageStudentsModel::where('student_name', '=', Input::get('student_name'))->exists()) {

            return redirect('manage/create')
                    ->withInput()
                    ->with('message', 'Record already exists in the database.');
        } else {

        $student = new ManageStudentsModel();
        $student->student_name = $input['student_name'];
        $student->student_nick = $input['student_nick'];
        $student->skype_id = $input['skype_id'];
        $student->email = $input['email'];
        $student->batch_num = $input['batch_num'];
        $student->student_id = $input['student_id'];
        $student->gender = $input['gender'];
        $student->birth_place = $input['birth_place'];
        $student->birth_date = $input['birth_date'];
        $student->age = $input['age'];
        $student->it_level = $input['it_level'];
        $student->esl_level = $input['esl_level'];

        $course_category = implode(',', $input['course_category']);
        $student->course_category = $course_category;

        $student->duration = $input['duration'];
        $student->date_started = $input['date_started'];
        $student->date_completed = $input['date_completed'];
        $student->other_info = $input['other_info'];
        $student->portfolio_1 = $input['portfolio_1'];
        $student->portfolio_2 = $input['portfolio_2'];
        $student->portfolio_3 = $input['portfolio_3'];
        $student->status = 'pending';


        if(isset($input['student_photo'])){
        $photo_name = time().'.'.$input['student_photo']->getClientOriginalExtension();
        $student->student_photo = $photo_name;
        $input['student_photo']->move(public_path('student_photo'), $photo_name);
        
        } else { 

        $photo_name = 'default.jpg'; 
        $student->student_photo = $photo_name;
        }

        $student->save();

        //Send Email

        $user = User::findOrFail(1);

        $get_record = Input::all();




        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('admin@kredocebu.com', 'Kredo IT Abroad Admin');

            $m->to($user->email, $user->name)->subject('New Student Enrollment!');
        });



        return redirect('manage/create')
            ->with('message', 'Record Added Successfully!');
    
        } 
    }

    public function show() {
        return "this is show!";

    }

    public function edit(Request $request, $id) {
        $get_record = ManageStudentsModel::find($id);
        $request->user()->authorizeRoles(['teacher', 'manager']);
        return view('manage/editrecord', compact('get_record'));

    }

    public function update(ManageStudentsModel $id) {
               
        $input = Input::except('_token');

        $course_category = implode(',', $input['course_category']);

        $input['course_category'] = $course_category;

        if (!isset($input['student_photo'])) {
            $input['student_photo'] = $input['old_student_photo'];

        } else {

        $photo_name = $input['student_photo']->getClientOriginalName();
        
        $input['student_photo']->move(public_path('student_photo'), $photo_name);

        $input['student_photo'] = $photo_name;

        }

        $id->update($input);
        return redirect('manage')
            ->with('message', 'Record Upated Successfully!');


    }

    public function destroy(Request $request, ManageStudentsModel $id) {
        $request->user()->authorizeRoles(['teacher', 'manager']);
        $id->delete();
        return redirect('manage')
            ->with('message', 'Record Deleted Successfully!');
        
    }


}
