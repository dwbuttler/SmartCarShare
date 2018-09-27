@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-0">
                <div class="form-group">
                    <input type="text" class="form-control" id="archiveBookingSearch" onkeyup="searchArchiveBookings()"
                           placeholder="Search by Booking Start Date..." />
                </div>
            </div>

            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-info">
                    <div class="panel-heading">Archived Bookings</div>
                    <div class="panel-body">
                        <table class="table table-striped task-table" id="archiveBookingTable">
                            <thead>
                                <th>Archive Booking No</th>
                                <th>Booking Created</th>
                                <th>Start Date</th>
                                <th>Member No</th>
                                <th>Vehicle Booked</th>
                                <th>&nbsp;</th>
                            </thead>

                            <tbody>
                            @foreach ($archiveBookings as $ab)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $ab->Archive_Booking_No }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $ab->Booking_Date }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $ab->Start_Date }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $ab->Membership_No }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $ab->Rego_No }}</div>
                                    </td>

                                    <td>
                                        <form action="/archives/bookings/{{ $ab->Archive_Booking_No }}" method="GET">
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn btn-default">
                                                <i class="fa fa-btn fa-trash"></i>View
                                            </button>
                                        </form>
                                    </td>
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
        function searchArchiveBookings() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("archiveBookingSearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("archiveBookingTable");
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