@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-0">
                <div class="form-group">
                    <input type="text" class="form-control" id="archiveMemberSearch" onkeyup="searchArchiveBookings()"
                           placeholder="Search by Email Address..." />
                </div>
            </div>

            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-info">
                    <div class="panel-heading">Registered Members</div>
                    <div class="panel-body">
                        <table class="table table-striped task-table" id="archiveMemberTable">
                            <thead>
                            <th>Archive Membership No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone No</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                            </thead>

                            <tbody>
                            @foreach ($archiveMembers as $am)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $am->Archive_Membership_No }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $am->First_Name }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $am->Last_Name }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $am->Phone_No }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $am->Email_Add }}</div>
                                    </td>

                                    <td>
                                        <form action="/archives/members/{{ $am->Archive_Membership_No }}" method="GET">
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
            input = document.getElementById("archiveMemberSearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("archiveMemberTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[4];
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