@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Location Details
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p style="font-weight: bold;">Location Id:</p>
                        </div>
                        <div class="col-md-6">
                            {{ $location->Location_Id }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="font-weight: bold;">Council Name:</p>
                        </div>
                        <div class="col-md-6">
                            {{ $location->Council_Name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="font-weight: bold;">Contact Name:</p>
                        </div>
                        <div class="col-md-6">
                            {{ $location->Contact_Name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="font-weight: bold;">Phone No:</p>
                        </div>
                        <div class="col-md-6">
                            {{ $location->Phone_No }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="font-weight: bold;">Email:</p>
                        </div>
                        <div class="col-md-6">
                            {{ $location->Email_Add }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="font-weight: bold;">Address:</p>
                        </div>
                        <div class="col-md-6">
                            {{ $location->Address }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="font-weight: bold;">Parking Levy Amount:</p>
                        </div>
                        <div class="col-md-6">
                            {{ $location->Parking_Levy_Amt }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="font-weight: bold;">Staff No:</p>
                        </div>
                        <div class="col-md-6">
                            {{ $location->Staff_No }}
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ url('locations') }}" class="btn btn-default">Back to Locations</a>
        </div>
    </div>
</div>

@stop