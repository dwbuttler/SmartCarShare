@extends('app')

@section('content')
    <script>
        $(function() {
            $.datepicker.setDefaults({
                constrainInput: true,
                dateFormat: "yy-mm-dd"
            });

            $("#licenceExp").datepicker();

            $("#address").geocomplete({
                details: ".geo-details",
                detailsAttribute: "data-geo"
            });
        });
    </script>
    <div class="container">
        <form method="POST" action="/member" autocomplete="off">
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
                               placeholder="Enter First Name" value="{{ old("firstName") }}"/>
                        <span class="text-danger">{{ $errors->first('firstName') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('lastName') ? 'has-error' : '' }}">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName"
                               placeholder="Enter Last Name" value="{{ old("lastName") }}"/>
                        <span class="text-danger">{{ $errors->first('lastName') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address"
                               placeholder="Enter Street Address" value="{{ old("address") }}"/>
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('phoneNo') ? 'has-error' : '' }}">
                        <label for="phoneNo">Phone No:</label>
                        <input type="number" class="form-control" id="phoneNo" name="phoneNo"
                               placeholder="Enter Phone Number" value="{{ old("phoneNo") }}"/>
                        <span class="text-danger">{{ $errors->first('phoneNo') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control"
                               placeholder="E.g. someone@somewhere.com" value="{{ old("email") }}"/>
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type">Membership Type:</label>
                        <select id="type" name="type" class="form-control">
                            <option value="1" selected>Casual</option>
                            <option value="2">Budget</option>
                            <option value="3">Regular</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('licenceNo') ? 'has-error' : '' }}">
                        <label for="licenceNo">License No:</label>
                        <input type="number" id="licenceNo" name="licenceNo" class="form-control"
                               placeholder="Enter License Number" value="{{ old("licenceNo") }}"/>
                        <span class="text-danger">{{ $errors->first('licenceNo') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('licenceExp') ? 'has-error' : '' }}">
                        <label for="licenceExp">License Exp:</label>
                        <input type="text" class="form-control" id="licenceExp" name="licenceExp"
                               placeholder="Enter Licence Expiry Date" value="{{ old("licenceExp") }}"/>
                        <span class="text-danger">{{ $errors->first('licenceExp') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control"
                               placeholder="Enter Password" />
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
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ url('members') }}" class="btn btn-default">Back to Members</a>
        </form>
    </div>
@stop