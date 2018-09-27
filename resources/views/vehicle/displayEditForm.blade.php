@extends('app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ url('/vehicle/update') }}" autocomplete="off">
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
                        <label for="regoNoNoUpdate">Rego No:</label>
                        <input type="text" id="regoNoNoUpdate" name="regoNoNoUpdate" class="form-control"
                               value="{{ $vehicle->Rego_No }}" disabled/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="vinNoNoUpdate">VIN No:</label>
                        <input type="text" class="form-control" id="vinNoNoUpdate" name="vinNoNoUpdate"
                               value="{{ $vehicle->VIN_No }}" disabled/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bodyTypeNoUpdate">Body Type:</label>
                        <input type="text" class="form-control" id="bodyTypeNoUpdate" name="bodyTypeNoUpdate"
                               value="{{ $vehicle->Class }}" disabled/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('odoReading') ? 'has-error' : '' }}">
                        <label for="odoReading">Odometer Reading:</label>
                        <input type="number" id="odoReading" name="odoReading" class="form-control"
                               placeholder="Enter Suburb" value="{{ $vehicle->Odo_Reading }}">
                        <span class="text-danger">{{ $errors->first('odoReading') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('makeYear') ? 'has-error' : '' }}">
                        <label for="makeYear">Year:</label>
                        <input type="number" id="makeYear" name="makeYear" class="form-control"
                               placeholder="Enter Postcode" value="{{ $vehicle->Year }}"/>
                        <span class="text-danger">{{ $errors->first('makeYear') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dateAcquiredNoUpdate">Date Acquired:</label>
                        <input type="text" class="form-control" id="dateAcquiredNoUpdate" name="dateAcquiredNoUpdate"
                               value="{{ $vehicle->Date_Acquired }}" disabled/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="staff">Staff Assigned:</label>
                        <select id="staff" name="staff" class="form-control">
                            @foreach($staffMembers as $staffMember)
                                @if($staffMember->Staff_No == $vehicle->Staff_No)
                                    <option value="{{ $staffMember->Staff_No }}" selected>{{ $staffMember->First_Name }} {{ $staffMember->Last_Name }}</option>
                                @else
                                    <option value="{{ $staffMember->Staff_No }}">{{ $staffMember->First_Name }} {{ $staffMember->Last_Name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="location">Location:</label>
                        <select id="location" name="location" class="form-control">
                            @foreach($locations as $location)
                                @if($location->Location_Id == $vehicle->Location_Id)
                                    <option value="{{ $location->Location_Id }}" selected>{{ $location->Address }}</option>
                                @else
                                    <option value="{{ $location->Location_Id }}">{{ $location->Address }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" id="vinNo" name="vinNo" class="form-control"
                   value="{{ $vehicle->VIN_No }}"/>
            <input type="hidden" id="regoNo" name="regoNo" class="form-control"
                   value="{{ $vehicle->Rego_No }}"/>
            <input type="hidden" id="typeId" name="typeId" class="form-control"
                   value="{{ $vehicle->Type_Id }}"/>
            <input type="hidden" id="dateAcquired" name="dateAcquired" class="form-control"
                   value="{{ $vehicle->Date_Acquired }}"/>

            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ url('vehicles') }}" class="btn btn-default">Back to Vehicles</a>
        </form>
    </div>
@stop