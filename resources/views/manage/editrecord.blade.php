@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Student
                <a href="{{ url('manage/') }}"><button class="btn btn-default" style="margin-left: 20px;">Back</button></a>
                </div>
        <div class="panel-body">
        <h2 class="text-center">Student's Information</h2>
        @if(Session::has('message')) <div class="alert alert-info text-center"> {{Session::get('message')}} </div> @endif
        <ul>
        @foreach ($errors->all() as $message) 

        <li style="color:red;"> {{ $message }}</li>

        @endforeach

        </ul>

        {!! Form::open(['url' => 'manage/update/' . $get_record->id, 'class' => 'form-vertical', 'files' => true]) !!}

        <div class="col-sm-6">
        <?php

        $status1 = $status2 = $status3 = '';

        if ($get_record->status == 'active') {
            $status1 = 'selected';
        } 

        if ($get_record->status == 'completed') {
            $status2 = 'selected';
        } 

        if ($get_record->status == 'pending') {
            $status3 = 'selected';
        }
        

        ?>

        <label for="status" style="margin-top:10px;">Status: </label>
        <select name="status" id="status" class="form-control">
        <option name="status" value="active" {{ $status1 }} >Active</option>
        <option name="status" value="completed" {{ $status2 }} >Completed</option>
        <option name="status" value="pending" {{ $status3 }} >Pending</option>
        </select>

        <label for="student_name" style="margin-top:10px;">Student Name: 名前 </label>
        <input type="text" name="student_name" id="student_name" class="form-control" value="{{ $get_record->student_name }}" placeholder="Enter Complete Name"><span style="color:red;">{{ $errors->first('student_name') }} </span>
 
        <label for="student_nick" style="margin-top:10px;">Student's Nick Name:  ニックネーム（あれば）</label>
        <input type="text" name="student_nick" id="student_nick" class="form-control" value="{{ $get_record->student_nick }}" placeholder="Enter Student Nick Name">

        <label for="skype_id" style="margin-top:10px;">Skype ID: </label>
        <input type="text" name="skype_id" id="skype_id" class="form-control" value="{{ $get_record->skype_id }}" placeholder="Skype ID">

        <label for="email" style="margin-top:10px;">Email: </label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $get_record->email }}" placeholder="Email">
 
        <label for="batch_number" style="margin-top:10px;">Batch Number: グループ番号 </label>
        <input type="text" name="batch_num" id="batch_num" class="form-control" value="{{ $get_record->batch_num }}" placeholder="Batch Number">
    
        <label for="student_id" style="margin-top:10px;">Student ID: 学生証 </label>
        <input type="text" name="student_id" id="student_id" class="form-control" value="{{ $get_record->student_id }}" placeholder="Student ID">

        <label for="gender" style="margin-top:10px;">Gender: 性別 </label>
        <select name="gender" class="form-control">

        @if ($get_record->gender == 'male')

        <option value="male" selected>Male 男性</option>
        <option value="female">Female 女性</option>

        @else
        
        <option value="male">Male 男性</option>
        <option value="female" selected>Female 女性</option>

        @endif
        </select>

        <label for="birth_place" style="margin-top:10px;">Birth Place: 出身地 </label>
        <input type="text" name="birth_place" id="birth_place" class="form-control" value="{{ $get_record->birth_place }}" placeholder="Birth Place">

        <label for="birth_date" style="margin-top:10px;">Date of Birth: 誕生日 </label>
        <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ $get_record->birth_date }}" placeholder="yyyy/mm/dd">

        <label for="age" style="margin-top:10px;">Age 年齢</label>
        <input type="number" name="age" id="age" value="{{ $get_record->age }}" class="form-control">

        <label style="margin-top:30px;">To be filled out by Kredo Staff:</label><br>

        <label style="margin-top:10px;">IT Level</label><br>
        <span style="color:red">{{ $errors->first('it_level') }}</span><br>

        @if ($get_record->it_level == 'beginner')
        <input type="radio" name="it_level" value="beginner" checked> Beginner<br>
        <input type="radio" name="it_level" value="average"> Average<br>
        <input type="radio" name="it_level" value="advance"> Advance<br><br>


        @elseif ($get_record->it_level == 'average')
        <input type="radio" name="it_level" value="beginner"> Beginner<br>
        <input type="radio" name="it_level" value="average" checked> Average<br>
        <input type="radio" name="it_level" value="advance"> Advance<br><br>

        @else
        <input type="radio" name="it_level" value="beginner"> Beginner<br>
        <input type="radio" name="it_level" value="average"> Average<br>
        <input type="radio" name="it_level" value="advance" checked> Advance<br><br>

        @endif

        <label style="margin-top:10px;">ESL Level</label><br>
        <span style="color:red">{{ $errors->first('esl_level') }}</span><br>

        @if ($get_record->esl_level == 'beginner')
        <input type="radio" name="esl_level" value="beginner" checked> Beginner<br>
        <input type="radio" name="esl_level" value="average"> Average<br>
        <input type="radio" name="esl_level" value="advance"> Advance<br><br>
    
        @elseif ($get_record->esl_level == 'average')
        <input type="radio" name="esl_level" value="beginner"> Beginner<br>
        <input type="radio" name="esl_level" value="average" checked> Average<br>
        <input type="radio" name="esl_level" value="advance"> Advance<br><br>

        @else
        <input type="radio" name="esl_level" value="beginner"> Beginner<br>
        <input type="radio" name="esl_level" value="average"> Average<br>
        <input type="radio" name="esl_level" value="advance" checked> Advance<br><br>

        @endif

        <?php $course_category = $get_record->course_category ?>

        <?php 

        $checked1 = $checked2 = $checked3 = $checked4 = $checked5 = $checked6 = $checked7 = '';

        if(strpos($course_category, 'wdes1') !== false) {
        $checked1 = 'checked'; }

        if(strpos($course_category, 'wdes2') !== false) {
        $checked2 = 'checked'; }
        
        if(strpos($course_category, 'wdev1') !== false) {
        $checked3 = 'checked'; }

        if(strpos($course_category, 'wdev2') !== false) {
        $checked4 = 'checked'; }

         if(strpos($course_category, 'esl') !== false) {
        $checked5 = 'checked'; }

        if(strpos($course_category, 'ruby') !== false) {
        $checked6 = 'checked'; }

        if(strpos($course_category, 'kids') !== false) {
        $checked7 = 'checked'; }

        ?>

        <label style="margin-top:10px;">Course Category</label><br>
        <span style="color:red">{{ $errors->first('course_category') }}</span><br>
        <input type="checkbox" name="course_category[]" value="wdes1" {{ $checked1 }}> Web Design I<br>
        <input type="checkbox" name="course_category[]" value="wdes2" {{ $checked2 }}> Web Design II<br>
        <input type="checkbox" name="course_category[]" value="wdev1" {{ $checked3 }}> Web Development I<br>
        <input type="checkbox" name="course_category[]" value="wdev2" {{ $checked4 }}> Web Development II<br>
        <input type="checkbox" name="course_category[]" value="wdev2" {{ $checked5 }}> ESL <br>
        <input type="checkbox" name="course_category[]" value="ruby" {{ $checked6 }}> Ruby on Rails <br>
        <input type="checkbox" name="course_category[]" value="kids" {{ $checked7 }}> Kids / Junior Camp <br>




        <label for="duration" style="margin-top:30px;">Duration: 期間</label>
        <input type="number" name="duration" class="form-control" id="duration" value="{{ $get_record->duration }}" placeholder="Number of Weeks">
        <span style="color:red">{{ $errors->first('duration') }}</span><br>

        <label for="date_started" style="margin-top:10px;">Date Started: 開始日</label>
        <input type="date" name="date_started" id="date_started" class="form-control" value="{{ $get_record->date_started }}" placeholder="yyyy/mm/dd">
        <span style="color:red">{{ $errors->first('date_started') }}</span><br>

        <label for="date_completed" style="margin-top:10px;">Date Completed: 終了日</label>
        <input type="date" name="date_completed" id="date_completed" class="form-control" value="{{ $get_record->date_completed }}" placeholder="yyyy/mm/dd">
        <label for="other_info" style="margin-top: 10px;">Other Information About the Student: その他</label>
        <textarea class="form-control" name="other_info" placeholder="Other info like VIP, high level IT skill etc." id="other_info" rows="3">{{ $get_record->other_info }}</textarea>
    

        <label style="margin-top: 30px">To be filled out after graduation:</label>
        <label for="portfolio_1">Student Portfolio Website Link</label>
        <input type="text" class="form-control" id="portfolio_1" name="portfolio_1" placeholder="http://www.example.com" value="{{ $get_record->portfolio_1 }}">
        <label for="portfolio_2">Student Portfolio Website Link</label>
        <input type="text" class="form-control" id="portfolio_2" name="portfolio_2" placeholder="http://www.example.com" value="{{ $get_record->portfolio_2 }}">
        <label for="portfolio_3">Student Portfolio Website Link</label>
        <input type="text" class="form-control" id="portfolio_3" name="portfolio_3" placeholder="http://www.example.com" value="{{ $get_record->portfolio_3 }}">


        {{ Form::submit('Update', ['class' => 'btn', 'style' => 'margin-top: 30px;']) }}

        </div>
       
        <div class="col-md-2">

        <img src="{{ url('/student_photo/')}}{{'/'.$get_record->student_photo }}" width="250px" alt="{{ $get_record->student_name }}">
        <input type="hidden" name="old_student_photo" value="{{ $get_record->student_photo }}">
        <input type="file" name="student_photo" id="student_photo">
         {!! Form::close() !!}
        </div>

        </div>
        </div>
        </div>


@endsection