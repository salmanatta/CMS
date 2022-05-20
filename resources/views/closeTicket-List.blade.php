@extends('main')

@section('content')

    <div class="py-4">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-light">
                    <h4>Resolved Ticket List</h4>
                </div>
                <div class="card-body">
                    @if(Session::get('success'))
                        <div class="alert alert-success alert-block py-2 px-2 d-flex justify-content-between" style="width: 500px">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div id="datatables-reponsive_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="col-sm-12">
                            <table id="myDataTable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 500px;" aria-label="Position: activate to sort column ascending">ID</th>
                                    <th class="col-sm-12 sorting sorting_asc" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 262px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Subject</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Assigned To</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Type</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Priority</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Department</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Create At</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Close</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Re-Open</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ticket as $tik)
                                    <tr>
                                        <td width="6%" style="text-align: center" class="assignToTicketId">{{ $tik->id }}</td>
                                        <td width="25%">
                                            <a style="text-decoration: none; color: #0c0c0c" class="hoverEffect" href="{{ url('editTicket/'.$tik->id) }}">{{ $tik->subject }}</a>
                                        </td>
                                        <td width="14%">{{$tik->assigneduser->name}}</td>
                                        <td width="10%">{{ $tik->type }}</td>
                                        <td width="6%">{{ $tik->priority }}</td>
                                        <td width="6%">
                                            <span class="@if($tik->ticketStatus->id == 1) badge bg-danger @elseif($tik->ticketStatus->id == 2) badge bg-warning @elseif($tik->ticketStatus->id == 3) badge bg-secondary @elseif($tik->ticketStatus->id == 5) badge bg-info @elseif($tik->ticketStatus->id == 6) badge bg-success @endif">{{ $tik->ticketStatus->name }}</span>
                                        </td>
                                        <td width="8%" style="text-align: center">{{ $tik->department->code }}</td>
                                        <td width="14%" style="text-align: center">{{ date('D M, Y H:i:s' , strtotime($tik->created_at)) }}</td>
                                        <td style="text-align: center" width="4%">
                                            @if (! ($tik->status_id > \App\Models\Ticket_status::where('name' , 'Resolved')->first()->id) )
                                                <a href="{{ url('resolve/'.$tik->id) }}"><span class="bi bi-check" style="color:green; font-size:20px"></a>
                                            @endif
                                        </td>
                                        <td style="text-align: center" width="6%">
                                            @if (! ($tik->status_id > \App\Models\Ticket_status::where('name' , 'Resolved')->first()->id) )
                                                <a href="{{ url('re-open/'.$tik->id) }}"><span class="bi bi-x" style="font-size: 20px;color:darkred"></span></a>
                                            @endif
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
