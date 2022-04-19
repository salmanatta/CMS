@extends('main')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Ticket History</h5>
                    </div>
                    <div class="card-body">
                        @if(Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="inputEmail4">Created By</label>
                                    <input type="text" class="form-control" name="created_by" value="{{ $tickets->user->name }}" disabled>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="inputAddress">Created At</label>
                                    <input type="text" class="form-control" name="created_at" value="{{ $tickets->created_at }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="inputEmail4">Request Type</label>
                                    <select class="form-select flex-grow-1" name="RequestType" disabled>
                                        <option value="Incident" {{ isset($tickets) ? $tickets->type == 'Incident' ? 'selected' : '' : '' }}>Incident</option>
                                        <option value="Training Request" {{ isset($tickets) ? $tickets->type == 'Training Request' ? 'selected' : '' : '' }}>Training Request</option>
                                        <option value="Issue" {{ isset($tickets) ? $tickets->type == 'Issue' ? 'selected' : '' : '' }}>Issue</option>
                                    </select>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="inputAddress">Current Status</label>
                                    <select class="form-select flex-grow-1" name="status" disabled>
                                            <option value="{{ $tickets->status_id }}" >{{ $tickets->ticketStatus->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col sm-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 500px;" aria-label="Position: activate to sort column ascending">Comment By</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px; text-align: end" aria-label="Position: activate to sort column ascending">Comment Date/Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tickets->comments as $comment)
                                        <tr>
                                            <td width="20%" style="text-align: left" >{{ $comment->user->name }}</td>
                                            <td width="40%">{{ $comment->statues->name }}</td>
                                            <td width="40%" style="text-align: end">{{ $comment->created_at }}</td>
                                            <td style="text-align: right">
                                                 <button type="button"  class="btn btn-primary" data-id="{{$comment->id}}" data-toggle="" data-target=""  id="btnComment" onclick="showComment({{$comment}})">Show</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Modal -->
                            <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Comments</h5>
                                        </div>
                                        <div class="modal-body" id="modalid">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"  data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="float-end">
                                <a class="btn btn-danger" href="{{ url('editTicket/'.$tickets->id)  }}">Exit</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
