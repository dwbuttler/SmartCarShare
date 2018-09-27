@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="form-group">
                    @if(Auth::user()->role == 'admin')
                        <a class="btn btn-default" href="{{ url('member') }}">
                            New Member
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-md-5 col-md-offset-0">
                <div class="form-group">
                    <input type="text" class="form-control" id="memberSearch" onkeyup="searchMembers()"
                           placeholder="Search by Email Address..." />
                </div>
            </div>

            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-info">
                    <div class="panel-heading">Registered Members</div>
                    <div class="panel-body">
                        <table class="table table-striped task-table" id="memberTable">
                            <thead>
                            <th>Membership No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone No</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            @if(Auth::user()->role == 'admin')
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            @endif
                            </thead>

                            <tbody>
                            @foreach ($members as $m)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $m->Membership_No }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $m->First_Name }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $m->Last_Name }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $m->Phone_No }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $m->Email_Add }}</div>
                                    </td>

                                    @foreach($memberMemberships as $mm)
                                        @if($mm->Membership_No == $m->Membership_No)
                                            <td class="table-text">
                                                <div>{{ $mm->Status }}</div>
                                            </td>
                                        @endif
                                    @endforeach

                                    <td>
                                        <form action="/members/{{ $m->Membership_No }}" method="GET">
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn btn-default">
                                                <i class="fa fa-btn fa-trash"></i>View
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="/member/{{ $m->Membership_No }}" method="GET">
                                            {{ csrf_field() }}
                                            {{ method_field('UPDATE') }}

                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-trash"></i>Update
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="/member/approve/{{ $m->Membership_No }}" method="POST">
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-trash"></i>Approve
                                            </button>
                                        </form>
                                    </td>

                                    @if(Auth::user()->role == 'admin')
                                        <td>
                                            <form action="/member/archive/{{ $m->Membership_No }}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fa fa-btn fa-trash"></i>Archive
                                                </button>
                                            </form>
                                        </td>

                                        <td>
                                            <form action="/member/{{ $m->Membership_No }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger"
                                                        onClick="return confirm('Do you really want to cancel Member: ' +
                                                                '{{ $m->Membership_No }}?');">
                                                    <i class="fa fa-btn fa-trash"></i>Cancel
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
        function searchMembers() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("memberSearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("memberTable");
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