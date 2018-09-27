@extends('app')

@section('content')
    <div class="container">
        <script>
            $(function() {
                $("#address").geocomplete({
                    details: ".geo-details",
                    detailsAttribute: "data-geo"
                });
            });
        </script>
        <form method="POST" action="/location" autocomplete="off">
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
                    <div class="form-group {{ $errors->has('councilName') ? 'has-error' : '' }}">
                        <label for="councilName">Council Name:</label>
                        <input type="text" id="councilName" name="councilName" class="form-control"
                               placeholder="Enter Council Name" value="{{ old("councilName") }}"/>
                        <span class="text-danger">{{ $errors->first('councilName') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('contactName') ? 'has-error' : '' }}">
                        <label for="contactName">Council Contact Name:</label>
                        <input type="text" class="form-control" id="contactName" name="contactName"
                               placeholder="Enter Contact Name" value="{{ old("contactName") }}"/>
                        <span class="text-danger">{{ $errors->first('contactName') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('phoneNo') ? 'has-error' : '' }}">
                        <label for="phoneNo">Council Phone No:</label>
                        <input type="number" class="form-control" id="phoneNo" name="phoneNo"
                               placeholder="Enter Phone No" value="{{ old("phoneNo") }}"/>
                        <span class="text-danger">{{ $errors->first('phoneNo') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Council Email:</label>
                        <input type="email" id="email" name="email" class="form-control"
                               placeholder="Enter Email" value="{{ old("email") }}"/>
                        <span class="text-danger">{{ $errors->first('email') }}</span>
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
                    <div class="form-group {{ $errors->has('parkingLevy') ? 'has-error' : '' }}">
                        <label for="parkingLevy">Parking Levy:</label>
                        <input type="number" id="parkingLevy" name="parkingLevy" class="form-control"
                               placeholder="Enter Parking Levy" value="{{ old("parkingLevy") }}"/>
                        <span class="text-danger">{{ $errors->first('parkingLevy') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="staffAssign">Staff Assigned:</label>
                    <select id="staffAssign" name="staffAssign" class="form-control">
                        @foreach($staffMembers as $staffMember)
                            <option value="{{ $staffMember->Staff_No }}">{{ $staffMember->First_Name }} {{ $staffMember->Last_Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                </div>
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ url('locations') }}" class="btn btn-default">Back to Locations</a>
        </form>
    </div>
@stop