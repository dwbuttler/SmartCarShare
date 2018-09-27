@extends('app')

@section('content')
    <script>
        $(function() {
            var startDate = $("#startDate");

            $.datepicker.setDefaults({
                constrainInput: true,
                dateFormat: "yy-mm-dd"
            });

            startDate.datepicker({
                minDate: new Date(),
                onSelect: function(date) {
                    var date2 = $('#startDate').datepicker('getDate');
                    date2.setDate(date2.getDate() + 1);
                    $('#returnDate').datepicker('setDate', date2);
                    $('#returnDate').datepicker('option', 'minDate', date2);
                }
            });

            $("#returnDate").datepicker();
                onClose: new function() {
                    var dt1 = $('#startDate').datepicker('getDate');
                    var dt2 = $('#returnDate').datepicker('getDate');
                    if (dt2 <= dt1) {
                        var minDate = $('#returnDate').datepicker('option', 'minDate');
                        $('#returnDate').datepicker('setDate', minDate);
                    }
                }
        });
    </script>
    <div class="container">
        <form method="POST" action="/booking" autocomplete="off">
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
                        <label for="memberNo">Member No:</label>
                        <select name="memberNo" id="memberNo" class="form-control">
                            @foreach($members as $member)
                                <option value="{{ $member->Membership_No }}">{{ $member->Membership_No }},
                                    {{ $member->Last_Name }} {{ $member->First_Name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="regoNo">Registration No:</label>
                        <select name="regoNo" id="regoNo" class="form-control">
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->Rego_No }}">{{ $vehicle->Rego_No }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('startDate') ? 'has-error' : '' }}">
                        <label for="startDate">Start Date:</label>
                        <input type="text" id="startDate" name="startDate" class="form-control"
                               placeholder="Enter Booking Start Date" value="{{ old("startDate") }}"/>
                        <span class="text-danger">{{ $errors->first('startDate') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('returnDate') ? 'has-error' : '' }}">
                        <label for="returnDate">Return Date:</label>
                        <input type="text" class="form-control" id="returnDate" name="returnDate"
                               placeholder="Enter Booking Return Date" value="{{ old("returnDate") }}"/>
                        <span class="text-danger">{{ $errors->first('returnDate') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('bookingDist') ? 'has-error' : '' }}">
                        <label for="bookingDist">Booking Distance:</label>
                        <input type="number" class="form-control" id="bookingDist" name="bookingDist"
                               placeholder="Enter Approx. Booking Distance (Klms)" value="{{ old("bookingDist") }}"/>
                        <span class="text-danger">{{ $errors->first('bookingDist') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('bookingNotes') ? 'has-error' : '' }}">
                        <label for="bookingNotes">Details:</label>
                        <input type="text" id="bookingNotes" name="bookingNotes" class="form-control"
                               placeholder="Enter Booking Notes" value="{{ old("bookingNotes") }}"/>
                        <span class="text-danger">{{ $errors->first('bookingNotes') }}</span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ url('bookings') }}" class="btn btn-default">Back to Bookings</a>
        </form>
    </div>
@stop