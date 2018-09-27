@extends('app')

@section('content')
    <script>
        $(function() {
            $.datepicker.setDefaults({
                constrainInput: true,
                dateFormat: "yy-mm-dd"
            });

            $("#licenceExp").datepicker();
        });
    </script>
    <div class="container">
        <form method="POST" action="{{ url('/member/update') }}" autocomplete="off">
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
                    <div class="form-group {{ $errors->has('firstName') ? 'has-error' : '' }}">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" class="form-control"
                               placeholder="Enter First Name" value="{{ $member->First_Name }}"/>
                        <span class="text-danger">{{ $errors->first('firstName') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('lastName') ? 'has-error' : '' }}">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName"
                               placeholder="Enter Last Name" value="{{ $member->Last_Name }}"/>
                        <span class="text-danger">{{ $errors->first('lastName') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('streetAddress') ? 'has-error' : '' }}">
                        <label for="streetAddress">Street Address:</label>
                        <input type="text" class="form-control" id="streetAddress" name="streetAddress"
                               placeholder="Enter Street Address" value="{{ $member->Street_Address }}"/>
                        <span class="text-danger">{{ $errors->first('streetAddress') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('suburb') ? 'has-error' : '' }}">
                        <label for="suburb">Suburb:</label>
                        <input type="text" id="suburb" name="suburb" class="form-control"
                               placeholder="Enter Suburb" value="{{ $member->Suburb }}">
                        <span class="text-danger">{{ $errors->first('suburb') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('postcode') ? 'has-error' : '' }}">
                        <label for="postcode">Postcode:</label>
                        <input type="number" id="postcode" name="postcode" class="form-control"
                               placeholder="Enter Postcode" value="{{ $member->Postcode }}"/>
                        <span class="text-danger">{{ $errors->first('postcode') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('phoneNo') ? 'has-error' : '' }}">
                        <label for="phoneNo">Phone No:</label>
                        <input type="number" class="form-control" id="phoneNo" name="phoneNo"
                               placeholder="Enter Phone Number" value="{{ $member->Phone_No }}"/>
                        <span class="text-danger">{{ $errors->first('phoneNo') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control"
                               placeholder="Enter Email" value="{{ $member->Email_Add }}"/>
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type">Membership Type:</label>
                        <select id="type" name="type" class="form-control">
                            @if($member->Type == 1)
                                <option value="1" selected>Casual</option>
                            @else
                                <option value="1">Casual</option>
                            @endif

                            @if($member->Type == 2)
                                <option value="2" selected>Budget</option>
                            @else
                                <option value="2">Budget</option>
                            @endif

                            @if($member->Type == 3)
                                <option value="3" selected>Regular</option>
                            @else
                                <option value="3">Regular</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="licenceNoNoUpdate">License No:</label>
                        <input type="text" id="licenceNoNoUpdate" name="licenceNoNoUpdate" class="form-control"
                               placeholder="Enter License Number" value="{{ $member->Licence_No }}" disabled/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('licenceExp') ? 'has-error' : '' }}">
                        <label for="licenceExp">License Exp:</label>
                        <input type="text" class="form-control" id="licenceExp" name="licenceExp"
                               placeholder="Enter License Expiry Date" value="{{ $member->Licence_Exp }}" />
                        <span class="text-danger">{{ $errors->first('licenceExp') }}</span>
                    </div>
                </div>
            </div>

            <input type="hidden" id="memberNo" name="memberNo" class="form-control"
                   value="{{ $member->Membership_No }}"/>
            <input type="hidden" id="dateReceived" name="dateReceived" class="form-control"
                   value="{{ $member->Date_Received }}"/>
            <input type="hidden" id="licenceNo" name="licenceNo" class="form-control"
                   value="{{ $member->Licence_No }}"/>

            <button type="submit" class="btn btn-info">Submit</button>
            <a class="btn btn-default" href="{{ url('/member/displayEditPasswordForm/'.$member->Membership_No) }}">Change Password</a>
            <a href="{{ url('members') }}" class="btn btn-default">Back to Members</a>
        </form>
    </div>
@stop