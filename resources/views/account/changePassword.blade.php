@extends('app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ url('/password') }}" autocomplete="off">
            {{ csrf_field() }}

            @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input. <br/>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtCurrentPassword">Current Password:</label>
                        <input type="password" id="txtCurrentPassword" name="txtCurrentPassword" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtNewPassword">New Password:</label>
                        <input type="password" id="txtNewPassword" name="txtNewPassword" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtConfirmPassword">Confirm New Password:</label>
                        <input type="password" id="txtConfirmPassword" name="txtConfirmPassword" class="form-control"/>
                    </div>
                </div>
            </div>

            <input type="hidden" id="accountId" name="accountId" value="{{ $id }}" class="form-control"/>

            <button type="submit" class="btn btn-info">Change Password</button>
            <a href="{{ url('accounts') }}/{{ $id }}" class="btn btn-default">Back to Manage Account</a>
        </form>
    </div>
@stop