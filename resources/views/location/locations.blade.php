@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="form-group">
                    @if(Auth::user()->role == 'admin')
                        <a class="btn btn-default" href="{{ url('location') }}">
                            Enter New Location
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-md-5 col-md-offset-0">
                <div class="form-group">
                    <input type="text" class="form-control" id="locationSearch" onkeyup="searchLocations()"
                           placeholder="Search by Council Name..." />
                </div>
            </div>

            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-info">
                    <div class="panel-heading">Registered Locations</div>
                    <div class="panel-body">
                        <table class="table table-striped task-table" id="locationTable">
                            <thead>
                            <th>Location Id</th>
                            <th>Address</th>
                            <th>Council Name</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            @if(Auth::user()->role == 'admin')
                                <th>&nbsp;</th>
                            @endif
                            </thead>

                            <tbody>
                            @foreach ($locations as $l)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $l->Location_Id }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $l->Address }}</div>
                                    </td>

                                    <td class="table-text">
                                        <div>{{ $l->Council_Name }}</div>
                                    </td>

                                    <td>
                                        <form action="/locations/{{ $l->Location_Id }}" method="GET">
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn btn-default">
                                                <i class="fa fa-btn fa-trash"></i>View
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <form action="/location/{{ $l->Location_Id }}" method="GET">
                                            {{ csrf_field() }}
                                            {{ method_field('UPDATE') }}

                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-trash"></i>Update
                                            </button>
                                        </form>
                                    </td>

                                    @if(Auth::user()->role == 'admin')
                                        <td>
                                            <form action="/location/{{ $l->Location_Id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger"
                                                        onClick="return confirm('Do you really want to remove Location: ' +
                                                                '{{ $l->Location_Id }}?');">
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
        function searchLocations() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("locationSearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("locationTable");
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