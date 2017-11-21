@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">You are not authorized to access this page!</div>

                <div class="panel-body">
                    Error! You are not authorized to access this page, if you think this is an error, please contact the system administration!<br>
                     <a href="{{ url('manage/') }}"><button class="btn btn-default" style="margin-top: 20px;">Back</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
