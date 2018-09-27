@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-0">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Archive Booking Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Archive Booking No:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Archive_Booking_No }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Rego No:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Rego_No }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Membership No:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Membership_No }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Booking Date:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Booking_Date }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Booking Start Date:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Start_Date }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Starting Odometer Reading:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Start_Klm }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Booking Return Date:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Return_Date }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Actual Return Date:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Actual_Return_Date }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Estimated Finished Odometer:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Return_Klm }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Actual Finished Odometer:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Actual_Return_Klm }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Fuel Fee:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Fuel_Fee }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Insurance Fee:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Insurance_Fee }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Total (exc GST):</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Total_exGST }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">GST Amount:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->GST_Amount }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Booking Notes:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Booking_Notes }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Payment No:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Payment_No }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Assigned Staff No:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveBooking->Staff_No }}
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('archives/bookings') }}" class="btn btn-default">Back to Archive Bookings</a>
            </div>
        </div>
    </div>

@stop