@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Account Details</div>
                    <div class="panel-body">
                        <form class="list-group" method="POST" action="{{ url('/accounts/update') }}/{{ $user->id }}" autocomplete="off">
                            {{ csrf_field() }}

                            <div class="list-group-item">
                                <label for="acctName">Account Holder Name:</label>
                                <input type="text" name="acctName" id="acctName" class="form-control" value="{{ $user->name }}"/>
                            </div>
                            <div class="list-group-item">
                                <label for="position">Position:</label>
                                <input type="text" name="position" id="position" class="form-control" value="{{ $user->role }}"
                                    disabled/>
                            </div>
                            <div class="list-group-item">
                                <label for="dateJoined">Date Joined:</label>
                                <input type="text" name="dateJoined" id="dateJoined" class="form-control" value="{{ $user->created_at }}"
                                    disabled/>
                            </div>
                            <div class="list-group-item">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"/>
                            </div>
                            <input type="hidden" id="accountId" name="accountId" value="{{ $user->id }}" class="form-control"/>
                            <div class="list-group-item">
                                <button type="submit" class="btn btn-info">
                                    Update
                                </button>

                                <a class="btn btn-default" href="{{ url('password') }}/{{ $user->id }}">
                                    Change Password
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop