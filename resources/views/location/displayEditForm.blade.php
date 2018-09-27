@extends('app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ url('/location/update') }}" autocomplete="off">
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
                               value="{{ $location->Council_Name }}" />
                        <span class="text-danger">{{ $errors->first('councilName') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('contactName') ? 'has-error' : '' }}">
                        <label for="contactName">Council Contact Name:</label>
                        <input type="text" class="form-control" id="contactName" name="contactName"
                               value="{{ $location->Contact_Name }}" />
                        <span class="text-danger">{{ $errors->first('contactName') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('phoneNo') ? 'has-error' : '' }}">
                        <label for="phoneNo">Council Phone No:</label>
                        <input type="number" class="form-control" id="phoneNo" name="phoneNo"
                               value="{{ $location->Phone_No }}" />
                        <span class="text-danger">{{ $errors->first('phoneNo') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Council Email:</label>
                        <input type="email" id="email" name="email" class="form-control"
                               value="{{ $location->Email_Add }}" >
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="addressNoUpdate">Address:</label>
                        <input type="text" id="addressNoUpdate" name="addressNoUpdate" class="form-control"
                               value="{{ $location->Address }}" disabled/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('parkingLevy') ? 'has-error' : '' }}">
                        <label for="parkingLevy">Parking Levy:</label>
                        <input type="number" id="parkingLevy" name="parkingLevy" class="form-control"
                               value="{{ $location->Parking_Levy_Amt }}" />
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
            </div>
            <input type="hidden" id="locationId" name="locationId" class="form-control"
                   value="{{ $location->Location_Id }}"/>
            <input type="hidden" id="address" name="address" class="form-control"
                   value="{{ $location->Address }}"/>

            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ url('locations') }}" class="btn btn-default">Back to Locations</a>
        </form>
    </div>
@stop