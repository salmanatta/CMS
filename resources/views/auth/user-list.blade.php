@extends('main')

@section('content')

    <div class="py-4">
        <div class="container-fluid">
            @if(Session::get('success'))
                <div class="alert alert-success alert-block py-2 px-2 d-flex justify-content-between" style="width: 500px" id="meg">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>User List
                        <a href="{{ url('newUser') }}" class="btn btn-primary float-end">Add User</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div id="datatables-reponsive_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="myDataTable" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="col-sm-12 sorting sorting_asc" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 262px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">User Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 500px;" aria-label="Position: activate to sort column ascending">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 500px;" aria-label="Position: activate to sort column ascending">Department</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->department ? $user->department->departments->name : '' }}</td>
                                            <td style="text-align: right">
                                                <a href="{{ url('user-department/'.$user->id) }}" class="btn btn-outline-primary">Associate Department</a>
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

        </div>
    </div>

@endsection
