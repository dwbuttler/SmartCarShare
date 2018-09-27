@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-0">
                <div class="panel panel-info">
                    <div class="panel-heading">News and Updates</div>
                    <div class="panel-body">
                        Hey <strong>{{ Auth::user()->name }}</strong>, you have been given Administrator level access.
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop