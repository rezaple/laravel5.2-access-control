@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                <div class="panel-body">
                    Your Application's Landing Page.
                    @if(Auth::check() && Auth::user()->hasRole('moderator'))
                          <div>moderator</div>
                    @else
                        <div>bukan moderator</div>   
                    @endif
                    
                    @if(Auth::check())
                          <div>passed</div>
                    @else
                        <div>not passed</div>   
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
