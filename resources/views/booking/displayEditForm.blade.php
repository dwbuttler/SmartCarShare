@extends('app')

@section('content')
    <script>
        $(function() {
            $.datepicker.setDefaults({
                constrainInput: true,
                dateFormat: "yy-mm-dd"
            });

            $("#actReturnDate").datepicker();
        });
    </script>
    <div class="container">
        <form method="POST" action="{{ url('/booking/update') }}" autocomplete="off">
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
                        <label for="memberNoUpdate">Member No:</label>
                        <input type="number" id="memberNoUpdate" name="memberNoUpdate" class="form-control"
                               value="{{ $booking->Membership_No }}" disabled/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="regoNoUpdate">Registration No:</label>
                        <input type="text" id="regoNoUpdate" name="regoNoUpdate" class="form-control"
                               value="{{ $booking->Rego_No }}" disabled/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="startDateNoUpdate">Start Date:</label>
                        <input type="text" id="startDateNoUpdate" name="startDateNoUpdate" class="form-control"
                               value="{{ $booking->Start_Date }}" disabled/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="returnDateNoUpdate">Return Date:</label>
                        <input type="text" class="form-control" id="returnDateNoUpdate" name="returnDateNoUpdate"
                               value="{{ $booking->Return_Date }}" disabled/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('actReturnDate') ? 'has-error' : '' }}">
                        <label for="actReturnDate">Actual Return Date:</label>
                        <input type="text" class="form-control" id="actReturnDate" name="actReturnDate"
                               placeholder="Enter Actual Return Booking Date" value="{{ $booking->Return_Date }}"/>
                        <span class="text-danger">{{ $errors->first('actReturnDate') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('actReturnKlm') ? 'has-error' : '' }}">
                        <label for="actReturnKlm">Finishing Odometer Reading:</label>
                        <input type="number" class="form-control" id="actReturnKlm" name="actReturnKlm"
                               placeholder="Enter Actual Return Booking Distance (Klm)" value="{{ $booking->Return_Date }}"/>
                        <span class="text-danger">{{ $errors->first('actReturnKlm') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('bookingDist') ? 'has-error' : '' }}">
                        <label for="bookingDist">Booking Distance:</label>
                        <input type="number" class="form-control" id="bookingDist" name="bookingDist"
                               placeholder="Enter Approx. Booking Distance (Klms)" value="{{ $booking->Return_Klm }}"/>
                        <span class="text-danger">{{ $errors->first('bookingDist') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('bookingNotes') ? 'has-error' : '' }}">
                        <label for="bookingNotes">Details:</label>
                        <input type="text" id="bookingNotes" name="bookingNotes" class="form-control"
                               placeholder="Enter Booking Notes" value="{{ $booking->Booking_Notes }}"/>
                        <span class="text-danger">{{ $errors->first('bookingNotes') }}</span>
                    </div>
                </div>
            </div>

            <input type="hidden" id="memberNo" name="memberNo" class="form-control"
                   value="{{ $booking->Membership_No }}"/>
            <input type="hidden" id="regoNo" name="regoNo" class="form-control"
                   value="{{ $booking->Rego_No }}"/>
            <input type="hidden" id="bookingNo" name="bookingNo" class="form-control"
                   value="{{ $booking->Booking_No }}"/>
            <input type="hidden" id="startDate" name="startDate" class="form-control"
                   value="{{ $booking->Start_Date }}"/>
            <input type="hidden" id="returnDate" name="returnDate" class="form-control"
                   value="{{ $booking->Return_Date }}"/>

            <button type="submit" class="btn btn-info">Update Details</button>
            <a href="{{ url('bookings') }}" class="btn btn-default">Back to Bookings</a>
        </form>
    </div>
@stop