@extends('main')

@section('content')

<div class="py-4">
    <div class="container-fluid">
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
                <div class="card">
                    <div class="card-header">
                        <h4>Department List
                            <a href="{{ url('department/create') }}" class="btn btn-primary float-end">Add Department</a>
                        </h4>
                    </div>
{{--                    <div class="col-12">--}}
{{--                        <div class="card">--}}
                            <div class="card-body">
                                <div id="datatables-reponsive_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="row">
{{--                                        <div class="col-sm-12 col-md-6">--}}
{{--                                            <div class="dataTables_length" id="datatables-reponsive_length">--}}
{{--                                                <label>Show <select name="datatables-reponsive_length" aria-controls="datatables-reponsive" class="form-select form-select-sm">--}}
{{--                                                        <option value="10">10</option>--}}
{{--                                                        <option value="25">25</option>--}}
{{--                                                        <option value="50">50</option>--}}
{{--                                                        <option value="100">100</option>--}}
{{--                                                    </select> entries</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <form action="deptSearch" method="GET">--}}
{{--                                            <div class="col-sm-12 col-md-6 float-end">--}}
{{--                                                <div id="datatables-reponsive_filter" class="dataTables_filter">--}}
{{--                                                    <label>Search:--}}
{{--                                                        <input type="search" class="form-control form-control-sm" placeholder="Search here" name="query" aria-controls="datatables-reponsive">--}}
{{--                                                    </label>--}}
{{--                                                    <div class="col-sm-12 float-end py-2">--}}
{{--                                                        <button type="submit" class="btn btn-outline-primary ">Search</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
{{--                                            <table id="myDataTable" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" aria-describedby="datatables-reponsive_info">--}}
                                                <table id="myDataTable" class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th class="col-sm-12 sorting sorting_asc" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 262px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Department Code</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 500px;" aria-label="Position: activate to sort column ascending">Department Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($deptData as $data)
                                                    <tr>
                                                        <td>{{ $data->code }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td style="text-align: right">
                                                            <a href="{{ url('department/'.$data->id.'/edit/') }}" class="btn btn-success">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        <div class="col-sm-12 col-md-7">--}}
{{--                                            <div class="" id="">--}}
{{--                                                <ul class="pagination">--}}
{{--                                                    <li class="paginate_button page-item active">--}}
{{--                                                        <a href="#" aria-controls="datatables-reponsive" data-dt-idx="1" tabindex="0" class="page-link">1</a>--}}
{{--                                                        <span aria-controls="datatables-reponsive" data-dt-idx="2" tabindex="0" class="page-link">{{ $deptData->links() }}</span>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                </div>

    </div>
</div>

@endsection
