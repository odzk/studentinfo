<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageStudentsModel extends Model
{
   protected $table = 'manage_students';
   protected $guarded = array('id');
   protected $hidden = ['old_student_photo'];

   public static $rules = array(
   	'student_name' => 'required|min:5',
   	'student_nick' => 'nullable|string',
   	'skype_id' => 'nullable|string',
   	'email' => 'nullable|string',
   	'batch_num' => 'nullable|string',
   	'student_id' => 'nullable|string',
   	'gender' => 'nullable|string',
   	'birth_place' => 'nullable|string',
   	'birth_date' => 'nullable|date',
   	'age' => 'nullable|integer',
   	'it_level' => 'required|string',
   	'esl_level' => 'required|string',
   	'course_category' => 'required|array',
   	'duration' => 'required|integer',
   	'date_started' => 'required|date',
   	'date_completed' => 'nullable|date',
   	'other_info' => 'nullable|string',
   	'portfolio_1' => 'nullable|string',
   	'portfolio_2' => 'nullable|string',
   	'portfolio_3' => 'nullable|string',
      'student_photo' => 'nullable'

   	);
}

