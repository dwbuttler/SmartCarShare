@extends('app')

@section('content')
    <script>
        $(function() {
            $.datepicker.setDefaults({
                constrainInput: true,
                dateFormat: "yy-mm-dd"
            });

            $("#dateAcquired").datepicker();
        });
    </script>
    <div class="container">
        <form method="POST" action="/vehicle" autocomplete="off">
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
                    <div class="form-group {{ $errors->has('regoNo') ? 'has-error' : '' }}">
                        <label for="regoNo">Rego No:</label>
                        <input type="text" id="regoNo" name="regoNo" class="form-control"
                               placeholder="Enter Rego No" value="{{ old("regoNo") }}"/>
                        <span class="text-danger">{{ $errors->first('regoNo') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('vinNo') ? 'has-error' : '' }}">
                        <label for="vinNo">VIN No:</label>
                        <input type="text" class="form-control" id="vinNo" name="vinNo"
                               placeholder="Enter VIN No" value="{{ old("vinNo") }}"/>
                        <span class="text-danger">{{ $errors->first('vinNo') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('make') ? 'has-error' : '' }}">
                        <label for="make">Car Make:</label>
                        <input type="text" id="make" name="make" class="form-control"
                               placeholder="Enter Car Make" value="{{ old("make") }}"/>
                        <span class="text-danger">{{ $errors->first('make') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('model') ? 'has-error' : '' }}">
                        <label for="model">Car Model:</label>
                        <input type="text" class="form-control" id="model" name="model"
                               placeholder="Enter Car Model" value="{{ old("model") }}"/>
                        <span class="text-danger">{{ $errors->first('model') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('engCap') ? 'has-error' : '' }}">
                        <label for="engCap">Engine Capacity:</label>
                        <input type="number" id="engCap" name="engCap" class="form-control"
                               placeholder="Enter Car Make" value="{{ old("engCap") }}"/>
                        <span class="text-danger">{{ $errors->first('engCap') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bodyType">Body Type:</label>
                        <select id="bodyType" name="bodyType" class="form-control">
                            <option value="Sedan">Sedan</option>
                            <option value="Station Wagon">Station Wagon</option>
                            <option value="Van">Van</option>
                            <option value="Hatchback" selected>Hatchback</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('makeYear') ? 'has-error' : '' }}">
                        <label for="makeYear">Make Year:</label>
                        <input type="number" id="makeYear" name="makeYear" class="form-control"
                               placeholder="E.g. 1996" value="{{ old("makeYear") }}"/>
                        <span class="text-danger">{{ $errors->first('makeYear') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="location">Location:</label>
                        <select id="location" name="location" class="form-control">
                            @foreach($locations as $location)
                                <option value="{{ $location->Location_Id }}">{{ $location->Address }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('dateAcquired') ? 'has-error' : '' }}">
                        <label for="dateAcquired">Date Acquired:</label>
                        <input type="text" id="dateAcquired" name="dateAcquired" class="form-control"
                               placeholder="Enter Date Acquired" value="{{ old("dateAcquired") }}"/>
                        <span class="text-danger">{{ $errors->first('dateAcquired') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('odoReading') ? 'has-error' : '' }}">
                        <label for="odoReading">Odometer Reading:</label>
                        <input type="number" id="odoReading" name="odoReading" class="form-control"
                               placeholder="Enter Odometer Reading" value="{{ old("odoReading") }}"/>
                        <span class="text-danger">{{ $errors->first('odoReading') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('colour') ? 'has-error' : '' }}">
                        <label for="colour">Car Colour:</label>
                        <input type="text" class="form-control" id="colour" name="colour"
                               placeholder="Enter Car Colour" value="{{ old("colour") }}"/>
                        <span class="text-danger">{{ $errors->first('colour') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="staff">Staff:</label>
                        <select id="staff" name="staff" class="form-control">
                            @foreach($staffMembers as $staffMember)
                                <option value="{{ $staffMember->Staff_No }}">{{ $staffMember->First_Name }} {{ $staffMember->Last_Name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ url('vehicles') }}" class="btn btn-default">Back to Vehicles</a>
        </form>
    </div>
@stop