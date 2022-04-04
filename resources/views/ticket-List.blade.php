@extends('main')

@section('content')

    <div class="py-4">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4>Ticket List
                        <a href="{{ url('tickets') }}" class="btn btn-primary float-end">Add Ticket</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div id="datatables-reponsive_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="col-sm-12">
                            <table id="myDataTable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="col-sm-12 sorting sorting_asc" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 262px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Created Data</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 500px;" aria-label="Position: activate to sort column ascending">Logged By</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Type</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Priority</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Subject</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ticket as $tik)
                                    <tr>
                                        <td width="10%" style="text-align: center">{{ $tik->created_at }}</td>
                                        <td width="15%">{{ $tik->user->name }}</td>
                                        <td width="10%">{{ $tik->type }}</td>
                                        <td width="10%">{{ $tik->priority }}</td>
                                        <td width="10%">{{ $tik->ticketStatus->name }}</td>
                                        <td width="35%">{{ $tik->subject }}</td>
                                        <td style="text-align: right" width="10%">
                                            <a href="{{ url('editTicket/'.$tik->id) }}" class="btn btn-primary">View</a>
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
