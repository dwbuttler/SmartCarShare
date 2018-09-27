@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-0">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Vehicle Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Rego No:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $vehicle->Rego_No }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Type Id:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $vehicle->Type_Id }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">VIN No:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $vehicle->VIN_No }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Vehicle Class:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $vehicle->Class }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Odometer Reading:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $vehicle->Odo_Reading }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Year:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $vehicle->Year }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Location:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $vehicle->Location_Id }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Date Acquired:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $vehicle->Date_Acquired }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Date Disposed:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $vehicle->Date_Disposed }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Staff No:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $vehicle->Staff_No }}
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('vehicles') }}" class="btn btn-default">Back to Vehicles</a>
            </div>
        </div>
    </div>

@stop