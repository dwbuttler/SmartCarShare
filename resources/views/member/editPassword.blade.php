@extends('app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ url('/member/editPassword') }}" autocomplete="off">
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
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control"
                               placeholder="Enter New Password" />
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('conPassword') ? 'has-error' : '' }}">
                        <label for="conPassword">Confirm Password:</label>
                        <input type="password" class="form-control" id="conPassword" name="conPassword"
                               placeholder="Re-Enter Password" />
                        <span class="text-danger">{{ $errors->first('conPassword') }}</span>
                    </div>
                </div>
            </div>

            <input type="hidden" id="memberNo" name="memberNo" class="form-control"
                   value="{{ $member->Membership_No }}"/>

            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ url('members') }}" class="btn btn-default">Back to Members</a>
        </form>
    </div>
@stop