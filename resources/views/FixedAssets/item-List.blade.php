@extends('main')

@section('content')

    <div class="py-4">
        <div class="container-fluid">
            @if(Session::get('success'))
                <div class="alert alert-success alert-block py-2 px-2 d-flex justify-content-between" style="width: 500px">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
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
                                    <th class="col-sm-12 sorting sorting_asc" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 262px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Asset No</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 500px;" aria-label="Position: activate to sort column ascending">Description</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 500px;" aria-label="Position: activate to sort column ascending">Major Type</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Model</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Vendor</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Custodian</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Installation Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Building</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td width="10%">{{ $item->FA_NO }}</td>
                                        <td width="25%">
                                            <a style="text-decoration: none; color: #0c0c0c" class="hoverEffect" href="{{ url('edit-Item/'.$item->id) }}">{{ $item->DESCRIPTION }}</a>
                                        </td>
                                        <td width="10%">{{ $item->MAJOR_TYPE }}</td>
                                        <td width="10%">{{ $item->MODEL }}</td>
                                        <td width="12%">{{ $item->VENDOR }}</td>
                                        <td width="10%">{{ $item->CUSTODIAN }}</td>
                                        <td width="10%" >{{ date('D d M, Y' , strtotime($item->INSTALL_DATE)) }}</td>
                                        <td width="6%"  style="text-align: center">{{ $item->BUILDING }}</td>
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

