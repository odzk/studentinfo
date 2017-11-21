@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Student
                <a href="{{ url('/manage/create') }}"> <button class="btn btn-default" style="margin-left: 20px;">Add New Student</button></a>
                <a href="{{ url($url) }}"> <button class="btn btn-info" style="margin-left: 20px;">{{ $button }}</button></a>
                <span style="float:right">
                    <input type="text" placeholder="Search">
                      <button type="submit">Search</button>
                    </span>
                </div>
                <div class="panel-body">

                @if(Session::has('message')) <div class="alert alert-info text-center"> {{Session::get('message')}} </div> @endif

                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="text-center">Student Photo</th>
                        <th class="text-center">Student Name</th>
                        <th class="text-center">Skype ID</th>
                        <th class="text-center">IT Level</th>
                        <th class="text-center">English Level</th>
                        <th class="text-center">Duration (weeks)</th>
                        <th class="text-center">Age</th>
                        <th class="text-center">Date Start:</th>
                        <th class="text-center">Date End:</th>
                        <th class="text-center">Notes</th>
                        <th colspan="2" class="text-center" style="background-color: #f5f8fa;">Actions</th>
                    </tr>
                    <tr>
                    @foreach ($students as $student) 

                        <?php if ($student->status == 'completed') {

                        $blocked = "style=background-color:lightblue;";
                         } 

                         elseif ($student->status == 'pending') {
                        
                        $blocked = "style=background-color:lightyellow;";
                         
                         } else {

                        $blocked = '';

                         }


                        ?>

                        

                        <td class="text-center"><img src="{{ url('/student_photo/')}}{{'/'.$student->student_photo }}" width="50px" alt="{{ $student->student_name }}" /></td>
                        <td class="text-center" {{ $blocked }}>{{ $student->student_name }}</td>
                        <td class="text-center" {{ $blocked }}><a href="skype:{{ $student->skype_id }}?add"> {{ $student->skype_id }} </a></td>
                        <td class="text-center" {{ $blocked }}>{{ $student->it_level }}</td>
                        <td class="text-center" {{ $blocked }}>{{ $student->esl_level }}</td>
                        <td class="text-center" {{ $blocked }}>{{ $student->duration }}</td>
                        <td class="text-center" {{ $blocked }}>{{ $student->age }}</td>
                        <td class="text-center" {{ $blocked }}>{{ $student->date_started }}</td>
                        <td class="text-center" {{ $blocked }}>{{ $student->date_completed }}</td>
                        <td class="text-center" {{ $blocked }}>{{ $student->other_info }}</td>

                        <td class="text-center"; style="background-color: #f5f8fa;"><a href="{{ url('manage/edit') }}/{{ $student->id}}" class="btn btn-default">Edit</a></td>
                        <td class="text-center" style="background-color: #f5f8fa;"><button class="btn btn-default" data-toggle="modal" data-target="#confirm" onclick="deleteRecord({{ $student->id }});">Delete</button></td>
                    </tr>

                    @include('manage/modal')


                    @endforeach

                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection