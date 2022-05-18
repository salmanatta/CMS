@extends('main')

@section('content')

    <div class="py-4">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4>Assets List
                        <a href="{{ url('add-Item') }}" class="btn btn-primary float-end">Add Item</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div id="datatables-reponsive_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="col-sm-12">
                            <table id="myDataTable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="col-sm-12 sorting sorting_asc" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 262px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Description</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 500px;" aria-label="Position: activate to sort column ascending">Logged By</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Type</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Priority</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Subject</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Department</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td class="col-sm-2">{{ $item->DESCRIPTION }}</td>
                                        <td class="col-sm-2">{{ $item->MAJOR_TYPE }}</td>
                                        <td class="col-sm-1">{{ $item->MODEL }}</td>
                                        <td class="col-sm-1">{{ $item->VENDOR }}</td>
                                        <td class="col-sm-1">{{ $item->CUSTODIAN }}</td>
                                        <td class="col-sm-3" >{{ date('d M, Y' , strtotime($item->INSTALL_DATE)) }}</td>
                                        <td class="col-sm-1"  style="text-align: center">{{ $item->BUILDING }}</td>
                                        <td style="text-align: right">
                                            <a href="{{ url('editTicket/'.$item->id) }}" class="btn btn-primary">View</a>
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


@endsection

