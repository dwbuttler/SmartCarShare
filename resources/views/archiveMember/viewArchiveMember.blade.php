@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-0">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Archive Member Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Membership No:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveMember->Archive_Membership_No }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Date Received:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveMember->Date_Received }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Last Name:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveMember->Last_Name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">First Name:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveMember->First_Name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Address:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveMember->Address }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Phone No:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveMember->Phone_No }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Email:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveMember->Email_Add }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Type:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveMember->Type }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">License No:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveMember->Licence_No }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">License Expiry:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveMember->Licence_Exp }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Terms Accepted:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveMember->Terms_Accepted }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Terms File Location:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveMember->Terms_File_Loc }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-weight: bold;">Acceptance Date:</p>
                            </div>
                            <div class="col-md-6">
                                {{ $archiveMember->Acceptance_Date }}
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('archives/members') }}" class="btn btn-default">Back to Members</a>
            </div>
        </div>
    </div>

@stop