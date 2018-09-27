@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ url('booking') }}">
                        Create New Booking
                    </a>
                </div>
            </div>

            <div class="col-md-5 col-md-offset-0">
                <div class="form-group">
                    <input type="text" class="form-control" id="bookingSearch" onkeyup="searchBookings()"
                           placeholder="Search by Booking Start Date..." />
                </div>
            </div>

            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-info">
                    <div class="panel-heading">Bookings</div>
                    <div class="panel-body">
                        <table class="table table-striped task-table" id="bookingTable">
                            <thead>
                            <th>Booking No</th>
                            <th>Booking Created</th>
                            <th>Start Date</th>
                            <th>Member No</th>
                            <th>Vehicle Booked</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>

                            @if( Auth::user()->role == 'admin')
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            @endif
                            </thead>

                            <tbody>
                            @foreach ($bookings as $b)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $b->Booking_No }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $b->Booking_Date }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $b->Start_Date }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $b->Membership_No }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $b->Rego_No }}</div>
                                    </td>

                                    <td>
                                        <form action="/bookings/{{ $b->Booking_No }}" method="GET">
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn btn-default">
                                                <i class="fa fa-btn fa-trash"></i>View
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="/booking/{{ $b->Booking_No }}" method="GET">
                                            {{ csrf_field() }}
                                            {{ method_field('UPDATE') }}

                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-trash"></i>Update
                                            </button>
                                        </form>
                                    </td>

                                    @if( Auth::user()->role == 'admin')
                                        <td>
                                            <form action="/booking/archive/{{ $b->Booking_No }}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fa fa-btn fa-trash"></i>Archive
                                                </button>
                                            </form>
                                        </td>

                                        <td>
                                            <form action="/booking/{{ $b->Booking_No }}" method="POST"
                                                  onClick="return confirm('Do you really want to delete Booking: ' +
                                                  '{{ $b->Booking_No }}?');">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function searchBookings() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("bookingSearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("bookingTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@stop