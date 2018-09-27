@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="form-group">
                    @if(Auth::user()->role == 'admin')
                        <a class="btn btn-default" href="{{ url('vehicle') }}">
                            Enter New Vehicle
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-md-5 col-md-offset-0">
                <div class="form-group">
                    <input type="text" class="form-control" id="vehicleSearch" onkeyup="searchVehicles()"
                           placeholder="Search by Registration Number..." />
                </div>
            </div>

            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-info">
                    <div class="panel-heading">Registered Vehicles</div>
                    <div class="panel-body">
                        <table class="table table-striped task-table" id="vehicleTable">
                            <thead>
                            <th>Rego No</th>
                            <th>Class</th>
                            <th>Odometer Reading</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Attached Location</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            @if(Auth::user()->role == 'admin')
                                <th>&nbsp;</th>
                            @endif
                            </thead>

                            <tbody>
                            @foreach ($vehicles as $v)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $v->Rego_No }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $v->Class }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $v->Odo_Reading }}</div>
                                    </td>

                                    @foreach($vehicleTypes as $vt)
                                        @if($v->Type_Id == $vt->Type_Id)
                                            <td class="table-text">
                                                <div>{{ $vt->Make }}</div>
                                            </td>

                                            <td class="table-text">
                                                <div>{{ $vt->Model }}</div>
                                            </td>
                                        @endif
                                    @endforeach

                                    <td class="table-text">
                                        <div>{{ $v->Year }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $v->Location_Id }}</div>
                                    </td>

                                    @if($v->Date_Disposed == null)
                                        <td class="table-text">
                                            <div>Active</div>
                                        </td>
                                    @else
                                        <td class="table-text">
                                            <div>Disposed</div>
                                        </td>
                                    @endif

                                    <td>
                                        <form action="/vehicles/{{ $v->Rego_No }}" method="GET">
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn btn-default">
                                                <i class="fa fa-btn fa-trash"></i>View
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="/vehicle/{{ $v->Rego_No }}" method="GET">
                                            {{ csrf_field() }}
                                            {{ method_field('UPDATE') }}

                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-trash"></i>Update
                                            </button>
                                        </form>
                                    </td>

                                    @if(Auth::user()->role == 'admin')
                                        <td>
                                            <form action="/vehicle/{{ $v->Rego_No }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger"
                                                        onClick="return confirm('Do you really want to dispose Vehicle: ' +
                                                                '{{ $v->Rego_No }}?');">
                                                    <i class="fa fa-btn fa-trash"></i>Dispose
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
        function searchVehicles() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("vehicleSearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("vehicleTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
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